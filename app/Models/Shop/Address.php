<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Address extends Model
{
    protected $guarded = [];

    /**
     * Validate address input.
     */
    public static function validateAddress(Request $request, $type)
    {
        $request->validate([
            "{$type}_first_name" => 'required',
            "{$type}_last_name" => 'required',
            "{$type}_mobile" => 'required',
            "{$type}_email" => 'required',
            "{$type}_address" => 'required',
            "{$type}_city" => 'required',
            "{$type}_zip" => 'required',
        ]);
    }

    /**
     * Save or update billing address.
     */
    public static function saveBillingAddress(Request $request, $type = 'billing')
    {
        $billingAddress = self::firstOrNew([
            'user_id' => Auth::id(),
            'address_type' => $type
        ]);

        $billingAddress->first_name = $request->input("{$type}_first_name");
        $billingAddress->last_name = $request->input("{$type}_last_name");
        $billingAddress->company_name = $request->input("{$type}_company");
        $billingAddress->phone = $request->input("{$type}_mobile");
        $billingAddress->email = $request->input("{$type}_email");
        $billingAddress->physical_address = $request->input("{$type}_address");
        $billingAddress->city = $request->input("{$type}_city");
        $billingAddress->post_code = $request->input("{$type}_zip");
        $billingAddress->address_type = $type;

        return $billingAddress;
    }

    /**
     * Save or update shipping address.
     */
    public static function saveShippingAddress(Request $request, $type = 'shipping', $ship_to_different_address)
    {

        $shippingAddress = self::firstOrNew([
            'user_id' => Auth::id(),
            'address_type' => $type
        ]);

        $shippingAddress->first_name = $ship_to_different_address ?  $request->input("{$type}_first_name") : $request->input("billing_first_name");
        $shippingAddress->last_name = $ship_to_different_address ?  $request->input("{$type}_last_name") : $request->input("billing_last_name");
        $shippingAddress->company_name = $ship_to_different_address ?  $request->input("{$type}_company") : $request->input("billing_company");
        $shippingAddress->phone = $ship_to_different_address ?  $request->input("{$type}_mobile") : $request->input("billing_mobile");
        $shippingAddress->email = $ship_to_different_address ?  $request->input("{$type}_email") : $request->input("billing_email");
        $shippingAddress->physical_address = $ship_to_different_address ?  $request->input("{$type}_address") : $request->input("billing_address");
        $shippingAddress->city = $ship_to_different_address ?  $request->input("{$type}_city") : $request->input("billing_city");
        $shippingAddress->post_code = $ship_to_different_address ?  $request->input("{$type}_zip") : $request->input("billing_zip");
        $shippingAddress->address_type = $type;

        return $shippingAddress;
    }
}
