<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\Order;

class OrderObserver
{
   public function created(Order $order)
   {
    Invoice::create([
        'amount'=> $order->amount,
        'order_id'=> $order->id,
    ]);
   }
}
