<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditProductController extends Controller
{
    public function view($id)
    {
        // Execute the query to fetch the product and related category details
        $product = DB::table('PRODUK as p')
        ->join('CATEGORY as c', 'p.CATEGORY_ID', '=', 'c.CATEGORY_ID')
        ->select('p.PRODUCT_ID', 'p.PRODUCT_NAME', 'p.PRODUCT_DESC', 'p.PRODUCT_PRICE', 'p.PRODUCT_STOCK', 'c.CATEGORY_NAME', 'c.CATEGORY_ANIMAL', 'c.CATEGORY_ID')
        ->where('p.PRODUCT_ID', $id)
        ->first();

        // Fetch all categories and animals
        $categories = DB::table('CATEGORY')
        ->select('CATEGORY_ID', 'CATEGORY_NAME')
        ->distinct()
        ->get();

        $categoryNames = DB::table('category')->select('category_name')->distinct()->get();

        $animals = DB::table('CATEGORY')->select('CATEGORY_ANIMAL')->distinct()->get();

        // Pass the data to the view
        return view('edit-product', compact('product', 'categories', 'animals','categoryNames'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'productName' => 'required|string|max:255',
            'productCat' => 'required|string|max:255',
            'productAnimal' => 'required|string|max:255',
            'editDesc' => 'nullable|string',
            'productPrice' => 'required|numeric',
            'qtybutton' => 'required|integer',
        ]);

        // Fetch the correct category_id based on productCat and productAnimal
        $category = DB::table('category')
            ->where('category_name', $request->input('productCat'))
            ->where('category_animal', $request->input('productAnimal'))
            ->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Invalid category or animal.');
        }

        // Update the product in the database
        DB::table('produk')
            ->where('PRODUCT_ID', $id)
            ->update([
                'product_name' => $request->input('productName'),
                'category_id' => $category->CATEGORY_ID,
                'PRODUCT_DESC' => $request->input('editDesc'),
                'PRODUCT_PRICE' => $request->input('productPrice'),
                'PRODUCT_STOCK' => $request->input('qtybutton'),
            ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product updated successfully.');
    }


}
