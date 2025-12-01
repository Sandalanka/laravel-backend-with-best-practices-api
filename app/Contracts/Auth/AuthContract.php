<?php

namespace App\Contracts\Auth;

use Illuminate\Http\Request;

interface AuthContract
{
    public function register(Request $request): array;
}
