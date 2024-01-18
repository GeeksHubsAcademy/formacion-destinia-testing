<?php
class Order {
    private $quantity;
    private $itemPrice;
    private $discountLevel;
    private $shipping;
    private $shippingDiscount;

    public function __construct($quantity, $itemPrice, $discountLevel, $shipping, $shippingDiscount) {
        $this->quantity = $quantity;
        $this->itemPrice = $itemPrice;
        $this->discountLevel = $discountLevel;
        $this->shipping = $shipping;
        $this->shippingDiscount = $shippingDiscount;
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