<?php

namespace App\Models;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(OrderObserver::class)]
class Order extends Model
{
   protected $guarded = [];
}
