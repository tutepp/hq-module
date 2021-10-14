<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {


        return view('backend.advertisement');
    }
}
