<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $host_id = Auth::user()->id;
        // $Rooms = DB::table('rooms')->where('host_id',$host_id)->get();
        $Rooms = Auth::user()->rooms;
        return view('room')->with('Room',$Rooms);
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
            'name' => ['required', 'string', 'max:10', 
            Rule::unique('rooms')->where(function ($query) use ($request) {
                return $query->where('host_id', Auth::user()->id);
            }),],
            'price' => ['required', 'string', 'max:12'],
            'type' => ['required',  'max:13'],
            'area' => ['max:2'],
            'note' => ['max:255'],
        ],[
                'name.required' => 'Vui lòng nhập tên phòng',
                'name.max' => 'Tên quá dài',
                'name.unique' => 'Tên phòng đã tồn tại',
                'price.required' => 'Vui lòng nhập giá',
                'type.required' => 'Vui chọn loại phòng',
            ]
        );


        if ($validator->fails()) {

            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            // Lưu thông tin vào database
        
            $Room = new Room;
            $Room ->host_id = Auth::user()->id;
            $Room ->name = $request->name;
            $Room ->price = $request->price;
            $Room ->type = $request->type;
            $Room ->area = $request->area;
            $Room ->note = $request->note;
            $Room->save();

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
        $room = DB::table('rooms')->where('id',$id)->where('host_id',$host_id)->first();
        // $customer = Customer::find($id);
    
        if($room){
            return response()->json([
                'status'=>200,
                'room'=>$room,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'room'=>'not be find',
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
            'price' => ['required', 'string', 'max:12'],
            'type' => ['required',  'max:13'],
            'area' => ['max:2'],
            'note' => ['max:255'],
            ],[
                'name.required' => 'Vui lòng nhập tên phòng',
                'price.required' => 'Vui lòng nhập giá',
             ]
        );


        if ($validator->fails()) {

            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        } else {
            
              //Kiểm tra host id
            $host_id = Auth::user()->id;
            $room = Room::find($id);
            if($room){
                DB::table('rooms')
                ->where('id', $id)
                ->where('host_id', $host_id)
                ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'type' => $request->type,
                    'area' => $request->area,
                    'note' => $request->note,
                    
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
    public function viewmember($id)
    {
        $members = Customer::where('room_id',$id)->get(['name','birthday','phone','rent_at']);
        if($members){
            return response()->json([
                'status'=>200,
                'members'=>$members,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'room'=>'lỗi',
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
