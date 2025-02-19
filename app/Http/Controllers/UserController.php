<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Форма регистрации
     *
     * @return View
     */
    public function registerForm(): View
    {
        return view('register');
    }

    /**
     * Создание аккаунта
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        /** @var User $user */
        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('products.index');
    }

    /**
     * Форма авторизации
     *
     * @return View
     */
    public function loginForm(): View
    {
        return view('login');
    }

    /**
     * Вход в аккаунт
     *
     * @param LoginRequest $loginRequest
     * @return RedirectResponse
     */
    public function login(LoginRequest $loginRequest): RedirectResponse
    {
        $validated = $loginRequest->validated();

        if (!Auth::attempt($validated)) {
            return redirect()->route('login.form')->withErrors([
                'login' => 'Неверный логин или пароль',
            ]);
        }

        return redirect()->route('products.index');
    }

    /**
     * Выход из аккаунта
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
