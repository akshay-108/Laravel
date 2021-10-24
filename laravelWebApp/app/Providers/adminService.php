<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\AdminController;
use App\Models\admin;
use Illuminate\Http\Request;

class adminService extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function AdminCheck(Request $request,admin $admin)
    {
        // check admin username or password
        

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
