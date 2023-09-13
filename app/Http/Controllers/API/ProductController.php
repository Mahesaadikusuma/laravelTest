<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index(Request $request) 
    {
        try {
            $id = $request->input('id');
            $products = Product::all();

            if ($id) {
                $product = Product::find($id);

                if($product) {
                    return response()->json([
                        'data' => $product,
                    ],  200 );
                }

                return response()->json([
                    'message' =>  'Product not found',
                ], 404);
            }
        return response()->json([
            'data' => $products
        ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function create(ProductRequest $request)
    {
        try {
            
            $product = Product::create([
                'name' => $request->name,
                'jenis_barang' => $request->jenis_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]);

            if(!$product) {
                return response()->json([
                    'message' => 'Product not created',
                ]);
            }

            return response()->json([
                'message' => 'Product created',
                'data' => $product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $item = Product::findOrFail($id);

            if (!$item) {
                return response()->json([
                    'message' => 'Product update not found',
                ], 404);
            }

            $item->update([
                'name' => $request->name,
                'jenis_barang' => $request->jenis_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]);
            // $item->update($request->all());
           
            return response()->json([
                'message' => 'success',
                'data' => $item,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
    

    public function destroy($id)
    {
        try {
            $item = Product::findOrFail($id);

            if (!$item) {
                return response()->json([
                    'message' => 'Product deleted not found',
                ], 404);
            }

            $item->delete();
        return response()->json([
            'message' => 'success',
            'data' => 'product deleted',
            
        ]);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
