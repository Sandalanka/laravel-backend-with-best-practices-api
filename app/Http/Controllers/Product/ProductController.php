<?php

namespace App\Http\Controllers\Product;

use App\Classes\Common\ApiCatchErrors;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Services\Product\ProductService;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    protected ProductService $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     *
     * Summery: Product get all
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function index(): JsonResponse
    {
        try {
            $products = $this->productService->index();

            return $this->successResponse(
                data: $products,
                message: 'Get all products successfully.'
            );

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while index a product-(controller): '
            );

            return $this->errorResponse(
                exception: $exception,
                message: 'Something went wrong'
            );
        }
    }

    /**
     *
     * Summery: Product create
     *
     * @param ProductStoreRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(ProductStoreRequest $request): JsonResponse
    {
        try {
            $product = $this->productService->store($request);

            return $this->successResponse(
                data: $product,
                message: 'Product created successfully.',
                statusCode: 201
            );

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while store a product-(controller): '
            );

            return $this->errorResponse(
                exception: $exception,
                message: 'Something went wrong'
            );
        }
    }

    /**
     *
     * Summery: Product update
     *
     * @param int $id
     * @param ProductUpdateRequest $request
     * @return JsonResponse
     */
    public function update(int $id, ProductUpdateRequest $request): JsonResponse
    {
        try {
            $this->productService->update($id, $request);

            return $this->successResponse(
                message: 'Product updated successfully.'
            );

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while update a product-(controller): '
            );

            return $this->errorResponse(
                exception: $exception,
                message: 'Something went wrong'
            );
        }
    }

    /**
     *
     * Summery: Product delete
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->productService->destroy($id);

            return $this->successResponse(
                message: 'Product deleted successfully.'
            );

        } catch (Exception $exception) {
            ApiCatchErrors::throw($exception,
                'An error occurred while destroy a product-(controller): '
            );

            return $this->errorResponse(
                exception: $exception,
                message: 'Something went wrong'
            );
        }
    }
}
