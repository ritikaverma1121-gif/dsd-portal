<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    // List candidates
    public function index()
    {
        $candidates = Candidate::with('user')->latest()->paginate(10);
        return view('admin.candidates.index', compact('candidates'));
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
            'email'      => 'required|email|unique:users,email',
            'phone'      => 'nullable|string|max:15',
            'password'   => 'nullable|string|min:6',
            'resume'     => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'skills'     => 'nullable|string',
            'experience' => 'nullable|integer|min:0',
        ]);

        // Use provided password or default
        $password = $request->password ?? 'Test@12345';

        // 1️⃣ Create the user
        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone,
            'password'     => Hash::make($password),
        ]);

        // Optional: assign role if using Spatie roles
        if (method_exists($user, 'assignRole')) {
            $user->assignRole('Candidate');
        }

        // 2️⃣ Handle resume upload
        $resumePath = $request->hasFile('resume')
            ? $request->file('resume')->store('resumes', 'public')
            : null;

        // 3️⃣ Create candidate record
        Candidate::create([
            'user_id'    => $user->id,
            'resume'     => $resumePath,
            'skills'     => $request->skills,
            'experience' => $request->experience,
        ]);

        return redirect()->route('admin.candidates.index')
            ->with('success', 'Candidate added successfully!');
    }
    public function downloadResume(Candidate $candidate, Request $request)
    {
        if (!$candidate->resume || !Storage::disk('public')->exists($candidate->resume)) {
            abort(404, 'Resume not found.');
        }

        $filePath = storage_path('app/public/' . $candidate->resume);
        $fileName = $candidate->user->name . '_resume.' . pathinfo($candidate->resume, PATHINFO_EXTENSION);

        if ($request->query('download')) {
            return response()->download($filePath, $fileName);
        }

        return response()->file($filePath, [
            'Content-Disposition' => 'inline; filename="' . $fileName . '"'
        ]);
    }


}
