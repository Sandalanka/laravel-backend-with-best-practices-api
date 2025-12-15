<?php

namespace App\Services\Product;

use App\Classes\Common\ApiCatchErrors;
use App\Contracts\Product\ProductContract;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductService
{
    protected ProductContract $productContract;

    /**
     * @param ProductContract $productContract
     */
    public function __construct(ProductContract $productContract)
    {
        $this->productContract = $productContract;
    }

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
            return $this->productContract->index();

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while index a product-(service): '
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
            return $this->productContract->store($request);

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while store a product-(service): '
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
            $this->productContract->update($id, $request);

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while update a product-(service): '
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
            $this->productContract->destroy($id);

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while destroy a product-(service): '
            );

            throw $exception;
        }
    }
}
