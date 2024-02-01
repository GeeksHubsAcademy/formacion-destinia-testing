<?php

class Order {
   private $customer;
   private $items;
   private $total;
   public function __construct($customer) {
       $this->customer = $customer;
       $this->items = array();
       $this->total = 0;
   }
   public function addItem($item, $quantity) {
       array_push($this->items, array($item, $quantity));
       $this->total += $item->getPrice() * $quantity;
   }

   public function getTotal() {
       return $this->total;
   }

   public function printOrder() {
       echo "Customer: " . $this->customer->getName() . "\n";
       echo "Items:\n";
       foreach ($this->items as $item) {
           echo $item[0]->getName() . ": " . $item[1] . "\n";
       }
       echo "Total: " . $this->getTotal() . "\n";
   }
}


class Customer {
   private $name;
   public function __construct($name) {
       $this->name = $name;
   }
   public function getName() {
       return $this->name;
   }
}
class Item {
   private $name;
   private $price;
   public function __construct($name, $price) {
       $this->name = $name;
       $this->price = $price;
   }
   public function getName() {
       return $this->name;
   }
   public function getPrice() {
       return $this->price;
   }
}
