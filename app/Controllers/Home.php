<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('add_event_with_modal');
    }
}
