<!-- resources/views/admin/dashboard.blade.php -->

<h1>Super Admin Dashboard</h1>
<div class="grid grid-cols-4 gap-4">
    <div class="card p-4 bg-blue-200">Total Recruiters: {{ $totalRecruiters }}</div>
    <div class="card p-4 bg-green-200">Total Jobs: {{ $totalJobs }}</div>
    <div class="card p-4 bg-yellow-200">Total Candidates: {{ $totalCandidates }}</div>
    <div class="card p-4 bg-red-200">Total Applications: {{ $totalApplications }}</div>
</div>
