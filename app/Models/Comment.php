<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public function reply()
    {
        return $this->hasMany(Reply::class);
    }
   
}
