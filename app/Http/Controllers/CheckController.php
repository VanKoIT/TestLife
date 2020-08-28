<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class CheckController
 * @package App\Http\Controllers
 */
class CheckController extends Controller
{
    /**
     * Check email uniqueness.
     * @param Request $request
     * @return void
     */
    public function emailExist(Request $request)
    {
        $request->validate([
            'email' => 'unique:users,email',
        ]);
    }

}
