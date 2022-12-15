<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        // $result = admin::where(['email' => $email, 'password' => $password])->get();
        $result = admin::where(['email' => $email])->first();

        if ($result) {

            if (Hash::check($request->post('password'), $result->password)) {

                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('message', "please enter correct password");
                return redirect('admin');



            }



        } else {
            $request->session()->flash('message', "please enter correct login details");
            return redirect('admin');

        }


    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function updatepassword()
    {
        $result = admin::find(1);
        $result->password = Hash::make(123456);
        $result->save();

    }






}
