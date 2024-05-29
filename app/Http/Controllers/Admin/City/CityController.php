<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\StoreRequest;
use App\Http\Requests\Admin\City\UpdateRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }
    public function create()
    {
        return view('admin.cities.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        City::firstOrCreate(['name' => $data['name']],['name' => $data['name']]);
        return redirect()->route('admin.city.index');
    }
    public function show(City $city)
    {
        return view('admin.cities.show', compact('city'));
    }
    public function update(UpdateRequest $request,City $city)
    {
        $data = $request->validated();
        $city->update($data);
        return view('admin.cities.show', compact('city'));
    }
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }
    public function delete(City $city)
    {
        foreach ($city->cinemas as $cinema) {
            $cinema->cinemaHasFilms()->delete();
        }
        $city->cinemas()->delete();
        $city->delete();
        return redirect()->route('admin.city.index');
    }

}
