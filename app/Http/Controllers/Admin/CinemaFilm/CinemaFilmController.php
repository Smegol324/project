<?php
namespace App\Http\Controllers\Admin\CinemaFilm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CinemaFilm\StoreRequest;
use App\Models\CinemaHasFilm;
use App\Models\Cinema;
use App\Models\City;
use App\Models\Film;

class CinemaFilmController extends Controller
{
    public function index()
    {
        $cinemaFilms = CinemaHasFilm::with(['cinema', 'film'])->get();
        return view('admin.cinemaFilms.index', compact('cinemaFilms'));
    }

    public function create()
    {
        $films = Film::all();
        $cinemas = Cinema::all();
        $cities = City::all();
        return view('admin.cinemaFilms.create', compact('cinemas', 'films', 'cities'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        CinemaHasFilm::insert([
            'cinema_id' => $data['cinema_id'],
            'film_id' => $data['film_id']]);
            return redirect()->route('admin.cinemaFilm.index');
    }


    public function show($cinema_id, $film_id)
    {
        $cinemaFilm = CinemaHasFilm::where('cinema_id', $cinema_id)
            ->where('film_id', $film_id)
            ->firstOrFail();
        if (!$cinemaFilm) {
            abort(404, 'Запись не найдена');
        }
        return view('admin.cinemaFilms.show', compact('cinemaFilm'));
    }

    public function delete($cinema_id, $film_id)
    {
        CinemaHasFilm::where('cinema_id', $cinema_id)
            ->where('film_id', $film_id)
            ->delete();
        return redirect()->route('admin.cinemaFilm.index');
    }
}

