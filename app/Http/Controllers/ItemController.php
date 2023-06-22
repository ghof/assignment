<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(): ItemCollection
    {
        return new ItemCollection(Item::all());
    }

    public function store(StoreItemRequest $request): ItemResource
    {
        $item = Item::create($request->only(['name', 'url', 'price', 'description']));
        return new ItemResource($item);
    }

    public function show(Item $item): ItemResource
    {
        return new ItemResource($item);
    }

    public function update(StoreItemRequest $request, Item $item): ItemResource
    {
        $item->update($request->only(['name', 'url', 'price', 'description']));
        return new ItemResource($item);
    }
}
