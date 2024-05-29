<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\City\CityRequest;
use App\Http\Requests\User\Cinema\CinemaRequest;
use App\Models\Cinema;
use App\Models\CinemaHasFilm;
use App\Models\City;
use App\Models\Film;
use App\Models\OrderHistory;
use App\Models\Place;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function chooseCity()
    {
        $cities = City::all();
        return view('user.city', compact('cities'));
    }
    public function cityStore(CityRequest $storeRequest)
    {
        $data = $storeRequest->validated();
        $user = Auth::user();
        $user->city_id = $data['city_id'];
        $city_id = $user->city_id;
        $user->save();
        return redirect()->route('user.chooseCinema','city_id');
    }
    public function chooseCinema()
    {
        $user = Auth::user();
        $city_id = $user->city_id;
        $city_name = City::where('id',$city_id)->first()->name;
        $cinemas = Cinema::where('city_id', $city_id)->get();
        return view('user.cinema', compact('cinemas','city_id','city_name'));
    }
    public function cinemaStore(CinemaRequest $storeRequest)
    {
        $data = $storeRequest->validated();
        $user = Auth::user();
        $user->cinema_id = $data['cinema_id'];
        $user->save();
        $city_id = $user->city_id;
        $cinema_id = $user->cinema_id;
        $cinemas = Cinema::all();
        $cities = City::all();
        return redirect()->route('user.main',compact('cinema_id','city_id','cities','cinemas'));
    }
    public function main()
    {
        $user = Auth::user();
        $city_id = $user->city_id;
        $cinema_id = $user->cinema_id;
        $cinemas = Cinema::all();
        $cinemaFilms = CinemaHasFilm::where('cinema_id', $cinema_id)->get();
        $films = [];
        foreach($cinemaFilms as $cinemaFilm)
        {
            $film = Film::find($cinemaFilm->film_id);
            if ($film) {
                $films[] = $film;
            }
        }
        $cities = City::all();
        return view('user.main',compact('user','cinema_id','city_id','cities','cinemas','films'));
    }
    public function mainStore(Request $request)
    {
        $request->validate([
            'city_id' => 'required|integer|exists:cities,id',
            'cinema_id' => 'required|integer|exists:cinemas,id',
        ]);

        $user = Auth::user();
        $user->city_id = $request->city_id;
        $user->cinema_id = $request->cinema_id;
        $user->save();

        return redirect()->route('user.main', [
            'city_id' => $request->city_id,
            'cinema_id' => $request->cinema_id
        ]);
    }
    public function film($city_id, $cinema_id, $film_id)
    {
        $film = Film::find($film_id);
        $sessions = Session::where('cinema_id', $cinema_id)
            ->where('film_id', $film_id)
            ->get();
        return view('user.film', compact('film', 'cinema_id', 'city_id', 'sessions'));
    }
    public function order($city_id, $cinema_id, $film_id, $session_id)
    {
        $film = Film::find($film_id);
        $session = Session::find($session_id);
        $places = Place::where('id_session', $session->id)->get();
        return view('user.order', compact('film', 'cinema_id', 'city_id', 'session','places'));
    }
    public function orderStore(Request $request)
    {
        $selectedSeats = $request->input('selected_seats', []);
        $film_id = $request->input('film_id');
        $cinema_id = $request->input('cinema_id');
        $city_id = $request->input('city_id');
        $session_id = $request->input('session_id');
        $seatCount = count($selectedSeats);
        foreach ($selectedSeats as $seatId) {
            $seat = Place::find($seatId);
            if ($seat) {
                $seat->is_taken = 2;
                $seat->save();
            }
        }
        return redirect()->route('user.check', [$city_id, $cinema_id, $film_id,$session_id,$seatCount]);
    }
    public function check($city_id, $cinema_id, $film_id, $session_id, $seatCount)
    {
        $film = Film::find($film_id);
        $cinema = Cinema::find($cinema_id);
        $city = City::find($city_id);
        $resultCost = $film->cost * $seatCount;
        $session = Session::find($session_id);
        $orderHistory = new OrderHistory();
        $user = Auth::user();
        $orderHistory->check = "Фільм: ".$film->name."\nКінотеатр: ".$cinema->name."\nГород: ".$city->name.
            "\nДата початку сеансу: ".$session->date_session."\nЧас початку сеансу: ".$session->time.
            "\nКількість квитків: ".$seatCount."\nВартість квитка: ".$film->cost."\nЗагальна вартість: ".
            $resultCost."\nПокупець: ".$user->name;
        $orderHistory->user_id = $user->id;
        $orderHistory->save();
        return view('user.check', compact('film', 'cinema_id', 'city_id', 'session','seatCount','resultCost','cinema','city','user'));
    }
}
