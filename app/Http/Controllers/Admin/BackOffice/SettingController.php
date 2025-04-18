<?php

namespace App\Http\Controllers\Admin\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Company;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $company = Company::first();
        // dd($company);
        return view('admin.settings.index', compact('company'));
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
        //
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

   public function getGeneralSettings()
    {
        $company = Company::first();
        return view('admin.settings.general', compact('company'));
    }

    public function getEmailSettings()
    {

        return view('admin.settings.email');
    }
    public function getAppearanceSettings()
    {

        return view('admin.settings.appearance');
    }
    public function getPaymentSettings()
    {

        return view('admin.settings.payment');
    }
    public function getShippingSettings()
    {

        return view('admin.settings.shipping');
    }
    public function getStoreSettings()
    {

        return view('admin.settings.store');
    }

}
