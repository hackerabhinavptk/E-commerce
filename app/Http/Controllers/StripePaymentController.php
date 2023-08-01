<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Carts;
use Session;



use Exception;
use App\Payment;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;






class StripePaymentController extends Controller
{


    public function form()
    {
        return view('form');
    }

    const BASE_URL = 'https://api.stripe.com';
    const SECRET_KEY = 'sk_test_51NXh0jSCfksRyyVuRK80hBqTsOOyT0JxnfVzVxerFN1WCcCBa4sBBijLbopP7KtPa0Dxzn0GK21pyyEPHp5d5aBO00viLEgvte';

    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'terms_conditions' => 'accepted'
        ]);

        /** I have hard coded amount. You may fetch the amount based on customers order or anything */
        $amount = 1 * 100;
        $currency = 'usd';

        if (empty(request()->get('stripeToken'))) {
            session()->flash('error', 'Some error while making the payment. Please try again');
            return back()->withInput();
        }
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {
            /** Add customer to stripe, Stripe customer */
            $customer = Customer::create([
                'email' => request('email'),
                'source' => request('stripeToken')
            ]);
        } catch (Exception $e) {
            $apiError = $e->getMessage();
        }

        if (empty($apiError) && $customer) {
            /** Charge a credit or a debit card */
            try {
                /** Stripe charge class */
                $charge = Charge::create(
                    array(
                        'customer' => $customer->id,
                        'amount' => $amount,
                        'currency' => $currency,
                        'description' => 'Some testing description'
                    )
                );
            } catch (Exception $e) {
                $apiError = $e->getMessage();
            }

            if (empty($apiError) && $charge) {
                // Retrieve charge details 
                $paymentDetails = $charge->jsonSerialize();
                if ($paymentDetails['amount_refunded'] == 0 && empty($paymentDetails['failure_code']) && $paymentDetails['paid'] == 1 && $paymentDetails['captured'] == 1) {
                    /** You need to create model and other implementations */
                    /*
                    Payment::create([
                        'name'                          => request('name'),
                        'email'                         => request('email'),
                        'amount'                        => $paymentDetails['amount'] / 100,
                        'currency'                      => $paymentDetails['currency'],
                        'transaction_id'                => $paymentDetails['balance_transaction'],
                        'payment_status'                => $paymentDetails['status'],
                        'receipt_url'                   => $paymentDetails['receipt_url'],
                        'transaction_complete_details'  => json_encode($paymentDetails)
                    ]);
                    */

                    $user_id = Auth::id();
                    $order_details = Carts::where('user_id', $user_id)->get();


                    foreach ($order_details as $key => $val) {

                        $orders = new Order;

                        $orders->name = $val->name;
                        $orders->email = $val->email;

                        $orders->phone = $val->phone;
                        $orders->address = $val->address;
                        $orders->product_title = $val->product_title;
                        $orders->price = $val->price;
                        $orders->quantity = $val->quantity;
                        $orders->image = $val->image;
                        $orders->product_id = $val->product_id;
                        $orders->user_id = $user_id;
                        $orders->payment_status = 'paid';
                        $orders->delivery_status = 'Not delivered yet!!';

                        $orders->save();
                        $cart_delete = Carts::find($val->id);

                        $cart_delete->delete();

                    }


                    return redirect('/thankyou/?receipt_url=' . $paymentDetails['receipt_url']);
                } else {
                    session()->flash('error', 'Transaction failed');
                    return back()->withInput();
                }
            } else {
                session()->flash('error', 'Error in capturing amount: ' . $apiError);
                return back()->withInput();
            }
        } else {
            session()->flash('error', 'Invalid card details: ' . $apiError);
            return back()->withInput();
        }
    }

    public function thankyou()
    {
        return view('payments.thankyou');
    }

}