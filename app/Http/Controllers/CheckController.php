<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function emailExist(Request $request) {
        $request->validate([
            'email' => 'unique:users,email',
        ]);
    }

    public function auth() {
        return true;
    }
}
