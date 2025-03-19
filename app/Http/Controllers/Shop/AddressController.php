<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validateAddress($request, 'billing');

        if ($request->ship_to_different_address == 1) {
            $this->validateAddress($request, 'shipping');
            $this->saveAddress($request, 'billing')->save();
            $this->saveAddress($request, 'shipping')->save();
        } else {
            $billingAddress = $this->saveAddress($request, 'billing');

            $shippingAddress = $billingAddress->replicate();
            $shippingAddress->address_type = 'shipping';

            $billingAddress->save();
            $shippingAddress->save();
        }


        return redirect()->route('checkout');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function validateAddress(Request $request, $type)
    {
        $request->validate([
            "{$type}_first_name" => 'required',
            "{$type}_last_name" => 'required',
            "{$type}_company" => 'required',
            "{$type}_mobile" => 'required',
            "{$type}_email" => 'required',
            "{$type}_address" => 'required',
            "{$type}_city" => 'required',
            "{$type}_zip" => 'required',
        ]);
    }

    private function saveAddress(Request $request, $type)
    {

        $address = Address::where('user_id', Auth::id())->where('address_type', $type)->first();
        if ($address) {

            // dd($address);

            $address->first_name = $request->input("{$type}_first_name");
            $address->last_name = $request->input("{$type}_last_name");
            $address->company_name = $request->input("{$type}_company");
            $address->phone = $request->input("{$type}_mobile");
            $address->email = $request->input("{$type}_email");
            $address->physical_address = $request->input("{$type}_address");
            $address->city = $request->input("{$type}_city");
            $address->post_code = $request->input("{$type}_zip");
            
            return $address;
        }

        $address = new Address();
        $address->user_id = Auth::id();
        $address->first_name = $request->input("{$type}_first_name");
        $address->last_name = $request->input("{$type}_last_name");
        $address->company_name = $request->input("{$type}_company");
        $address->phone = $request->input("{$type}_mobile");
        $address->email = $request->input("{$type}_email");
        $address->physical_address = $request->input("{$type}_address");
        $address->city = $request->input("{$type}_city");
        $address->post_code = $request->input("{$type}_zip");
        $address->address_type = $type;

        return $address;
    }
}
