<?php

namespace App\Repositories;


use App\Models\Item;
use BadMethodCallException;

class ItemRepository
{
    public function count()
    {
        return Item::count();
    }

    public function avg()
    {
        return Item::avg('price');
    }

    public function website() {
        return Item::website()->first()?->domain;
    }

    public function price() {
        return Item::currentMonth()->sum('price');
    }


    public function __call($name, $arguments) {
        if (!method_exists($this, $name)) {
            throw new BadMethodCallException();
        }
    }

}
