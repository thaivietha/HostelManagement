<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\Service;
use App\Models\BillDetail;
use App\Models\Room;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rooms = Auth::user()->rooms;
        $Bills = Auth::user()->bills->sortByDesc('id');
        // $BillDetails = $Bills->billdetails;
        $Services = Auth::user()->services;
        return view('bill',compact('Rooms','Services','Bills'));
    }
    public function detail($id)
    {  
        $billdetails = DB::table('bill_details')
                    ->join('services', 'services.id', '=', 'bill_details.service_id')
                    ->select('bill_details.*', 'services.unit')
                    ->where('bill_id',$id)
                    ->get();
        if($billdetails){
            return response()->json([
                'status'=>200,
                'detail'=>$billdetails,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'room'=>'lỗi',
            ]);
        }
    }
    public function paid(Request $request)
    {  
       $bill = Bill::where('id',$request->id)->where('host_id',Auth::user()->id)
           ->update([
               'paid' =>  $request->paid,
           ]);
       if($bill){
        return response()->json([
            'status'=>200,
            'message'=>'Thành công',
        ]);
       }
       else{
        return response()->json([
            'status'=>404,
            'room'=>'error',
        ]);
       }
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
        $validator = Validator::make($request->all(), [
            'room_id' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
            'room_price' => ['required'],
        ],[
            'room_id.required' => 'Bạn chưa chọn phòng',
            'from.required' => 'Chưa chọn thời gian bắt đầu',
            'to.required' => 'Chưa chọn thời gian kết thúc',
            'room_price.required' => 'Chưa nhập tiền phòng',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            //Lưu thông tin bill
            $Bill = new Bill;
            $Bill ->host_id = Auth::user()->id;
            $Bill ->room_id = $request->room_id;
            $Bill ->from = $request->from;
            $Bill ->to = $request->to;
            $Bill ->room_price = $request->room_price;
            $Bill ->total_price = $request->total_price;
            $Bill ->paid = 0;
            $Bill->save();
            //lưu chi tiết bill
            $bill_id = $Bill->id;
            $count = count($request->serviceData);
            // $test = $request->serviceData[1];
            for ($i = 0; $i < $count; $i++) {
                $billdetails = new BillDetail;
                $billdetails->bill_id = $bill_id;
                $billdetails->service_id = $request->serviceData[$i]['service_id'];
                $billdetails->service_name = $request->serviceData[$i]['service_name'];
                $billdetails->price = $request->serviceData[$i]['price'];
                $billdetails->quantity = $request->serviceData[$i]['quantity'];
                $billdetails->save();
            }
          

            return response()->json([
                'status'=>200,
                'data'=> 'ok',
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
        //
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
            'room_id' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
            'room_price' => ['required'],
        ],[
            'room_id.required' => 'Bạn chưa chọn phòng',
            'from.required' => 'Chưa chọn thời gian bắt đầu',
            'to.required' => 'Chưa chọn thời gian kết thúc',
            'room_price.required' => 'Chưa nhập tiền phòng',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {

            //lưu chi tiết bill
            // $bill_id = $Bill->id;
            $count = count($request->serviceData);
            $test = $request->serviceData[1]['quantity'];
            for ($i = 0; $i < $count; $i++) {
                BillDetail::where('id',$request->serviceData[$i]['billdetail_id'])
                ->update([
                    'price' =>  $request->serviceData[$i]['price'],
                    'quantity' => $request->serviceData[$i]['quantity'],
                ]);
                // $billdetail = BillDetail::find($request->serviceData[$i]['billdetail_id']);
                // $billdetail->update([
                //     'price' =>  $request->serviceData[$i]['price'],
                //     'quantity' => $request->serviceData[$i]['quantity'],
                // ]);
            }

            return response()->json([
                'status'=>200,
                'data'=> $test,
                'message'=>'Đã thêm thành công',
            ]);
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
    }
}
