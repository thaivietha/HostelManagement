<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;
class CustomerController extends Controller
{
    //
    public function Add(Request $request)
    {
        // $request->validate([

        //     'name' => 'required|string|max:255',
        //     'cmnd' => 'required|unique:customers',
        //     'sdt' => 'required|unique:customers',
        //     'email' => 'required|string|email|max:255|unique:customers',
        // ]);

        $Customer = new Customer;
        $Customer ->host_id = $request->host_id;
        $Customer ->name = $request->name;
        $Customer ->phone = $request->phone;
        $Customer ->cmnd = $request->cmnd;
        $Customer ->birthday = $request->birthday;
        $Customer ->address = $request->address;
        $Customer ->room = $request->room;
        $Customer ->rent_at = $request->rent_at;
        $Customer ->email = $request->email;
        $Customer->save();
        return redirect('dashboard/quanlykhach')
            ;
    }
}
