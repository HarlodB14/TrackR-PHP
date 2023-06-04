<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function showAccounts()
    {
        $accounts = User::all();

        return view('trackrAccounts', compact('accounts'));

    }

    public function createAccount()
    {
        return view('createNewAccount');

    }

    public function store(Request $request)
    {
        $account = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);

        $account['password'] = Hash::make($account['password']);

        User::create($account);

        return redirect()->route('show-accounts')->with('success', 'Account created successfully');
    }


}
