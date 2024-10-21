<?php

namespace App\Http\Controllers;

use App\Models\Organisatie;

abstract class Controller
{
    public static function getSetting($organisationId)
    {
        // Fetch the organisatie record based on the organisatie_id
        $organisatie = Organisatie::where('organisatie_id', $organisationId)->first();

        // Check if organisatie exists and return actiesMetSpraak or a default value
        if ($organisatie) {
            return $organisatie; // Return the entire organisatie object or specific property if needed
        }

        // Return null or a default value if not found
        return null;
    }
}
