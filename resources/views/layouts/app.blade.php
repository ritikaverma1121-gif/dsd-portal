<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hiring Portal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="font-sans bg-gray-100 antialiased ">

    <!-- Header -->
    <header class="bg-white shadow sticky top-0 z-50">
        <x-header-component />
    </header>

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <x-sidebar-component />

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>

    </div>

    <!-- Footer -->
    <footer class="bg-white shadow">
        <x-footer-component />
    </footer>
<script>
    const jobPostingCtx = document.getElementById('jobPostingChart').getContext('2d');
    const jobPostingChart = new Chart(jobPostingCtx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'],
            datasets: [{
                label: 'Job Posts',
                data: [25, 32, 29, 45, 38, 52],
                borderColor: '#788c0c',
                backgroundColor: '#788c0c33',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#788c0c',
                pointBorderColor: '#788c0c',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 60
                }
            }
        }
    });

    const applicationsCtx = document.getElementById('applicationsChart').getContext('2d');
    const applicationsChart = new Chart(applicationsCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Applications',
                data: [300, 450, 390, 520, 480, 610],
                backgroundColor: '#788c0c',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 800
                }
            }
        }
    });
</script>
</body>
</html>
