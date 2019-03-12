<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\City;
use App\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function index(){
    $countries = Country::count();
    $cities = City::count();
    $apps = App::count();

    return view('admin/dashboard', compact('countries','cities','apps'));
  }
}
