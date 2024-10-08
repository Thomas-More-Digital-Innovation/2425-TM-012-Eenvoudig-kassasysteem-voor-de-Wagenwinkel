<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function submit(Request $request)
    {
        $selectedOrganization = $request->input('organization');

        return view('category', compact('selectedOrganization'));
    }


}
