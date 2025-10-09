<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with('recruiter');

        // search by title or recruiter name
        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%")
                  ->orWhereHas('recruiter', function ($q) use ($request) {
                      $q->where('name', 'like', "%{$request->search}%");
                  });
        }

        // filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // filter by job type
        if ($request->filled('type')) {
            $query->where('job_type', $request->type);
        }

        $jobs = $query->latest()->paginate(10);

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $recruiters = User::whereHas('roles', function ($q) {
                    $q->where('name', 'Recruiter');
                })->latest()->get();
        return view('admin.jobs.create', compact('recruiters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,remote,contract',
            'status' => 'required|in:active,closed',
            'deadline' => 'required|date',
            'openings' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
        ]);

        Job::create($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit(Job $job)
    {
        $recruiters = User::all();
        return view('admin.jobs.edit', compact('job', 'recruiters'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,remote,contract',
            'status' => 'required|in:active,closed',
            'deadline' => 'required|date',
            'openings' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
        ]);

        $job->update($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
