<?php
// HomeController.php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all events from the database
        $events = Event::all();

        // Pass the events data to the view
        return view('home', ['events' => $events]);
    }
}
