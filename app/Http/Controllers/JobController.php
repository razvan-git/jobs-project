<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()
            ->with(['employer', 'tags'])
            ->where('featured', 0)
            ->paginate(10);


        $featuredJobs = Job::latest()
            ->with(['employer', 'tags'])
            ->where('featured', 1)
            ->limit(3)
            ->get();

        return view('jobs.index', [
            'jobs'          =>  $jobs,
            'featuredJobs'  =>  $featuredJobs,
            'tags'          =>  Tag::limit(20)->get()
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $attributes = $request->validate([
            'title'     =>  ['required'],
            'salary'    =>  ['required'],
            'location'  =>  ['required'],
            'schedule'  =>  ['required', Rule::in(['Full Time', 'Part Time'])],
            'url'       =>  ['required', 'url'],
            'tags'      =>  ['nullable']
        ]);

        $attributes['featured'] = $request->has('featured');


        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags']) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag(strtolower(trim($tag)));
            }
        }

        return redirect('/');
    }

    public function update(Job $job, Request $request)
    {
        $attributes = $request->validate([
            'title'     =>  ['required'],
            'salary'    =>  ['required'],
            'location'  =>  ['required'],
            'schedule'  =>  ['required', Rule::in(['Full Time', 'Part Time'])],
            'url'       =>  ['required', 'url'],
            'tags'      =>  ['nullable']
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->findOrFail($job->id);
        $job->update(Arr::except($attributes, 'tags'));

        $job->tags()->detach();

        if ($attributes['tags']) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag(strtolower(trim($tag)));
            }
        }

        return redirect('/myjobs');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/myjobs');
    }

    public function getUserJobs()
    {
        $jobs = Job::query()
            ->with(['employer', 'tags'])
            ->where('employer_id', Auth::user()->employer->id)
            ->get();

        return view('jobs.user-jobs', [
            'jobs'          =>  $jobs
        ]);
    }
}
