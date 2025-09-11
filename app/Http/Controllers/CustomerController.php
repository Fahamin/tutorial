<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    
     public function index(Request $request)
    {
        $query = Customer::orderBy('id');

        if ($search = $request->search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Fix: use $request->all() instead of $request->search
        $customerList = $query->paginate(10)->appends($request->all());

        return view('customer.index', compact('customerList'));
    }
     public function create()
    {
        return view('customer.create');
    }

    // store shop data

    public function store(Request $request)
    {

      //   dd($request->all());
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|max:255',
        ]);


        Customer::create($request->all());
     

        // Redirect to the shop list with a success message
        return redirect()->route('customer.index')->with('success', 'Shop created successfully.');
    }


    // show edit form
    public function edit($id)
    {
        // Fetch the shop details from the database
        $customer = DB::table('customers')->where('id', $id)->first();

        if (!$customer) {
            return redirect()->route('customer.edit')->with('error', 'Shop not found.');
        }

        return view('customer.edit', compact('customer'));
    }

    // update shop data
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|max:255',
        ]);

        // Update the shop in the database
        try {

            Customer::where('id', $id)->update($request->only(['name', 'phone', 'email']));
            
        } catch (\Exception $e) {
            Log::error('Error updating shop: ' . $e->getMessage());
            return redirect()->route('customer.index')->with('error', 'Error fetching shop: ' . $e->getMessage());
        }



        // Redirect to the shop list with a success message
        return redirect()->route('customer.index')->with('success', 'Shop updated successfully.');
    }

    // delete shop
    public function destroy($id)
    {
        // Delete the shop from the database
        try {
           Customer::where('id', $id)->delete();
        } catch (\Exception $e) {
            Log::error('Error deleting shop: ' . $e->getMessage());
            return redirect()->route('customer.index')->with('error', 'Error deleting shop: ' . $e->getMessage());
        }

        // Redirect to the shop list with a success message
        return redirect()->route('customer.index')->with('success', 'Shop deleted successfully.');
    }
}


