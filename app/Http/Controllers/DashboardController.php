<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;
use App\Models\BillDetail;
class DashboardController extends Controller
{
    //
    public function index()
    {
        $Bills = Bill::where('paid',0)->where('host_id', Auth::user()->id)->get();
        $room_venu = Bill::where('host_id', Auth::user()->id)->sum('room_price');
        $total_venu = Bill::where('host_id', Auth::user()->id)->sum('total_price');
        $service_venu = $total_venu - $room_venu;
        // $each_service_venu = BillDetail::where('host_id', Auth::user()->id)->sum('total_price');
        return view('dashboard',compact('Bills','room_venu','service_venu','total_venu'));
    }
}
