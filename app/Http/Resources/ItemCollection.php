<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ItemCollection extends ResourceCollection
{

    public static $wrap = 'items';

    public function toArray($request)
    {
        return $this->collection;
    }
}
