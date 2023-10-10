<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapToken extends Midtrans{
    protected $order;
    public function __construct($order){
        parent::__construct();
        $this->order = $order;
    }
    public function getSnapToken(){
        $params = array(
            'transaction_details' => array(
                'order_id' => $this->order->id,
                'gross_amount' => $this->order->amount,
            )
        );
        $snapToken = Snap::getSnapToken($params);
        return $snapToken;
    }
}
