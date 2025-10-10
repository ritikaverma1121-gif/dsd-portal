<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display analytics and report dashboard.
     */
    public function index()
    {
        // Static or dynamic data for analytics
        $stats = [
            'platform_growth' => '+24.8%',
            'job_fill_rate' => '63.2%',
            'avg_time_to_hire' => '24 days',
            'user_satisfaction' => '4.6/5.0',
        ];

        // Return the view from resources/views/admin/report/index.blade.php
        return view('admin.report.index', compact('stats'));
    }
}
