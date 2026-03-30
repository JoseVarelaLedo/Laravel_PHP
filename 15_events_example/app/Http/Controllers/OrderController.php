<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder()
    {
       Order::create([
        'user_id'=> 10, //inventado
        'amount'=> 25, //inventado
       ]);
       //en este punto se generaría la factura
       //pero eso genera acoplamiento
       //y viola el principio SOLID de responsabilidad única
       //generaremos un Evento en su lugar
    }
}
