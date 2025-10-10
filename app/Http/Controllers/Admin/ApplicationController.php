<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            // Candidate aur Job details ke saath fetch karo
            $applications = Application::with(['candidate', 'job.recruiter'])->get();
            return view('admin.applications.index', compact('applications'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'job_id' => 'required|exists:jobs,id',
    ]);

    $userId = auth()->id(); // or candidate ID if different

    // Check if already applied
    if(\App\Models\Application::where('job_id', $request->job_id)->where('user_id', $userId)->exists()){
        return response()->json(['success' => false, 'message' => 'Already applied']);
    }

    \App\Models\Application::create([
        'job_id' => $request->job_id,
        'user_id' => $userId,
        'status' => 'applied',
    ]);

    return response()->json(['success' => true]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // Status update
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Shortlisted,Rejected',
        ]);

        $application = Application::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return redirect()->back()->with('success', 'Application status updated successfully!');
    }
}
