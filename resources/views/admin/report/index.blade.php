@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Reports & Analytics</h1>
        <select class="border rounded px-3 py-1">
            <option>Last 30 days</option>
            <option>Last 7 days</option>
            <option>Last 12 months</option>
        </select>
    </div>
    <p class="text-gray-500 text-sm">Comprehensive insights and downloadable reports</p>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white border rounded-lg p-4 shadow">
            <div class="text-gray-500 text-sm">Platform Growth</div>
            <div class="text-xl font-bold text-green-600">+24.8%</div>
            <div class="text-gray-400 text-xs">vs last month</div>
        </div>
        <div class="bg-white border rounded-lg p-4 shadow">
            <div class="text-gray-500 text-sm">Job Fill Rate</div>
            <div class="text-xl font-bold">63.2%</div>
            <div class="text-gray-400 text-xs">vs last month</div>
        </div>
        <div class="bg-white border rounded-lg p-4 shadow">
            <div class="text-gray-500 text-sm">Avg Time to Hire</div>
            <div class="text-xl font-bold">24 days</div>
            <div class="text-gray-400 text-xs">-3 days improvement</div>
        </div>
        <div class="bg-white border rounded-lg p-4 shadow">
            <div class="text-gray-500 text-sm">User Satisfaction</div>
            <div class="text-xl font-bold">4.6/5.0</div>
            <div class="text-gray-400 text-xs">Based on 1,289 reviews</div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <!-- Recruiter Growth -->
        <div class="bg-white border rounded-lg p-4 shadow">
            <h2 class="text-gray-700 font-semibold mb-2">Recruiter Growth</h2>
            <p class="text-gray-400 text-sm mb-4">Total recruiters over time</p>
            <canvas id="recruiterGrowthChart" class="w-full h-64"></canvas>
        </div>

        <!-- Job Posting Performance -->
        <div class="bg-white border rounded-lg p-4 shadow">
            <h2 class="text-gray-700 font-semibold mb-2">Job Posting Performance</h2>
            <p class="text-gray-400 text-sm mb-4">Jobs posted vs filled by category</p>
            <canvas id="jobPostingChart" class="w-full h-64"></canvas>
        </div>
    </div>
    <div class=" mx-auto">
        <!-- Candidate Engagement Trends -->
        <div class="bg-white p-6 rounded-2xl shadow-md mb-8">
            <h2 class="text-lg font-semibold text-gray-800">Candidate Engagement Trends</h2>
            <p class="text-sm text-gray-500 mb-4">Weekly candidate activity metrics</p>

            <canvas id="engagementChart" height="120"></canvas>
        </div>

        <!-- Downloadable Reports -->
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Downloadable Reports</h2>
            <p class="text-sm text-gray-500 mb-6">Export detailed reports in PDF or Excel format</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Monthly Recruiter Report -->
                <div class="flex items-center justify-between p-4 border rounded-xl hover:shadow-md transition">
                    <div class="flex items-start space-x-3">
                        <div class="p-3 bg-blue-50 text-blue-700 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A1 1 0 014 17V7a1 1 0 011.121-.804l13.758 5.5a1 1 0 010 1.608l-13.758 5.5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Monthly Recruiter Report</h3>
                            <p class="text-sm text-gray-500">Comprehensive recruiter activity and performance</p>
                            <p class="text-xs text-gray-400 mt-1">Oct 2025</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="flex items-center text-sm px-3 py-1.5 border rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            PDF
                        </button>
                        <button class="flex items-center text-sm px-3 py-1.5 border rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v10M16 7v10" />
                            </svg>
                            Excel
                        </button>
                    </div>
                </div>

                <!-- Job Posting Performance -->
                <div class="flex items-center justify-between p-4 border rounded-xl hover:shadow-md transition">
                    <div class="flex items-start space-x-3">
                        <div class="p-3 bg-purple-50 text-purple-700 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Job Posting Performance</h3>
                            <p class="text-sm text-gray-500">Detailed job posting and application analytics</p>
                            <p class="text-xs text-gray-400 mt-1">Oct 2025</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="flex items-center text-sm px-3 py-1.5 border rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            PDF
                        </button>
                        <button class="flex items-center text-sm px-3 py-1.5 border rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v10M16 7v10" />
                            </svg>
                            Excel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const recruiterCtx = document.getElementById('recruiterGrowthChart').getContext('2d');
new Chart(recruiterCtx, {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun'],
        datasets: [{
            label: 'Total Recruiters',
            data: [2200, 2300, 2400, 2500, 2600, 2750],
            backgroundColor: 'rgba(59, 130, 246, 0.2)',
            borderColor: 'rgba(59, 130, 246, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});

const jobCtx = document.getElementById('jobPostingChart').getContext('2d');
new Chart(jobCtx, {
    type: 'bar',
    data: {
        labels: ['Tech','Marketing','Sales','Design','Operations'],
        datasets: [
            {
                label: 'Posted',
                data: [450, 300, 220, 180, 160],
                backgroundColor: 'rgba(59, 130, 246, 0.8)'
            },
            {
                label: 'Filled',
                data: [300, 180, 150, 140, 120],
                backgroundColor: 'rgba(88, 28, 135, 0.8)'
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
<script>
    const ctx = document.getElementById('engagementChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [
                {
                    label: 'applications',
                    data: [450, 420, 510, 480],
                    borderColor: '#6b21a8',
                    backgroundColor: '#6b21a8',
                    tension: 0.4,
                    fill: false,
                },
                {
                    label: 'interviews',
                    data: [100, 90, 102, 98],
                    borderColor: '#db2777',
                    backgroundColor: '#db2777',
                    tension: 0.4,
                    fill: false,
                },
                {
                    label: 'registrations',
                    data: [280, 300, 312, 290],
                    borderColor: '#0284c7',
                    backgroundColor: '#0284c7',
                    tension: 0.4,
                    fill: false,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: { mode: 'index', intersect: false },
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 600,
                    grid: { color: '#f1f5f9' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
</script>
@endsection
