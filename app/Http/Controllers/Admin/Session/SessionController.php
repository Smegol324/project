<?php
namespace App\Http\Controllers\Admin\Session;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Session\StoreRequest;
use App\Models\CinemaHasFilm;
use App\Models\Cinema;
use App\Models\City;
use App\Models\Film;
use App\Models\Place;
use App\Models\Session;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with(['cinema', 'film'])->get();
        return view('admin.sessions.index', compact('sessions'));
    }

    public function create()
    {
        $cinemaHasFilms = CinemaHasFilm::all();
        $films = Film::all();
        $cinemas = Cinema::all();
        $cities = City::all();
        return view('admin.sessions.create', compact('cinemas', 'films', 'cities', 'cinemaHasFilms'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $session = new Session();
        [$cinemaId, $filmId] = explode('.', $data['group_id']);
        $session->cinema_id = $cinemaId;
        $session->film_id = $filmId;
        $session->date_session = date('Y-m-d', strtotime($data['date_session']));
        $hours = str_pad($data['hours'], 2, '0', STR_PAD_LEFT);
        $minutes = str_pad($data['minutes'], 2, '0', STR_PAD_LEFT);
        $seconds = '00';
        $length = "{$hours}:{$minutes}:{$seconds}";
        $session->time_session = $length;
        $session->save();
        $session_place_count = $session->cinema->place_count;
        for ($i = 0; $i < $session_place_count; $i++)
        {
            $place = new Place();
            $place->is_taken = 0;
            $place->id_session = $session->id;
            $place->save();
        }
        return redirect()->route('admin.session.index');
    }
    public function show($session_id)
    {
        $session = Session::where('id',$session_id)->first();
        $cinemas = Cinema::all();
        $films = Film::all();
        $places = Place::where('id_session', $session->id)->get();
        return view('admin.sessions.show', compact('session','cinemas','films','places'));
    }

    public function delete($session_id)
    {
        $session = Session::where('id',$session_id)->first();
        $session->delete();
        return redirect()->route('admin.session.index');
    }
}

