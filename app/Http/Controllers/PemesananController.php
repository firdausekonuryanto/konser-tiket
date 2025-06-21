<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\TicketOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PemesananController extends Controller
{
    public function index()
    {
        $concerts = Concert::latest()->paginate(10);
        return view('ticket.pemesanan', compact('concerts'));
    }
}