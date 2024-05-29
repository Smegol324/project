<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\CinemaHasFilm;
use App\Models\City;
use App\Models\Film;
use App\Models\OrderHistory;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return string
     */
    public function index()
    {
        if (auth()->user()->role == User::ROLE_ADMIN) {
            $data = [];
            $data['usersCount'] = User::all()->count();
            $data['citiesCount'] = City::all()->count();
            $data['cinemasCount'] = Cinema::all()->count();
            $data['filmsCount'] = Film::all()->count();
            $data['cinemaHasFilmsCount'] = CinemaHasFilm::all()->count();
            $data['sessionsCount'] = Session::all()->count();
            $data['orderHistoriesCount'] = OrderHistory::all()->count();
            return view('admin.main.index', compact('data'));
        } else if (auth()->user()->role == User::ROLE_USER) {
            $cities = City::all();
            return view('user.city', compact('cities'));
        } else {
            return view('home');
        }
    }
}
