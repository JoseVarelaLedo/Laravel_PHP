<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //obtenemos el primer usuario, el que tiene relación con el teléfono
        $user = User::find(1);
        return view('index', compact('user'));
    }
}
