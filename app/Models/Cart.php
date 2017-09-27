<?php
namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQty = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'item' => $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['qty']++;
        $this->items[$id] = $storedItem;
        $this->totalQty++;
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        unset($this->items[$id]);
    }
}
