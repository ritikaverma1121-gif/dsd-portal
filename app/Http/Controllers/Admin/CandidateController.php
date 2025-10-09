<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
    // List candidates
    public function index(Request $request)
    {
        $search = $request->input('search');

        $candidates = Candidate::with('user')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('admin.candidates.index', compact('candidates', 'search'));
    }

    // Show create form
    public function create()
    {
        return view('admin.candidates.create');
    }

    // Store candidate
   public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:candidates,email',
            'password'   => 'required|string|min:6',
            'phone'      => 'nullable|string|max:15',
            'resume'     => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'skills'     => 'nullable|string',
            'experience' => 'nullable|integer|min:0',
        ]);

        $resumePath = $request->file('resume') ? $request->file('resume')->store('resumes') : null;

        Candidate::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'phone'      => $request->phone,
            'resume'     => $resumePath,
            'skills'     => $request->skills,  // just store as string
            'experience' => $request->experience,
        ]);

        return redirect()->route('admin.candidates.index')->with('success', 'Candidate created successfully!');
    }


    // Show candidate
    public function show($id)
    {
        $candidate = Candidate::with('user')->findOrFail($id);
        return view('admin.candidates.show', compact('candidate'));
    }

    // Show edit form
    public function edit($id)
    {
        $candidate = Candidate::with('user')->findOrFail($id);
        return view('admin.candidates.edit', compact('candidate'));
    }

    // Update candidate
    public function update(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $user = $candidate->user;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:15',
            'resume' => 'nullable|file|mimes:pdf,doc,docx',
            'skills' => 'nullable|array',
            'experience' => 'nullable|integer',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
        ]);

        if ($request->hasFile('resume')) {
            if ($candidate->resume) Storage::delete($candidate->resume);
            $candidate->resume = $request->file('resume')->store('resumes');
        }

        $candidate->update([
            'skills' => $request->skills ? json_encode($request->skills) : null,
            'experience' => $request->experience,
        ]);

        return redirect()->route('admin.candidates.index')->with('success', 'Candidate updated successfully!');
    }

    // Delete candidate
    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        if ($candidate->resume) Storage::delete($candidate->resume);
        $candidate->user->delete();
        $candidate->delete();

        return redirect()->route('admin.candidates.index')->with('success', 'Candidate deleted successfully!');
    }
    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $recruiter = \App\Models\Recruiter::with('user')->findOrFail($id);
        $recruiter->user->status = $request->status;
        $recruiter->user->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!',
        ]);
    }

}
