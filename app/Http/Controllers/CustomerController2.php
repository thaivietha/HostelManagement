<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
class CustomerController2 extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $host_id = Auth::user()->id;
        $Customers = Auth::user()->customers;
        $Room = Auth::user()->rooms;
        return view('customer2')->with('Customer',$Customers)->with('Room',$Room);
      
    }

    public function load()
    {
        $host_id = Auth::user()->id;
        $Customers = DB::table('customers')->where('host_id',$host_id)->get();
        return response()->json([
            'customers'=>$Customers,
        ]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:12', 'unique:customers'],
            'cmnd' => ['required',  'max:13', 'unique:customers'],
            'email' => ['unique:customers'],
            'room' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            // Lưu thông tin vào database
        
            $Customer = new Customer;
            $Customer ->host_id = Auth::user()->id;
            $Customer ->name = $request->name;
            $Customer ->phone = $request->phone;
            $Customer ->cmnd = $request->cmnd;
            $Customer ->birthday = $request->birthday;
            $Customer ->address = $request->address;
            $Customer ->room_id = $request->room;
            $Customer ->rent_at = $request->rent_at;
            $Customer ->email = $request->email;
            $Customer->save();

            DB::table('rooms')
                    ->where('name', $request->room)
                    ->increment('num_customer');

            return response()->json([
                'status'=>200,
                'message'=>'Đã thêm thành công',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //kiểm tra host_id
        $host_id = Auth::user()->id;

        //Phải trùng host_id mới có thể truy vấn
        $customer = Customer::where('id',$id)->where('host_id',$host_id)->first();
        // $customer = Customer::find($id);
    
        if($customer){
            return response()->json([
                'status'=>200,
                'customer'=>$customer,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'customer'=>'Lỗi',
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:12'],
            'cmnd' => ['required',  'max:13'],
            'email' => ['max:255'],
            
        ]);


        if ($validator->fails()) {

            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            
              //Kiểm tra host id
            $host_id = Auth::user()->id;
            if ($request->room != $request->old_room) {
                DB::table('rooms')
                    ->where('id', $request->room)
                    ->increment('num_customer');

                DB::table('rooms')
                    ->where('id', $request->old_room)
                    ->decrement('num_customer');
            }
            // if ($request->room == '') {
            //     DB::table('rooms')
            //         ->where('id', $request->old_room)
            //               ->update([
            //         'name' => $request->name,                    
            //     ]);
            // }

            $customer = Customer::find($id);
            if($customer){
                DB::table('customers')
                ->where('id', $id)
                ->where('host_id', $host_id)
                ->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'cmnd' => $request->cmnd,
                    'birthday' => $request->birthday,
                    'address' => $request->address,
                    'room_id' => $request->room,
                    'rent_at' => $request->rent_at,
                    'email' => $request->email,
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=>'Cập nhật thành công ',
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Truy vấn không hợp lệ',
                ]);
            }
            
        }
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
               //kiểm tra host_id
        // $host_id = Auth::user()->id;

        // //Phải trùng host_id mới có thể truy vấn
        // $customer = DB::table('customers')->where('id',$id)->where('host_id',$host_id)->first();
        
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json([
                'status'=>200,
                'message'=>'Đã xóa thành công',
            ]);
    }
}
