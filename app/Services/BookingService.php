<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingService
{
    public function getAllBookings()
    {
        return Booking::where('status','active')->get();
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
