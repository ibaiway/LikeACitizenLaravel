<?php

namespace App\Http\Controllers\Admin;

use App\App;
use App\Category;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $apps = App::all();
        return view('admin/apps', compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      $countries = Country::all();

        return view('admin/addApp', compact('categories','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $app = new App;
      $app->name = $request->input('name');
      $app->image = $request->file('image')->store('apps/images');
      $app->appleLink = $request->input('appleLink');
      $app->googleLink = $request->input('googleLink');
      $app->offerCode = $request->input('offerCode');
      $app->offerText = $request->input('offerText');
      $app->save();
      $app->categories()->attach($request->input('categories'));
      $app->cities()->attach($request->input('cities'));


      return redirect()->route('admin.apps.show', [$app]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function show(App $app)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function edit(App $app)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, App $app)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function destroy(App $app)
    {
        //
    }
}
