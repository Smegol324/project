<?php

namespace App\Http\Controllers\Admin\Film;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Film\StoreRequest;
use App\Http\Requests\Admin\Film\UpdateRequest;
use App\Models\Cinema;
use App\Models\City;
use App\Models\Film;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('admin.films.index', compact('films'));
    }
    public function create()
    {
        $films = Film::all();
        return view('admin.films.create', compact('films'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $film = new Film();
        $film->name = $data['name'];
        $film->cost = $data['cost'];
        $film->dateAdd = date('Y-m-d', strtotime($data['dateAdd']));
        $film->description = $data['description'];
        $film->image = Storage::disk('public')->put('/images', $data['image']);
        $hours = str_pad($data['hours'], 2, '0', STR_PAD_LEFT);
        $minutes = str_pad($data['minutes'], 2, '0', STR_PAD_LEFT);
        $seconds = str_pad($data['seconds'], 2, '0', STR_PAD_LEFT);
        $length = "{$hours}:{$minutes}:{$seconds}";
        $film->length = $length;
        $film->save();
        return redirect()->route('admin.film.index');
    }

    public function show(Film $film)
    {
        return view('admin.films.show', compact('film'));
    }
    public function update(UpdateRequest $request, Film $film)
    {
        $data = $request->validated();
        $film->name = $data['name'];
        $film->cost = $data['cost'];
        $film->dateAdd = date('Y-m-d', strtotime($data['dateAdd']));
        $film->description = $data['description'];
        if (isset($data['image']))
        {
            $film->image = Storage::put('/images', $data['image']);
        }
        $hours = str_pad($data['hours'], 2, '0', STR_PAD_LEFT);
        $minutes = str_pad($data['minutes'], 2, '0', STR_PAD_LEFT);
        $seconds = str_pad($data['seconds'], 2, '0', STR_PAD_LEFT);
        $length = "{$hours}:{$minutes}:{$seconds}";
        $film->length = $length;
        $film->save();
        return view('admin.films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('admin.films.edit', compact('film'));
    }
    public function delete(Film $film)
    {
        $film->cinemaHasFilms()->delete();
        $film->delete();
        return redirect()->route('admin.film.index');
    }
}
