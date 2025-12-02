<?php

namespace App\Swagger;


/**
 * @OA\Get(
 *     path="/api/v1/product",
 *     summary="Get all products",
 *     description="Retrieve a list of all products with details",
 *     tags={"Product"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="success"),
 *             @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:08:29"),
 *             @OA\Property(property="message", type="string", example="Get all products successfully."),
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="name", type="string", example="Basic Plan"),
 *                     @OA\Property(property="slug", type="string", example="basic-plan"),
 *                     @OA\Property(property="description", type="string", example="This is the basic plan with standard features."),
 *                     @OA\Property(property="price", type="number", example=1000),
 *                     @OA\Property(property="discount", type="number", example=50),
 *                     @OA\Property(property="created_at", type="string", nullable=true, example=null),
 *                     @OA\Property(property="updated_at", type="string", nullable=true, example=null)
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error response",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="error"),
 *             @OA\Property(property="message", type="string", example="Something went wrong"),
 *             @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:09:30"),
 *             @OA\Property(property="errors", type="string", example="")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="status", type="string", example="error"),
 *             @OA\Property(property="message", type="string", example="Unauthorized"),
 *             @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:09:30"),
 *             @OA\Property(property="errors", type="string", example="Authentication token is missing or invalid")
 *         )
 *     )
 * )
 *
 * @OA\Post(
 *      path="/api/v1/product",
 *      summary="Create a new product",
 *      description="Add a new product with name, slug, description, price, and discount",
 *      tags={"Product"},
 *      security={{"bearerAuth":{}}},
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              type="object",
 *              required={"name","slug","price"},
 *              @OA\Property(property="name", type="string", example="product 001"),
 *              @OA\Property(property="slug", type="string", example="prod_001"),
 *              @OA\Property(property="description", type="string", example="This is test"),
 *              @OA\Property(property="price", type="number", format="float", example=110.00),
 *              @OA\Property(property="discount", type="number", format="float", example=10)
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Product created successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="success"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:17:34"),
 *              @OA\Property(property="message", type="string", example="Product created successfully."),
 *              @OA\Property(
 *                  property="data",
 *                  type="object",
 *                  @OA\Property(property="id", type="integer", example=4),
 *                  @OA\Property(property="name", type="string", example="product 001"),
 *                  @OA\Property(property="slug", type="string", example="prod_001"),
 *                  @OA\Property(property="description", type="string", example="This is test"),
 *                  @OA\Property(property="price", type="number", example=110),
 *                  @OA\Property(property="discount", type="number", example=10),
 *                  @OA\Property(property="created_at", type="string", format="date-time", example="2025-12-02T10:17:34.000000Z"),
 *                  @OA\Property(property="updated_at", type="string", format="date-time", example="2025-12-02T10:17:34.000000Z")
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Validation errors",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="failed"),
 *              @OA\Property(property="message", type="string", example="Validation errors"),
 *              @OA\Property(
 *                  property="errors",
 *                  type="object",
 *                  @OA\Property(
 *                      property="name",
 *                      type="array",
 *                      @OA\Items(type="string", example="The name field is required.")
 *                  ),
 *                  @OA\Property(
 *                      property="slug",
 *                      type="array",
 *                      @OA\Items(type="string", example="The slug field is required.")
 *                  ),
 *                  @OA\Property(
 *                      property="price",
 *                      type="array",
 *                      @OA\Items(type="string", example="The price field is required.")
 *                  )
 *              ),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:18:53")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="General error",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="message", type="string", example="Something went wrong"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 09:16:01"),
 *              @OA\Property(property="errors", type="string", example="")
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="message", type="string", example="Unauthorized"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:18:53"),
 *              @OA\Property(property="errors", type="string", example="Authentication token is missing or invalid")
 *          )
 *      )
 *  )
 *
 * @OA\Put(
 *      path="/api/v1/product/{id}",
 *      summary="Update a product",
 *      description="Update an existing product by ID with name, slug, description, price, and discount",
 *      tags={"Product"},
 *      security={{"bearerAuth":{}}},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the product to update",
 *          required=true,
 *          @OA\Schema(type="integer", example=4)
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              type="object",
 *              required={"name","slug","price"},
 *              @OA\Property(property="name", type="string", example="product 001"),
 *              @OA\Property(property="slug", type="string", example="prod_009"),
 *              @OA\Property(property="description", type="string", example="This is test"),
 *              @OA\Property(property="price", type="number", format="float", example=110.00),
 *              @OA\Property(property="discount", type="number", format="float", example=10)
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product updated successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="success"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:23:26"),
 *              @OA\Property(property="message", type="string", example="Product updated successfully.")
 *          )
 *      ),
 *      @OA\Response(
 *          response=422,
 *          description="Validation errors",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="failed"),
 *              @OA\Property(property="message", type="string", example="Validation errors"),
 *              @OA\Property(
 *                  property="errors",
 *                  type="object",
 *                  @OA\Property(
 *                      property="name",
 *                      type="array",
 *                      @OA\Items(type="string", example="The name field is required.")
 *                  ),
 *                  @OA\Property(
 *                      property="slug",
 *                      type="array",
 *                      @OA\Items(type="string", example="The slug field is required.")
 *                  ),
 *                  @OA\Property(
 *                      property="price",
 *                      type="array",
 *                      @OA\Items(type="string", example="The price field is required.")
 *                  )
 *              ),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:18:53")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="General error",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="message", type="string", example="Something went wrong"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 09:16:01"),
 *              @OA\Property(property="errors", type="string", example="")
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="message", type="string", example="Unauthorized"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:18:53"),
 *              @OA\Property(property="errors", type="string", example="Authentication token is missing or invalid")
 *          )
 *      )
 *  )
 *
 * @OA\Delete(
 *      path="/api/v1/product/{id}",
 *      summary="Delete a product",
 *      description="Delete a product by its ID",
 *      tags={"Product"},
 *      security={{"bearerAuth":{}}},
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          description="ID of the product to delete",
 *          required=true,
 *          @OA\Schema(type="integer", example=4)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Product deleted successfully",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="success"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:27:50"),
 *              @OA\Property(property="message", type="string", example="Product deleted successfully.")
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="General error",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="message", type="string", example="Something went wrong"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 09:16:01"),
 *              @OA\Property(property="errors", type="string", example="")
 *          )
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthorized",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="status", type="string", example="error"),
 *              @OA\Property(property="message", type="string", example="Unauthorized"),
 *              @OA\Property(property="timestamp", type="string", format="date-time", example="2025-12-02 10:27:50"),
 *              @OA\Property(property="errors", type="string", example="Authentication token is missing or invalid")
 *          )
 *      )
 *  )
 */

class ProductControllerDocs
{
}
