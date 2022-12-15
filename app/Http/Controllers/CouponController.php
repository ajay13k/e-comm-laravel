<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Coupon::all();
        return view('admin.coupon', $result);
    }


    public function create(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Coupon::where(['id' => $id])->get();
            $result['title'] = $arr[0]->title;
            $result['code'] = $arr[0]->code;
            $result['value'] = $arr[0]->value;
            $result['id'] = $arr[0]->id;


        } else {
            $result['title'] = '';
            $result['code'] = '';
            $result['value'] = '';
            $result['id'] = '';

        }

        return view('admin/addcoupon', $result);
    }


    public function manage_coupon_process(Request $request)
    {

        $request->validate([
            "title" => 'required',
            "code" => 'required|unique:coupons,code',
            "value" => 'required',
        ]);



        if ($request->post('id') > 0) {
            $coupon = Coupon::find($request->post('id'));
            $msg = "coupon update";

        } else {
            $coupon = new Coupon();
            $msg = "coupon insterted";


        }




        $coupon->title = $request->post('title');

        $coupon->code = $request->post('code');
        $coupon->value = $request->post('value');
        $coupon->status = 1;

        $coupon->save();


        $request->session()->flash('message', $msg);
        return redirect('admin/coupon');
    }



    public function delete_category(Request $request, $id)
    {
        $result = Coupon::find($id);
        $result->delete();
        $request->session()->flash('message', 'coupon deleted');
        return redirect('admin/coupon');

    }


    public function status(Request $request, $status, $id)
    {
        $result = Coupon::find($id);
        $result->status = $status;
        $result->save();

        if ($status)
            $request->session()->flash('message', 'coupon status update');
        return redirect('admin/coupon');



    }





}
