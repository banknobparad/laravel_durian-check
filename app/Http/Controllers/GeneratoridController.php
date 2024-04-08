<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneratoridController extends Controller
{
    public static function IDGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('created_at', 'desc')->first();

        if (!$data) {
            // Initialize with 0001 for the first ID
            $last_number = 1;
            $og_length = $length - strlen($last_number); // Adjust for leading zeros
        } else {
            // Extract and increment the last number for subsequent IDs
            $code = substr($data->$trow, strlen($prefix) + 1);
            $actial_last_number = ($code / 1) * 1; // Ensure integer conversion
            $increment_last_number = ((int)$actial_last_number) + 1;
            $last_number = $increment_last_number;
            $og_length = $length - strlen($last_number);
        }

        $zeros = str_pad('', $og_length, '0'); // Efficiently generate leading zeros
        return $prefix . '-' . $zeros . $last_number;
    }
}

