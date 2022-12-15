<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Size::all();
        return view('admin.size', $result);
    }

    public function create(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Size::where(['id' => $id])->get();
            $result['size'] = $arr[0]->size;
            $result['id'] = $arr[0]->id;

        } else {
            $result['size'] = '';
            $result['id'] = '';

        }

        return view('admin/addsize', $result);
    }



    public function manage_size_process(Request $request)
    {

        $request->validate([
            "size" => 'required',
        ]);



        if ($request->post('id') > 0) {
            $size = Size::find($request->post('id'));
            $msg = "size update";

        } else {
            $size = new Size();
            $msg = "size insterted";


        }

        $size->size = $request->post('size');


        $size->status = 1;

        $size->save();


        $request->session()->flash('message', $msg);
        return redirect('admin/size');
    }


    public function delete_size(Request $request, $id)
    {
        $result = Size::find($id);
        $result->delete();
        $request->session()->flash('message', 'size deleted');
        return redirect('admin/size');

    }



    public function status(Request $request, $status, $id)
    {
        $result = Size::find($id);
        $result->status = $status;
        $result->save();

        if ($status)
            $request->session()->flash('message', 'size   status update');
        return redirect('admin/size');



    }




}
