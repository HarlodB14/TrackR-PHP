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

        return view('accounts.trackrAccounts', compact('accounts'));
    }

    public function editAccount(User $user)
    {
        $roles = Role::all();
        return view('accounts.editAccount', compact('user', 'roles'));
    }

    public function createAccount()
    {
        $roles = Role::all();
        return view('accounts.createNewAccount', compact('roles'));
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

    public function update(Request $request, User $user)
    {
        $account = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:4',
            'role' => 'required|exists:roles,name',
        ]);

        if (!empty($account['password'])) {
            $account['password'] = Hash::make($account['password']);
        } else {
            unset($account['password']);
        }

        $user->update($account);

        $roleName = $request->input('role');
        $role = Role::where('name', $roleName)->first();
        $user->syncRoles($role);

        return redirect()->route('show-accounts')->with('success', 'Account updated successfully');
    }

    public function deleteAccount(User $user)
    {
        $user->delete();

        return redirect()->route('show-accounts')->with('success', 'Account deleted successfully');
    }
}
