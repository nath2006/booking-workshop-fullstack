<?php

namespace App\Services;

use App\Models\BookingTransaction;
use App\Models\WorkshopParticipants;
use App\Repositories\Contracts\BookingRepositoryInterface;
use App\Repositories\Contracts\WorkshopRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingService {
    protected $bookingRepository;
    protected $workshopReposirtory;

    public function __construct(WorkshopRepositoryInterface $workshopRepository,
    BookingRepositoryInterface $bookingRepository) {
        $this->bookingRepository = $bookingRepository;
        $this->workshopReposirtory = $workshopRepository;
    }

    public function storeBooking(array $validateData) {
        $existingData = $this->bookingRepository->getOrderDataFromSession();
        $updateData = array_merge($existingData, $validateData);
        $this->bookingRepository->saveToSession($updateData);

        return $updateData;
    }

    public function isBookingSessionAvailabel(){
        return $this->bookingRepository->getOrderDataFromSession() !== null;
    }

    public function getBookingDetails(){
        $orderData = $this->bookingRepository->getOrderDataFromSession();

        if(empty($orderData)) {
            return null;
        }

        $workshop = $this->workshopReposirtory->find($orderData['workshop_id']);

        $quantity = isset($orderData['quantity']) ? $orderData['quantity'] : 1;

        $subTotalAmount = $workshop->price * $quantity;

        $taxRate = 0.11;
        $totalTax = $subTotalAmount + $taxRate;

        $totalAmount = $subTotalAmount + $totalTax;

        $orderData['sub_total_amount'] = $subTotalAmount;
        $orderData['total_tax'] = $totalTax;
        $orderData['total_amount'] = $totalAmount;

        $this->bookingRepository->saveToSession($orderData);

        return compact('orderData', 'workshop');
    }

    public function finalizeBookngAndPayment(array $paymentData){
        $orderData = $this->bookingRepository->getOrderDataFromSession();

        if(!$orderData) {
            throw new \Exception('Booking Data is Missing From Session.');
        }

        Log::info('Order Data:', $orderData);

        if(!isset($orderData['total_amount'])){
            throw new \Exception('Total Amount is Missing From The Order Data');
        }

        if(isset($paymentData['proof'])) {
            $proofPath = $paymentData['proof']->store('proofs', 'public');
        }

        DB::beginTransaction();

        try {
            $bookingTransaction = BookingTransaction::create([
                'name' =>$orderData['name'],
                'email' =>$orderData['email'],
                'phone'=>$orderData['phone'],
                'customer_bank_name'=>$paymentData['customer_bank_name'],
                'customer_bank_number'=>$paymentData['customer_bank_number'],
                'customer_bank_account'=>$paymentData['customer_bank_account'],
                'proof' => $proofPath,
                'quantity' => $orderData['quantity'],
                'total_amount' => $orderData['total_amount'],
                'is_paid' => false,
                'workshop_id' => $orderData['workshop_id'],
                'booking_trx_id' => BookingTransaction::generateUniqueTrxId(),
            ]);

        //Create workshop participants
        foreach($orderData['participants'] as $participant) {
            WorkshopParticipants::create([
                'name' =>$participant['name'],
                'occupation' =>$participant['occupation'],
                'email'=>$participant['email'],
                'workshop_id'=> $bookingTransaction->workshop->id,
                'booking_transaction_id' => $bookingTransaction->id,
            ]);
            }

            //Commit the transactions
            DB::commit();

            //Clear the session data after successful booking
            $this->bookingRepository->clearSession();

            //Return the booking transaction ID for redirect
            return $bookingTransaction->id;

        }catch(\Exception $e){
            //Log the execption for debugging
            Log::error('Payment Processing Failed: '.$e->getMessage());

            //Rollback the transaction in case of any errors
            DB::rollBack();

            //Rethrow the exception to be handled by the controller
            throw $e;
        }
    }

    public function getMyBookingDetails(array $validated){
        return $this->bookingRepository->findByTrxIdAndPhoneNumber($validated['booking_trx_id'],
        $validated['phone']);
    }
}
