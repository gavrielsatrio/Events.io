<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyTicketController extends Controller
{
    public function render()
    {
        return view("buy_ticket");
    }
}
