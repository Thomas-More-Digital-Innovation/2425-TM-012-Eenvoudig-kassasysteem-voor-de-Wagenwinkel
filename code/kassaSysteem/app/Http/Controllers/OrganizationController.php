<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function submit(Request $request)
    {
        // Get the selected organization from the request
        $selectedOrganization = $request->input('organization');

        // Pass the selected organization to the view
        return view('result', compact('selectedOrganization'));
    }
}
