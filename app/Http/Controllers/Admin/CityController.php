<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cities = City::all();
        return view('admin/cities', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $countries = Country::all();

        return view('admin/addCity', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $city = new City;
      $city->name = $request->input('name');
      $city->headerImage = $request->file('headerImage')->store('cities/headerImage','public');
      $country = Country::find($request->input('country'));
      $country->cities()->save($city);
      $city->save();



      return redirect()->route('admin.cities.show', [$city]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $city = City::findorfail($id);
      $countries = Country::all();
      $apps = App::all();

      return view('admin/city', compact('city', 'countries', 'apps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $city = City::find($id);
      if ($request->filled('name')) {
        $city->name = $request->input('name');
      }
      if ($request->hasFile('headerImage')) {
      //  File::delete(storage_path($city->headerImage));
        Storage::disk('public')->delete($city->headerImage);
        $city->headerImage = $request->file('headerImage')->store('cities/headerImage', 'public');
      //    $city->headerImage = Storage::disk('public')->put('cities/headerImage',$request->file);
      //  $city->headerImage = $request->file('headerImage')->store('cities/headerImage','public');
      }
      $country = Country::find($request->input('country'));
      $city->country()->associate($country);
      $city->apps()->sync($request->input('apps'));
      $city->save();



      return redirect()->route('admin.cities.show', [$city]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
