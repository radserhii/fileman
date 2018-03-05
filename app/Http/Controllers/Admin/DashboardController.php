<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Mockery\Exception;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function dashboardUsers()
    {
        $users = User::all()->where('isAdmin', null);
        return view('admin.dashboard_users', ['users' => $users]);
    }

    public function deleteUser($user)
    {
        User::destroy($user);
        return redirect()->route('dashboard_users');
    }

    public function manualRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($user->save()) {
            return view('admin.dashboard', ['msg' => "Користувача додано"]);
        } else {
            throw new Exception('Користуваче не додано до базы! Мені дуже шкода!');
        }
    }
}
