<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AccountController extends Controller
{
    public function showAccounts()
    {
        $accounts = User::all();

        return view('trackrAccounts', compact('accounts'));
    }

    public function createAccount()
    {
        $roles = Role::all();
        return view('createNewAccount', compact('roles'));
    }

    public function store(Request $request)
    {
        $account = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'role' => 'required|exists:roles,name',
        ]);

        $account['password'] = Hash::make($account['password']);
        $user = User::create($account);
        $roleName = $request->input('role');
        $role = Role::where('name', $roleName)->first();
        $user->assignRole($role);

        return redirect()->route('show-accounts')->with('success', 'Account created successfully');
    }
}
