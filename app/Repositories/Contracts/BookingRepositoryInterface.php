<?php

namespace App\Repositories\Contracts;

interface BookingRepositoryInterface {
    public function createBooking(array $data);
    public function findByTrxIdAndPhoneNumber($boookingTrxId, $phoneNumber);
    public function saveToSession(array $data);
    public function updateSessionsData(array $data);
    public function getOrderDataFromSession();
    public function clearSession();
}
