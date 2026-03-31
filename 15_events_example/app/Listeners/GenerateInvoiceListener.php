<?php

namespace App\Listeners;

use App\Events\CreateOrderEvent;
use App\Models\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateInvoiceListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()  { }

    //por defecto el tipo es object, pero usaremos un tipado más estricto
    public function handle(CreateOrderEvent $event): void
    {
        Invoice::create([
            'amount'=>$event->order->amount,
            'order_id'=>$event->order->id,
        ]);
    }
}
