<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;

class DashboardController extends Controller
{
    public function __construct(
        protected AdminService $adminService
    ) {
    }

    public function index()
    {
        $statistics =
            $this->adminService
                ->getDashboardStatistics();

        return view(
            'admin.dashboard',
            compact('statistics')
        );
    }
}