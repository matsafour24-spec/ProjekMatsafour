<?php

namespace App\Controllers;

use App\Services\AuthService;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected AuthService $auth;

    public function __construct()
    {
        $this->auth = new AuthService();
    }

    public function login()
    {
        // GET /login
        return view('auth/login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate()
    {
        // POST /login
        $request = service('request');

        $username = trim((string) $request->getPost('username'));
        $password = (string) $request->getPost('password');

        $result = $this->auth->attempt($username, $password);

        if ($result['success'] === false) {
            return redirect()->back()->withInput()->with('error', $result['message']);
        }

        // redirect sesuai role
        return redirect()->to($result['redirect']);
    }

    public function logout()
    {
        // GET /logout
        $this->auth->logout();
        return redirect()->to('/login');
    }
}
