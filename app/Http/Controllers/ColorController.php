<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index()
    {
        $result['data'] = Color::all();

        return view('admin.color', $result);

    }



    public function create(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Color::where(['id' => $id])->get();
            echo "<pre>";
            print_r($arr);
            die();
            $result['color'] = $arr[0]->color;
            $result['id'] = $arr[0]->id;

        } else {
            $result['color'] = '';
            $result['id'] = '';

        }

        return view('admin/addcolor', $result);
    }


    public function manage_color_process(Request $request)
    {
        $request->validate([
            "color" => 'required',
        ]);
        if ($request->post('id') > 0) {
            $color = Color::find($request->post('id'));
            $msg = "color update";

        } else {
            $color = new Color();
            $msg = "color insterted";

        }

        $color->color = $request->post('color');
        $color->status = 1;
        $color->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/color');


    }

    public function delete_color(Request $request, $id)
    {
        $result = Color::find($id);
        $result->delete();
        $request->session()->flash('message', 'color deleted');
        return redirect('admin/color');

    }




    public function status(Request $request, $status, $id)
    {
        $result = Color::find($id);
        $result->status = $status;
        $result->save();

        if ($status)
            $request->session()->flash('message', 'color   status update');
        return redirect('admin/color');



    }




}
