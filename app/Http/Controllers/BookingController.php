<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    private $bookingService;

    public function __construct(BookingService $service)
    {
        $this->bookingService = $service;
    }

    public function index()
    {
        $bookings = $this->bookingService->getAllBookings();

        return BookingResource::collection($bookings);
    }

    public function store(BookingRequest $request)
    {
        $data = $request->all();

        $booking = $this->bookingService->store($data);

        return response()->json([
            'success' => true,
            'message' => 'Booking created successfully',
            'data' => new BookingResource($booking)
        ]);
    }

    public function update(BookingRequest $request, Booking $booking)
    {
        $data = $request->validated();

        $booking = $this->bookingService->update($booking,$data);

        return response()->json([
            'success' => true,
            'message' => 'Booking updated',
            'data' => new BookingResource($booking)
        ]);
    }

    public function destroy(Booking $booking)
    {
        $this->bookingService->delete($booking);

        return response()->json([
            'success' => true,
            'message' => 'Booking deleted'
        ]);
    }
}
