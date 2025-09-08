<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Log;
use function Laravel\Prompts\search;

class ShopController extends Controller
{
    // shp list
    public function index(Request $request)
    {
        $query = DB::table('shops')->orderBy('id');

        if ($search = $request->search) {
            $query->where(function ($q) use ($search) {
                $q->where('shop_name', 'like', "%{$search}%")
                    ->orWhere('shop_address', 'like', "%{$search}%")
                    ->orWhere('shop_phone', 'like', "%{$search}%");
            });
        }

        // Fix: use $request->all() instead of $request->search
        $shopsList = $query->paginate(10)->appends($request->all());

        return view('shop.home', compact('shopsList'));
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


    // show edit form
    public function edit($id)
    {
        // Fetch the shop details from the database
        $shop = DB::table('shops')->where('id', $id)->first();

        if (!$shop) {
            return redirect()->route('shop.edit')->with('error', 'Shop not found.');
        }

        return view('shop.edit', compact('shop'));
    }

    // update shop data
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'shop_number' => 'required|integer',
            'shop_address' => 'required|string|max:255',
            'shop_phone' => 'required|string|max:20',
        ]);

        // Update the shop in the database
        try {
            DB::table('shops')->where('id', $id)->update([
                'shop_name' => $request->input('shop_name'),
                'shop_number' => $request->input('shop_number'),
                'shop_address' => $request->input('shop_address'),
                'shop_phone' => $request->input('shop_phone'),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating shop: ' . $e->getMessage());
            return redirect()->route('shop.index')->with('error', 'Error fetching shop: ' . $e->getMessage());
        }



        // Redirect to the shop list with a success message
        return redirect()->route('shop.index')->with('success', 'Shop updated successfully.');
    }

    // delete shop
    public function destroy($id)
    {
        // Delete the shop from the database
        try {
            DB::table('shops')->where('id', $id)->delete();
        } catch (\Exception $e) {
            Log::error('Error deleting shop: ' . $e->getMessage());
            return redirect()->route('shop.index')->with('error', 'Error deleting shop: ' . $e->getMessage());
        }

        // Redirect to the shop list with a success message
        return redirect()->route('shop.index')->with('success', 'Shop deleted successfully.');
    }
}
