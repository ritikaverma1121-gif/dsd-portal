@extends('layouts.app')



@section('content')
<section class="bg-amber-100 min-h-screen p-8">
  <div class="max-w-7xl">
    <!-- Header -->
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, Admin</h1>
    <p class="text-gray-700 mb-8">
      Here's what's happening with your recruiter portal today.
    </p>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      
      <!-- Card 1 -->
      <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
          <h3 class="text-gray-700 font-medium">Total Recruiters</h3>
          <p class="text-3xl font-bold text-gray-900 mt-2">248</p>
          <p class="text-green-600 text-sm mt-1">+12% from last month</p>
        </div>
        <div class="bg-lime-700 text-white p-3 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-3-3h-2m0 5H7a2 2 0 01-2-2v-5a2 2 0 012-2h3l2-3 2 3h3a2 2 0 012 2v5a2 2 0 01-2 2z" />
          </svg>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
          <h3 class="text-gray-700 font-medium">Total Candidates</h3>
          <p class="text-3xl font-bold text-gray-900 mt-2">1,847</p>
          <p class="text-green-600 text-sm mt-1">+18% from last month</p>
        </div>
        <div class="bg-lime-700 text-white p-3 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A6 6 0 1118.878 6.196M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
          <h3 class="text-gray-700 font-medium">Total Jobs Posted</h3>
          <p class="text-3xl font-bold text-gray-900 mt-2">342</p>
          <p class="text-green-600 text-sm mt-1">+8% from last month</p>
        </div>
        <div class="bg-lime-700 text-white p-3 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-9 5h9" />
          </svg>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
          <h3 class="text-gray-700 font-medium">Active Jobs</h3>
          <p class="text-3xl font-bold text-gray-900 mt-2">127</p>
          <p class="text-green-600 text-sm mt-1">+5% from last month</p>
        </div>
        <div class="bg-lime-700 text-white p-3 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
          </svg>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
          <h3 class="text-gray-700 font-medium">Applications Received</h3>
          <p class="text-3xl font-bold text-gray-900 mt-2">3,624</p>
          <p class="text-green-600 text-sm mt-1">+24% from last month</p>
        </div>
        <div class="bg-lime-700 text-white p-3 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8m-8-4h8m-8-4h8M4 6h16M4 18h16" />
          </svg>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
          <h3 class="text-gray-700 font-medium">Shortlisted / Hired</h3>
          <p class="text-3xl font-bold text-gray-900 mt-2">289</p>
          <p class="text-green-600 text-sm mt-1">+15% from last month</p>
        </div>
        <div class="bg-lime-700 text-white p-3 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
      </div>
    </div>
  </div>
  <!-- Chart.js CDN -->
  <div class="py-8">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          
          <!-- Job Posting Trends (Line Chart) -->
          <div class="bg-white rounded-xl shadow-md p-6 h-72">
              <h2 class="text-lg font-semibold mb-4">Job Posting Trends</h2>
              <canvas id="jobPostingChart" class="w-full h-full"></canvas>
          </div>


          <!-- Applications Trends (Bar Chart) -->
          <div class="bg-white rounded-xl shadow-md p-6 h-72">
              <h2 class="text-lg font-semibold mb-4">Applications Trends</h2>
              <canvas id="applicationsChart" class="w-full h-full"></canvas>
          </div>

      </div>
  </div>
  <div class="p-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Top Performing Recruiters -->
    <div class="bg-white rounded-xl shadow-md p-6">
      <h2 class="text-lg font-semibold mb-4">Top Performing Recruiters</h2>
      <ul class="space-y-4">
        <!-- Recruiter Item -->
        <li class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="bg-[#788c0c] text-white font-semibold w-12 h-12 rounded-full flex items-center justify-center text-sm">SJ</div>
            <div>
              <div class="font-semibold flex items-center gap-1">
                <span>Sarah Johnson</span>
                <span title="Top Recruiter">👑</span>
              </div>
              <div class="text-sm text-gray-500">TechCorp Inc.</div>
            </div>
          </div>
          <span class="bg-[#788c0c] text-white text-sm font-medium px-3 py-1 rounded-full">42 hires</span>
        </li>

        <li class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="bg-[#788c0c] text-white font-semibold w-12 h-12 rounded-full flex items-center justify-center text-sm">MC</div>
            <div>
              <div class="font-semibold">Michael Chen</div>
              <div class="text-sm text-gray-500">InnovateLabs</div>
            </div>
          </div>
          <span class="bg-[#788c0c] text-white text-sm font-medium px-3 py-1 rounded-full">38 hires</span>
        </li>

        <li class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="bg-[#788c0c] text-white font-semibold w-12 h-12 rounded-full flex items-center justify-center text-sm">ER</div>
            <div>
              <div class="font-semibold">Emily Rodriguez</div>
              <div class="text-sm text-gray-500">Global Ventures</div>
            </div>
          </div>
          <span class="bg-[#788c0c] text-white text-sm font-medium px-3 py-1 rounded-full">35 hires</span>
        </li>

        <li class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="bg-[#788c0c] text-white font-semibold w-12 h-12 rounded-full flex items-center justify-center text-sm">DK</div>
            <div>
              <div class="font-semibold">David Kim</div>
              <div class="text-sm text-gray-500">StartupHub</div>
            </div>
          </div>
          <span class="bg-[#788c0c] text-white text-sm font-medium px-3 py-1 rounded-full">31 hires</span>
        </li>

        <li class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="bg-[#788c0c] text-white font-semibold w-12 h-12 rounded-full flex items-center justify-center text-sm">JW</div>
            <div>
              <div class="font-semibold">Jessica Williams</div>
              <div class="text-sm text-gray-500">Enterprise Solutions</div>
            </div>
          </div>
          <span class="bg-[#788c0c] text-white text-sm font-medium px-3 py-1 rounded-full">28 hires</span>
        </li>
      </ul>
    </div>

    <!-- Recent Notifications -->
    <div class="bg-white rounded-xl shadow-md p-6">
      <h2 class="text-lg font-semibold mb-4">Recent Notifications</h2>
      <div class="space-y-4">
        <!-- Notification Item -->
        <div class="bg-gray-50 p-4 rounded-lg flex items-start gap-3">
          <div class="text-[#788c0c] text-xl">
            <i class="fas fa-user-plus"></i>
          </div>
          <div class="flex-1">
            <div class="font-medium">New Recruiter Sign-up
              <span class="ml-2 text-xs text-white bg-[#cdd296] px-2 py-0.5 rounded-full">New</span>
            </div>
            <div class="text-sm text-gray-600">Alex Thompson from DevCo joined the platform</div>
            <div class="text-xs text-gray-400 mt-1">5 min ago</div>
          </div>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg flex items-start gap-3">
          <div class="text-[#788c0c] text-xl">
            <i class="fas fa-exclamation-circle"></i>
          </div>
          <div class="flex-1">
            <div class="font-medium">Pending Approval
              <span class="ml-2 text-xs text-white bg-[#788c0c] px-2 py-0.5 rounded-full">Action Required</span>
            </div>
            <div class="text-sm text-gray-600">3 recruiter applications awaiting review</div>
            <div class="text-xs text-gray-400 mt-1">1 hour ago</div>
          </div>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg flex items-start gap-3">
          <div class="text-[#788c0c] text-xl">
            <i class="fas fa-bell"></i>
          </div>
          <div class="flex-1">
            <div class="font-medium">System Update
              <span class="ml-2 text-xs text-white bg-gray-400 px-2 py-0.5 rounded-full">Info</span>
            </div>
            <div class="text-sm text-gray-600">Platform maintenance scheduled for tonight</div>
            <div class="text-xs text-gray-400 mt-1">2 hours ago</div>
          </div>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg flex items-start gap-3">
          <div class="text-[#788c0c] text-xl">
            <i class="fas fa-user-plus"></i>
          </div>
          <div class="flex-1">
            <div class="font-medium">New Recruiter Sign-up
              <span class="ml-2 text-xs text-white bg-[#cdd296] px-2 py-0.5 rounded-full">New</span>
            </div>
            <div class="text-sm text-gray-600">Maria Garcia from NextGen Tech registered</div>
            <div class="text-xs text-gray-400 mt-1">3 hours ago</div>
          </div>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg flex items-start gap-3">
          <div class="text-[#788c0c] text-xl">
            <i class="fas fa-exclamation-circle"></i>
          </div>
          <div class="flex-1">
            <div class="font-medium">Pending Approval
              <span class="ml-2 text-xs text-white bg-[#788c0c] px-2 py-0.5 rounded-full">Action Required</span>
            </div>
            <div class="text-sm text-gray-600">7 new job postings need verification</div>
            <div class="text-xs text-gray-400 mt-1">5 hours ago</div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

</section>

@endsection
@section('jscontent')
<!-- Chart.js Scripts -->

@endsection
