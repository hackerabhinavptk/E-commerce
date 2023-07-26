@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Stripe form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="mt-3">
            <h1>Stripe form</h1>
            <p class="lead">Amount: INR100</p>
            <form method="post" action="{{ route('stripeSubmit') }}" class="row">
                <input type="hidden" name="amount" value="100">
                <input type="hidden" name="currency" value="INR">
                @csrf
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="first_name" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <input type="text" id="first_name" class="form-control" name="first_name">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="last_name" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" id="last_name" class="form-control" name="last_name">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" id="email" class="form-control" name="email">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" id="phone" class="form-control" name="phone">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="postal_code" class="col-sm-2 col-form-label">Postal code</label>
                        <div class="col-sm-10">
                            <input type="text" id="postal_code" class="form-control" name="postal_code">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="line1" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" id="line1" class="form-control" name="line1">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="city" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" id="city" class="form-control" name="city">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="state" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                            <input type="text" id="state" class="form-control" name="state">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="country" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <input type="text" id="country" class="form-control" name="country">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="card_no" class="col-sm-2 col-form-label">Card no</label>
                        <div class="col-sm-10">
                            <input type="text" id="card_no" class="form-control" name="card_no">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="exp_month" class="col-sm-2 col-form-label">Card Exp. month</label>
                        <div class="col-sm-10">
                            <input type="text" id="exp_month" class="form-control" name="exp_month">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="exp_year" class="col-sm-2 col-form-label">Card Exp. year</label>
                        <div class="col-sm-10">
                            <input type="text" id="exp_year" class="form-control" name="exp_year">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="cvc" class="col-sm-2 col-form-label">CVV</label>
                        <div class="col-sm-10">
                            <input type="text" id="cvc" class="form-control" name="cvc">
                        </div>
                    </div>
                </div>
                <input type="submit" name="Submit" class="btn btn-primary">
            </form>
            <div class="card mt-3">
                <div class="card-body">
                    <p class="lead">Stripe docs links:</p>
                    <p>Test card available here: <a href="https://stripe.com/docs/testing#cards" target="_blank">Link</a></p>
                    <p>Payment method request docs: <a href="https://stripe.com/docs/api/payment_methods/create" target="_blank">Link</a></p>
                    <p>Payment intent request docs: <a href="https://stripe.com/docs/api/payment_intents/create" target="_blank">Link</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




{{-- <!DOCTYPE html>
<html>

<head>
    <title>Stripe Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</head>

<body>

    <div class="container">

        <h1>Here You Go For Payment</h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <h3 class="panel-title">Payment Details</h3>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success_message') }}</p>
                            </div>
                        @endif

                        @if (Session::has('error_message'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('error_message') }}</p>
                            </div>
                        @endif

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form role="form" action="/stripePost" method="post" class="require-validation"
                            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                            @csrf

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='4' type='text'>
                                </div>
                            </div>
                            
                          
                            
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label>
                                        <input autocomplete='off' class='form-control card-number' name="card_number" size='20' type='number'>
                                    </div>
                                </div>
                            
                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label>
                                        <input autocomplete='off' class='form-control card-cvc' name="cvv" placeholder='ex. 311' size='4' type='number'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration date</label>
                                        <input class='form-control card-expiry-month' name="expirationDate" placeholder='MM' size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label>
                                        <input class='form-control card-expiry-month' name="expirationMonth" placeholder='MM' size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label>
                                        <input class='form-control card-expiry-year' name="expirationYear" placeholder='YYYY' size='4' type='text'>
                                    </div>
                                </div>
                            
                            
                               
                           
                            
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">


                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay with @if(isset($price))
                                        {{$price}}
                                    @endif
                                        
                                        </button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://js.braintreegateway.com/web/3.78.0/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.78.0/js/hosted-fields.min.js"></script>
</body>

<script type="text/javascript" src="https://js.stripe.com/v2/">

</script>

<script type="text/javascript"> --}}
{{-- 
    // $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        // var $form = $(".require-validation");

        // $('form.require-validation').bind('submit', function(e) {
        //     var $form = $(".require-validation"),
        //     inputSelector = ['input[type=email]', 'input[type=password]',
        //                      'input[type=text]', 'input[type=file]',
        //                      'textarea'].join(', '),
        //     $inputs = $form.find('.required').find(inputSelector),
        //     $errorMessage = $form.find('div.error'),
        //     valid = true;
        //     $errorMessage.addClass('hide');

        //     $('.has-error').removeClass('has-error');
        //     $inputs.each(function(i, el) {
        //       var $input = $(el);
        //       if ($input.val() === '') {
        //         $input.parent().addClass('has-error');
        //         $errorMessage.removeClass('hide');
        //         e.preventDefault();
        //       }
        //     });

        //     if (!$form.data('cc-on-file')) {
        //       e.preventDefault();
        //       Stripe.setPublishableKey($form.data('stripe-publishable-key'));
        //       Stripe.createToken({
        //         number: $('.card-number').val(),
        //         cvc: $('.card-cvc').val(),
        //         exp_month: $('.card-expiry-month').val(),
        //         exp_year: $('.card-expiry-year').val()
        //       }, stripeResponseHandler);
        //     }

        // });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
    //     function stripeResponseHandler(status, response) {
    //         if (response.error) {
    //             $('.error')
    //                 .removeClass('hide')
    //                 .find('.alert')
    //                 .text(response.error.message);
    //         } else {
    //             /* token contains id, last4, and card type */
    //             var token = response['id'];

    //             $form.find('input[type=text]').empty();
    //             $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
    //             $form.get(0).submit();
    //         }
    //     }

    // });

    
</script>


</html> --}}
