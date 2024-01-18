<?php
class Order {
    public $quantity;
    public $itemPrice;
    public $discountLevel;
    public $shipping;
    public $shippingDiscount;

    public function __construct($params) {
        $this->quantity = $params['quantity'];
        $this->itemPrice = $params['itemPrice'];
        $this->discountLevel = $params['discountLevel'];
        $this->shipping = $params['shipping'];
        $this->shippingDiscount = $params['shippingDiscount'];
    //}
    //     $this->quantity = $quantity;
    //     $this->itemPrice = $itemPrice;
    //     $this->discountLevel = $discountLevel;
    //     $this->shipping = $shipping;
    //     $this->shippingDiscount = $shippingDiscount;
    }


    public function calculateTotal() {
        $basePrice = $this->quantity * $this->itemPrice;
        $discount = 0;
        if ($this->quantity > 100) $discount = 2;
        else $discount = 1;
        $discountedPrice = $basePrice - $discount * $basePrice;
        $shippingCost = $this->shipping;
        if ($this->quantity > 50) $shippingCost -= $this->shippingDiscount;
        $total = $discountedPrice + $shippingCost ;
        return $total;
    }

    public function printInvoice() {
        $total = $this->calculateTotal();
        echo "Quantity: " . $this->quantity . "\n";
        echo "Item Price: " . $this->itemPrice . "\n";
        echo "Discount Level: " . $this->discountLevel . "\n";
        echo "Shipping: " . $this->shipping . "\n";
        echo "Shipping Discount: " . $this->shippingDiscount . "\n";
        echo "Total: " . $total . "\n";
    }
}

$order = new Order(['quantity' => 100, 'itemPrice' => 10, 'discountLevel' => 1, 'shipping' => 5, 'shippingDiscount' => 1]);
$order->printInvoice();