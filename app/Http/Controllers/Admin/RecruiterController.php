<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RecruiterController extends Controller
{
    // Show all recruiters
    public function index(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $recruiters = Recruiter::with('user')
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
                })
                ->orWhere('company_name', 'like', "%{$search}%");
            })
            ->when($status, function ($query, $status) {
                if ($status !== 'all') {
                    $query->whereHas('user', function ($q) use ($status) {
                        $q->where('status', $status);
                    });
                }
            })
            ->paginate(10);

        return view('admin.recruiters.index', compact('recruiters', 'search', 'status'));
    }


    // Show create form
    public function create()
    {
        return view('admin.recruiters.create');
    }

    // Store new recruiter
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'phone_number'  => 'nullable|string|max:15',
            'company_name'  => 'required|string|max:255',
            'designation'   => 'nullable|string|max:255',
        ]);

        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'status' => 'active',
        ]);

        $user->assignRole('Recruiter');

        Recruiter::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'designation' => $request->designation,
        ]);

        return redirect()->route('admin.recruiters.index')->with('success', 'Recruiter added successfully!');
    }

    // Approve or reject recruiter
        public function updateStatus(Request $request, $id)
    {
        $recruiter = Recruiter::findOrFail($id);
        $recruiter->user->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }


    // Delete recruiter
    public function destroy($id)
    {
        $recruiter = Recruiter::findOrFail($id);
        $recruiter->delete();

        return redirect()->route('admin.recruiters.index')->with('success', 'Recruiter deleted successfully!');
    }
}
