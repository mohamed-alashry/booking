<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAvailableRooms(Request $request)
    {
        $data = $request->validate([
            'date_from' => 'required|date|before:date_to',
            'date_to' => 'required|date',
        ]);

        $rooms = Room::whereDoesntHave('reservations', function (Builder $query) use ($data) {
            $query->whereDate('date_from', '>=', $data['date_from'])
                ->whereDate('date_to', '<=', $data['date_to']);
        })->get();

        return response()->json(compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reserveRoom(Request $request)
    {
        $data = $request->validate([
            'guest_name' => 'required',
            'guest_email' => 'required|email',
            'room_id' => 'required',
            'date_from' => 'required|date|before:date_to|after_or_equal:today',
            'date_to' => 'required|date',
        ]);

        $room = Room::findOrFail($data['room_id']);

        $reservationExist = Reservation::where('room_id', $data['room_id'])->whereDate('date_from', '>=', $data['date_from'])
            ->whereDate('date_to', '<=', $data['date_to'])->first();

        if ($reservationExist) {
            return response()->json(['message' => 'This room already reserved!'], 422);
        }

        $data['price'] = $room->price;
        $reservation = Reservation::create($data);
        $reservation->load('room');

        Mail::to($data['guest_email'])
            ->send(new ReservationConfirmation($reservation));

        return response()->json(compact('reservation'));
    }
}
