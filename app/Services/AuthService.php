<?php

namespace App\Services;

use App\Models\GuruModel;
use App\Models\UserModel;

class AuthService
{
    protected UserModel $userModel;
    protected GuruModel $guruModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->guruModel = new GuruModel();
    }

    /**
     * Attempt login with username & password
     */
    public function attempt(string $username, string $password): array
    {
        // cek admin / operator
        $user = $this->userModel
            ->where('username', $username)
            ->where('aktif', 1)
            ->first();

        if ($user && password_verify($password, $user['password'])) {
            $this->setSession([
                'user_id'   => $user['id'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);

            return [
                'success'  => true,
                'redirect' => $this->redirectByRole($user['role'])
            ];
        }

        // cek guru
        $guru = $this->guruModel
            ->where('username', $username)
            ->where('aktif', 1)
            ->first();

        if ($guru && password_verify($password, $guru['password'])) {
            $this->setSession([
                'user_id'   => $guru['id_guru'],
                'role'      => 'guru',
                'logged_in' => true
            ]);

            return [
                'success'  => true,
                'redirect' => '/guru/dashboard'
            ];
        }

        return [
            'success' => false,
            'message' => 'Username atau password salah'
        ];
    }

    /**
     * Logout user
     */
    public function logout(): void
    {
        session()->destroy();
    }

    /**
     * Set session data
     */
    protected function setSession(array $data): void
    {
        session()->set($data);
    }

    /**
     * Redirect path by role
     */
    protected function redirectByRole(string $role): string
    {
        return match ($role) {
            'admin'    => '/admin/dashboard',
            'operator' => '/operator/dashboard',
            default    => '/login'
        };
    }
}
