<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = category::all();
        return view('admin.category', $result);
    }


    public function create(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = category::where(['id' => $id])->get();
            $result['category_name'] = $arr[0]->category_name;
            $result['category_slug'] = $arr[0]->category_slug;
            $result['id'] = $arr[0]->id;


        } else {
            $result['category_name'] = '';
            $result['category_slug'] = '';
            $result['id'] = '';

        }

        return view('admin/addcategory', $result);
    }


    public function manage_category_process(Request $request)
    {

        $request->validate([
            "category_name" => 'required',
            "category_slug" => 'required|unique:categories'
        ]);



        if ($request->post('id') > 0) {
            $category = category::find($request->post('id'));
            $msg = "category update";

        } else {
            $category = new category();
            $msg = "category insterted";


        }




        $category->category_name = $request->post('category_name');
        // $category->category_slug = $request->post('category_slug');
        $category->category_slug = Str::slug($request->post('category_slug'));
        $category->status = 1;

        $category->save();


        $request->session()->flash('message', $msg);
        return redirect('admin/category');
    }



    public function delete_category(Request $request, $id)
    {
        $result = category::find($id);
        $result->delete();
        $request->session()->flash('message', 'category deleted');
        return redirect('admin/category');

    }

    public function status(Request $request, $status, $id)
    {
        $result = category::find($id);
        $result->status = $status;
        $result->save();

        if($status)
        $request->session()->flash('message', 'category status update');
        return redirect('admin/category');



    }
}
