<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    protected $traccarApiUrl;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->traccarApiUrl = env('TRACCAR_API_URL');
        $this->username = env('TRACCAR_USERNAME');
        $this->password = env('TRACCAR_PASSWORD');
    }
    public function index(Request $request)
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $data = [
            'email' => $email,
            'password' => $password,
        ];
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->asForm()->post($this->traccarApiUrl . '/session', $data);
        $cookie = $response->cookies('JSESSIONID');
        $cookies = $cookie->toArray();
        $token = $cookies[0]['Value'];


        if ($response->successful()) {
            $api = Cookie::make('JSESSIONID', $token, 60);
            $login = Cookie::make('login_status', 1, 60);
            $domain = "traccar.sentralgps.com"; // Ganti dengan subdomain yang benar
            $expiration = time() + 3600; // Contoh: cookie kedaluwarsa dalam 1 jam

            setcookie("JSESSIONID", $token, $expiration, "/", $domain, false, true);
            return Redirect()->route('dashboard')->withCookie($login)->withCookie($api);
        } else {
            return response('Salah');
        }
    }
    public function logout(Request $request)
    {
        $token = $request->cookie('JSESSIONID');

        if ($token) {
            Cookie::queue(Cookie::forget('JSESSIONID'));
            Cookie::queue(Cookie::forget('login_status'));

            Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->delete($this->traccarApiUrl . '/session');

            return redirect('/');
        }
        return redirect('/');
    }
}
