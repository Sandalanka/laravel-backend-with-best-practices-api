<?php

namespace App\Contracts\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

interface ProductContract
{
    public function index(): Collection;

    public function store(Request $request): Product;

    public function update(int $id, Request $request): void;

    public function destroy(int $id): void;
}
