<?php

namespace App\Http\Controllers;

use App\Http\Request\StoreBookingRequest;
use App\Http\Request\StoreCheckBookingRequest;
use App\Http\Request\StorePaymentRequest;
use App\Models\BookingTransaction;
use App\Models\Workshop;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    //
    protected $bookingService;

    public function __construct(BookingService $bookingService){
        $this->bookiingService = $bookingService;
    }

    public function bookingStore(StoreBookingRequest $request, Workshop $workshop){
        $validated = $request->validated();
        $validated['workshop_id'] = $workshop->id;
        try{
            $this->bookingService->storeBooking($validated);
            return redirect()->route('front.payment');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => 'Unable to Create Booking, Please Try Again.']);
        }
    }

    public function payment(){
        if ($this->bookingService->isBookingSessionsAvailable()){
            return redirect()->route('front.index');
        }
        $data = $this->bookingService->getBookingDetails();

        if(!$data){
            return redirect()->route('front.index');
        }

        return view('booking.payment', $data);
    }


    public function paymentStore(StorePaymentRequest $request){
        $validated = $request->validate();

        try{
            $bookingTransactionId = $this->bookingService->finalizeBookngAndPayment($validated);
            return redirect()->route('front.booking_finished', $bookingTransactionId);
        }catch(\Exception $e){
            Log::error(('Payment Storage Failed:' . $e->getMessage()));
            return redirect()->back()->withErrors(['Error' => 'Unable to Store Payment Details. Please Tru Again.' . $e->getMessage
            ()]);
        }
    }

    public function bookingFinished(BookingTransaction $bookingTransaction){
        return view('booking.booking_finished', compact('bookingTransaction'));
    }

    public function checkBooking(){
        return view('booking.my_booking');
    }

    public function checkBookingDetails(StoreBookingRequest $request){
        $validated = $request->validate();

        $myBookingDetails = $this->bookingService->getMyBookingDetails($validated);

        if($myBookingDetails){
            return view('booking.my_booking_details', compact('myBookingDetails'));
        }
        return redirect()->route('front.check_booking')->withErrors(['error'=>'Transaction Not Found']);
    }
}
