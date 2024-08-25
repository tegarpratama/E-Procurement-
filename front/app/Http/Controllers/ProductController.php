<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $token = session('jwt_token');
        if (!$token) {
            return redirect()->route('login');
        }

        $url = env('BACKEND_URL') . '/products';

        if ($request->search) {
            $url = $url . '?search=' . $request->search;
        }

        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->get($url);

        $data = [];
            
        if ($response->json()['status'] == 'success') {
            $data = $response->json()['data'];
        }

        return view('products.index', [
            'data' => $data
        ]);
    }

    public function delete(Request $request)
    {
        $token = session('jwt_token');
        if (!$token) {
            return redirect()->route('login');
        }

        $url = env('BACKEND_URL');
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->delete($url . '/products/' . $request->id . '/delete' ); 

        if ($response->json()['status'] == 'success') {
            return back()->with('status', $response->json()['message']);
        }

        if ($response->json()['error'] == 'failed') {
            return back()->with('error', $response->json()['message']);  
        }
    }

    public function create()
    {
        $token = session('jwt_token');
        if (!$token) {
            return redirect()->route('login');
        }

        return view('products.create');
    }

    public function store(Request $request)
    {
        $token = session('jwt_token');
        if (!$token) {
            return redirect()->route('login');
        }

        $url = env('BACKEND_URL');
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post($url . '/products', [
            'name' => $request->name,
            'description' => $request->description,
        ]);
        

        if ($response->json()['status'] == 'success') {
            return redirect()->route('products')->with('status', $response->json()['message']);
        }

        if ($response->json()['error'] == 'failed') {
            if (array_key_exists('errors', $response->json())) {
                return back()->with('status', $response->json()['errors'][0]['message']);
            } else {
                return back()->with('status', $response->json()['message']);   
            } 
        }
    }
}
