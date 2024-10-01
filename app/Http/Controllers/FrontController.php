<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use App\Models\Category;
use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    protected $frontService;

    public function __construct(FrontService $frontService) {
        $this->frontService = $frontService;
    }

    public function index() {
        $data = $this->frontService->getFrontPageData();
        return view('front.index', $data);
    }

    public function details(Workshop $workshop) {
        return view('front.details', compact('workshop'));
    }


    public function category(Category $category) {
        return view('front.category', compact('category'));
    }
}
