<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserIcon extends Model
{
    protected $guarded = [];

    public function User()
    {
        return  $this->belongsTo(User::class);
    }
}
