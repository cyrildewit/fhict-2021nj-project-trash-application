<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\MissingBarcode;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'title',
                AllowedFilter::exact('barcode'),
            ])
            ->jsonPaginate();

        return new ProductCollection($products);
    }

    public function showByBarcode($barcode)
    {
        $product = QueryBuilder::for(Product::class)
            ->where('barcode', $barcode)
            ->first();

        if ($product === null) {
            $missingBarcode = MissingBarcode::where('barcode', $barcode)->first();

            if ($missingBarcode === null) {
                MissingBarcode::create([
                    'barcode' => $barcode,
                    'lookups' => 1,
                ]);
            } else {
                $missingBarcode->increment('lookups');
            }

            throw new ModelNotFoundException();
        }

        return new ProductResource($product);
    }
}
