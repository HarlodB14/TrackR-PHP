<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function showAccounts(){
        return view('trackrAccounts');

    }

    public function createAccount(){
        return view('createNewAccount');

    }


}
