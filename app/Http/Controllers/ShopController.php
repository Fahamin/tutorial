<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // shp list
    public function index()
    {
        // read data from database
        $shopsList = DB::table('shops')->get(); // Replace with actual data retrieval logic
       // dd($shopsList);
        return view('shop.home',compact(    'shopsList'     ));
    }

    // show create form
    public function create()
    {
        return view('shop.create');
    }

    // store shop data

    public function store(Request $request)
    {

       // dd($request->all());
        // Validate the request data
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'shop_number' => 'required|integer',
            'shop_address' => 'required|string|max:255',
            'shop_phone' => 'required|string|max:20',
        ]);

        // Insert the new shop into the database
        DB::table('shops')->insert([
            'shop_name' => $request->input('shop_name'),
            'shop_number' => $request->input('shop_number'),
            'shop_address' => $request->input('shop_address'),
            'shop_phone' => $request->input('shop_phone'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the shop list with a success message
        return redirect()->route('shop.index')->with('success', 'Shop created successfully.');
    }

}
