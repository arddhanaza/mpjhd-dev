<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{

    public function index()
    {
        if (session('logged_in')) {
            return redirect(route('data_pelanggaran'));
        } else {
            return view('user.login');
        }

    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if (User::is_existed($username)) {
            if (User::is_validated($username, $password)) {
                $user = User::get_user($username);
                session()->put($user->all());
                session()->put(['logged_in' => true]);
                return redirect(URL::previous());
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(URL::previous());
    }

}
