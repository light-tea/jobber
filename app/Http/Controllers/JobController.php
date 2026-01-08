<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::paginate(5);
        return view('jobs.index', compact('jobs'));
    }


    public function show($id)
    {
        return view('jobs.show', [
            'job' => Job::findOrFail($id)
        ]);
    }

}

