<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\CinemaHasFilm;
use App\Models\City;
use App\Models\Film;
use App\Models\OrderHistory;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['citiesCount'] = City::all()->count();
        $data['cinemasCount'] = Cinema::all()->count();
        $data['filmsCount'] = Film::all()->count();
        $data['cinemaHasFilmsCount'] = CinemaHasFilm::all()->count();
        $data['sessionsCount'] = Session::all()->count();
        $data['orderHistoriesCount'] = OrderHistory::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
