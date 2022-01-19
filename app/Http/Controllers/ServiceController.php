<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Services = Auth::user()->services;
        return view('service')->with('Services',$Services);;
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
        $count = count($request->serviceData);
        // for ($i = 0; $i < $count; $i++) {
        //   $validator = Validator::make($request->serviceData[$i], [
        //       'name' => ['unique:services'],
        //   ],[
        //       'name.unique' => 'Dịch vụ này đã tồn tại',
        //       ]
        //   );
        //   if ($validator->fails()) {

        //       return response()->json([
        //           'status'=>400,
        //           'errors'=>$validator->messages(),
        //       ]);
        //   }
        // }
        $host_id = Auth::user()->id;
        $test = $request->all();
        for ($i = 0; $i < $count; $i++) {
            $Service = new Service;
            $Service->host_id = $host_id;  
            $Service->name = $request->serviceData[$i]['name'];
            $Service->unit = $request->serviceData[$i]['unit'];
            $Service->save();
        }
        return response()->json([
            'status'=>200,
            'data'=> $test,
            'message'=>'Đã thêm thành công',
        ]);
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
            'name' => ['required', 'string', 'max:20'],
            'price' => ['required', 'string', 'max:12'],
            'unit' => ['required',  'max:13'],
            ],[
                'name.required' => 'Bạn chưa nhập tên dịch vụ',
                'price.required' => 'Bạn chưa nhập giá',
                'unit.required' => 'Bạn chưa nhập đơn vị',
             ]
        );


        if ($validator->fails()) {

            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            $host_id = Auth::user()->id;
            $service = Service::find($id);
            if($service){
                DB::table('services')
                ->where('id', $id)
                ->where('host_id', $host_id)
                ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'unit' => $request->unit,
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=>'Cập nhật thành công ',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Không tìm thấy dịch vụ',
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
    }
}
