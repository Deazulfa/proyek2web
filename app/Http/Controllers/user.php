<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
   protected $table = 'Login';
   protected $fillable = ['username', 'password'];


}
