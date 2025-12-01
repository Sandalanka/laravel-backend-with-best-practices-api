<?php

namespace App\Repositories\Product;

use App\Classes\Common\ApiCatchErrors;
use App\Contracts\Product\ProductContract;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductContract
{
    /**
     *
     * Summery: Product get all
     *
     * @return Collection
     * @throws Exception
     */
    public function index(): Collection
    {
        try {

            return Product::all();

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while index a product-(repository): '
            );

            throw $exception;
        }
    }

    /**
     *
     * Summery: Product create
     *
     * @param Request $request
     * @return Product
     * @throws Exception
     */
    public function store(Request $request): Product
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->save();

            return $product;

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while store a product-(repository): '
            );

            throw $exception;
        }
    }

    /**
     *
     * Summery: Product update
     *
     * @param int $id
     * @param Request $request
     * @return void
     * @throws Exception
     */
    public function update(int $id, Request $request): void
    {
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->update();

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while update a product-(repository): '
            );

            throw $exception;
        }
    }

    /**
     *
     * Summery: Product delete
     *
     * @param int $id
     * @return void
     * @throws Exception
     *
     */
    public function destroy(int $id): void
    {
        try {
            Product::destroy($id);

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while destroy a product-(repository): '
            );

            throw $exception;
        }
    }
}
