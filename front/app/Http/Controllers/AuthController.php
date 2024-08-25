<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $url = env('BACKEND_URL');
        $response = Http::post($url . '/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);


        if ($response->json()['status'] == 'success') {
            session(['jwt_token' => $response->json()['data']['token']]);
            session(['name' => $response->json()['data']['name']]);
            session(['role' => $response->json()['data']['role']]);

            return redirect()->route('products');
        }

        if ($response->json()['status'] == 'failed') {
            if (array_key_exists('errors', $response->json())) {
                return back()->with('status', $response->json()['errors'][0]['message']);
            } else {
                return back()->with('status', $response->json()['message']);   
            }
        }
    }

    public function register() 
    {
        return view('auth.register') ;
    }

    public function registerSubmit(Request $request)
    {
        $url = env('BACKEND_URL');
        $response = Http::post($url . '/auth/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirm' => $request->password_confirm
        ]);


        if ($response->json()['status'] == 'success') {
            return redirect()->route('login')->with('success', 'Regristasi berhasil, silahkan tunggu konfirmasi admin.');
        }

        if ($response->json()['status'] == 'failed') {
            if (array_key_exists('errors', $response->json())) {
                return back()->with('status', $response->json()['errors'][0]['message']);
            } else {
                return back()->with('status', $response->json()['message']);   
            }
        }
    }

    public function logoutSubmit(Request $request)
    {
        $request->session()->forget('jwt_token');
        $request->session()->forget('name');
        $request->session()->forget('role');

        return redirect()->route('login');
    }
}
