<?php

namespace App\Http\Controllers\Admin\Cinema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cinema\StoreRequest;
use App\Http\Requests\Admin\Cinema\UpdateRequest;
use App\Models\Cinema;
use App\Models\City;

class CinemaController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::all();
        $cities = City::all();
        return view('admin.cinemas.index', compact('cinemas','cities'));
    }
    public function create()
    {
        $cities = City::all();
        return view('admin.cinemas.create', compact('cities'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $cinema = new Cinema();
        $cinema->name = $data['name'];
        $cinema->city_id = $data['city_id'];
        $cinema->place_count = $data['place_count'];
        $cinema->save();
        return redirect()->route('admin.cinema.index');
    }

    public function show(Cinema $cinema)
    {
        $city = City::find($cinema->city_id);
        return view('admin.cinemas.show', compact('cinema', 'city'));
    }
    public function update(UpdateRequest $request,Cinema $cinema)
    {
        $data = $request->validated();
        $cinema->update($data);
        $city = City::find($cinema->city_id);
        return view('admin.cinemas.show', compact('cinema', 'city'));
    }
    public function edit(Cinema $cinema)
    {
        $cities = City::all();
        return view('admin.cinemas.edit', compact('cinema','cities'));
    }
    public function delete(Cinema $cinema)
    {
        $cinema->cinemaHasFilms()->delete();
        $cinema->delete();
        return redirect()->route('admin.cinema.index');
    }
}
