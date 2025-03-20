<?php

namespace App\Http\Controllers\Admin\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Admin\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    //
    public function updateLogo(Request $request){
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logo = $request->file('logo');


        $company = Company::first();

        if ($company !== null) {

            //delete the old logo first
            Storage::disk('public')->delete($company->logo);

            $company->update([
                'logo' => $logo->store('logos', 'public'),
            ]);
        } else {
            Company::create([
                'logo' => $logo->store('logos', 'public'),
            ]);
        }

        return redirect()->back()->with('success', 'Logo updated successfully');

    }
}
