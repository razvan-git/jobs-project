<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = Employer::latest()->get();

        return view('employer.index', ['employers' => $employers]);
    }

    public function show(Employer $employer)
    {
        $jobs = Job::query()
            ->with(['employer', 'tags'])
            ->where('employer_id', $employer->id)
            ->get();

        return view('employer.show', ['jobs' => $jobs]);
    }
}
