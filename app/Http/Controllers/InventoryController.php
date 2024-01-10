<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Product;
use App\Models\Inventory;
use Carbon\Carbon;

class InventoryController extends Controller
{
    function inventory($id){
        $product = Product::find($id);
        $sizes = Size::all();
        $inventory = Inventory::where('product_id', $id)->get();
        return view('layouts.dashboard.product.inventory', [
            'sizes'=>$sizes,
            'product'=>$product,
            'inventory'=>$inventory,
        ]);
    }
    

    function inventory_store(Request $request, $id){
        Inventory::insert([
            'product_id'=>$id,
            // 'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
}
