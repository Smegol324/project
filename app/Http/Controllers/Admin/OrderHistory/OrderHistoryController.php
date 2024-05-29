<?php
namespace App\Http\Controllers\Admin\OrderHistory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Session\StoreRequest;
use App\Models\CinemaHasFilm;
use App\Models\Cinema;
use App\Models\City;
use App\Models\Film;
use App\Models\OrderHistory;
use App\Models\Place;
use App\Models\Session;
use App\Models\User;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $users = User::all();
        $orderHistories = OrderHistory::all();
        return view('admin.orderHistories.index', compact('orderHistories', 'users'));
    }

    public function show($orderHistory_id)
    {
        $orderHistory = OrderHistory::where('id',$orderHistory_id)->first();
        $user = User::where('id', $orderHistory->user_id)->first();
        return view('admin.orderHistories.show', compact('orderHistory', 'user'));
    }

    public function delete($orderHistory_id)
    {
        $orderHistory = OrderHistory::where('id',$orderHistory_id)->first();
        $orderHistory->delete();
        return redirect()->route('admin.orderHistory.index');
    }
}

