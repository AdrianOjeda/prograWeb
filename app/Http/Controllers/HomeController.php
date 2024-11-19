<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Redirect users based on their role.
     */
    public function redirectBasedOnRole()
    {
        $user = Auth::user();

        // Redirect based on role
        switch ($user->user_type) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'professor':
                return redirect()->route('profesor.dashboard');
            case 'alumni':
                return redirect()->route('alumno.dashboard');
            default:
                return redirect()->route('default.dashboard');
        }
    }
}
