<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
                $validated = $request->validate([
            'job_id'       => 'required|exists:jobs,id',
            'full_name'    => 'required|string|min:3|max:255',
            'email'        => 'required|email',
            'phone'        => 'nullable|string|max:20',
            'cover_letter' => 'required|string|min:20',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Application validated successfully',
            'data' => $validated
        ]);

    }
}
