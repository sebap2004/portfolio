<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if (auth()->attempt($attributes))
        {
            session()->regenerate();

            return redirect('/')->with('success', 'logged in successfully');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'wrong lol']);

    }
    public function create()
    {
        return view('login')->layout('components.layout.home');
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out');
    }
}
