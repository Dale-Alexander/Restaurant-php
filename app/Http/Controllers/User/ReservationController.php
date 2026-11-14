<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Enums\ReservationStatus;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Reservation::where('start_date_time', '>=', now())->where('status', ReservationStatus::BOOKED)->select('start_date_time')->get();
        return view('user.reservations.index', $reservations);
    }
}
