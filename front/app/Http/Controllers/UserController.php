<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $token = session('jwt_token');
        $role = session('role');

        if (!$token) {
            return redirect()->route('login');
        }

        if ($role == 'vendor') {
            return back();
        }

        $url = env('BACKEND_URL');
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->get($url . '/users');

        $data = [];
            
        if ($response->json()['status'] == 'success') {
            $data = $response->json()['data'];
        }


        return view('users.index', [
            'data' => $data
        ]);
    }

    public function verified(Request $request)
    {
        $token = session('jwt_token');
        if (!$token) {
            return redirect()->route('login');
        }

        $url = env('BACKEND_URL');
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->put($url . '/users/' . $request->id . '/verified' ); 

        if ($response->json()['status'] == 'success') {
            return back()->with('status', $response->json()['message']);
        }

        if ($response->json()['error'] == 'failed') {
            return back()->with('error', $response->json()['message']);  
        }
    }
}
