<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Room;
use Carbon\Carbon;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cmnd)
    {
        // $customer = DB::table('customers')->where('cmnd',$cmnd)->orWhere('phone',$cmnd)->get(['name','birthday','room_id','phone'])->first();
        $customer = DB::table('customers')
                    ->join('rooms','customers.room_id','=', 'rooms.id')
                    ->select([            
                        'customers.name',
                        'customers.birthday',
                        'customers.phone', 
                        'rooms.name as room_name',
                    ])
                    ->where('customers.cmnd',$cmnd)
                    ->orwhere('customers.phone',$cmnd)
                    ->first();
        $bills = DB::table('customers')
                    ->join('rooms','customers.room_id','=', 'rooms.id')
                    ->join('bills', 'bills.room_id', '=', 'rooms.id')
                    ->select([
                        'bills.id',           
                        'bills.from',
                        'bills.to',
                        'bills.room_price',
                        'bills.total_price',
                        'bills.paid',
                    ])
                    ->where('customers.cmnd',$cmnd)
                    ->orwhere('customers.phone',$cmnd)
                    // ->where('bills.paid',0)
                    ->orderBy('bills.id','desc')
                    ->first();
        $allbill = DB::table('customers')
                    ->join('rooms','customers.room_id','=', 'rooms.id')
                    ->join('bills', 'bills.room_id', '=', 'rooms.id')
                    ->select([  
                        'bills.id',           
                        'bills.from',
                        'bills.to',
                        'bills.room_price',
                        'bills.total_price',
                        'bills.paid',
                    ])
                    ->where('customers.cmnd',$cmnd)
                    ->orwhere('customers.phone',$cmnd)
                    ->get();
        if($customer){
            return response()->json([
                'status'=>200,
                'customer'=>$customer,
                'bills'=>$bills,
                'allbill'=>$allbill,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'customer'=>'error',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
