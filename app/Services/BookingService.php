<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingService
{
    public function getAllBookings()
    {
        if(Auth::user()->role === 'admin')
            $bookings = Booking::all();
        else
            $bookings = Booking::where('user_id',auth()->user()->id)->get();
        
        return $bookings;
    }

    public function store(array $data)
    {
        $data['user_id'] = Auth::user()->id;

        return Booking::create($data);
    }

    public function update(Booking $booking, array $data)
    {
        $data['user_id'] = Auth::user()->id;

        $booking->update($data);

        return $booking;
    }

    public function delete(Booking $booking):void
    {
        $booking->delete();
    }

}
