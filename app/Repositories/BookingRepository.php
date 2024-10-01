<?php

namespace App\Repositories;

use App\Models\BookingTransaction;
use App\Repositories\Contracts\BookingRepositoryInterface;
use Illuminate\Support\Facades\Session;

class BookingRepository implements BookingRepositoryInterface{
    public function createBooking(array $data){
        return BookingTransaction::create($data);
    }

    public function findByTrxIdAndPhoneNumber($boookingTrxId, $phoneNumber){
        return BookingTransaction::where('booking_trx_id', $boookingTrxId)
                                    ->where('phone', $phoneNumber)
                                    ->first();
    }

    public function saveToSession(array $data){
        Session::put('orderData', $data);
    }

    public function getOrderDataFromSession(){
        return Session::get('orderData', []);
    }

    public function updateSessionsData(array $data){
        $orderData = session('orderData', []);
        $orderData = array_merge($orderData, $data);
        session(['orderData' => $orderData]);
    }

    public function clearSession(){
        Session::forget('orderData');
    }
}
