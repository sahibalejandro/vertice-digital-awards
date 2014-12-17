<?php namespace App\Controllers;

use View;

class AdminDashboardController extends \BaseController
{

    public function index()
    {
        return View::make('admin.dashboard.index');
    }

}
