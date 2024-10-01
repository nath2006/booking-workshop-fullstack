<?php

namespace App\Repositories;

use App\Models\Workshop;
use App\Repositories\Contracts\WorkshopRepositoryInterface;

class WorkshopRepository implements WorkshopRepositoryInterface {
    public function getAllNewWorkshops() {
        return Workshop::latest()->get();
    }

    public function find($id) {
        return Workshop::find(($id));
    }

    public function getPrice($workshopId) {
        $workshop = $this->find($workshopId);
        return $workshop ? $workshop->price : 0;
    }
}
