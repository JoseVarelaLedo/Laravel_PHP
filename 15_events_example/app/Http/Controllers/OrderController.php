<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Events\CreateOrderEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


class OrderController extends Controller
{
    public function createOrder()
    {
    //    $order = Order::create([
    //     'user_id'=> 10, //inventado
    //     'amount'=> 25, //inventado
    //    ]);
       //en este punto se generaría la factura
       //pero eso genera acoplamiento
       //y viola el principio SOLID de responsabilidad única
       //generaremos un Evento en su lugar
       //CreateOrderEvent::dispatch($order);
       Artisan::call('make:order', ['user_id' => 75, 'amount' => 60]);
       return response()->json('Invoice Succesfully created');
    }
}
