<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderStatus;
use SM\StateMachine\StateMachineInterface;
use SM\Factory\FactoryInterface;

class Order extends Model
{
    protected $fillable = ['product_id', 'customer_id', 'status_id'];


    public function stateMachine(): StateMachineInterface
    {
        $factory = app(FactoryInterface::class);
        return $factory->get($this, 'order');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }
}
