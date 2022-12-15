<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = Product::all();
        return view('admin.product', $result);
    }


    public function create(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Product::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['category_id'] = $arr[0]->category_id;
            $result['name'] = $arr[0]->name;
            $result['brand'] = $arr[0]->brand;
            $result['model'] = $arr[0]->model;
            $result['short_desc'] = $arr[0]->short_desc;
            $result['desc'] = $arr[0]->desc;
            $result['keywords'] = $arr[0]->keywords;
            $result['technical_specification'] = $arr[0]->technical_specification;
            $result['uses'] = $arr[0]->uses;
            $result['warranty'] = $arr[0]->warranty;
            $result['slug'] = $arr[0]->slug;
            $result['image'] = $arr[0]->image;



        } else {
            $result['category_id'] = '';
            $result['name'] = '';
            $result['brand'] = '';
            $result['model'] = '';
            $result['short_desc'] = '';
            $result['desc'] = '';
            $result['keywords'] = '';
            $result['technical_specification'] = '';
            $result['uses'] = '';
            $result['warranty'] = '';
            $result['slug'] = '';
            $result['image'] = '';
            $result['id'] = 0;

        }


        $result['category'] = DB::table('categories')->where(['status' => 1])->get();

        // echo '<pre>';
        // print_r($result['category']);
        // die();
        return view('admin/addproduct', $result);
    }


    public function manage_product_process(Request $request)
    {
        if ($request->post('id') > 0) {
            $image_validation = "mimes:jpg,png,jpeg";


        } else {

            $image_validation = 'required|mimes:jpg,png,jpeg';

        }

        $request->validate([
            "name" => 'required',
            "image" => $image_validation,
            "slug" => 'required|unique:products,slug'
        ]);

        if ($request->post('id') > 0) {
            $product = Product::find($request->post('id'));
            $msg = "product update";

        } else {
            $product = new Product();
            $msg = "product insterted";


        }



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media', $image_name);
            $product->image = $image_name;


        }




        $product->category_id = $request->post('category_id');
        $product->name = $request->post('name');
        $product->brand = $request->post('brand');
        $product->model = $request->post('model');
        $product->uses = $request->post('uses');
        $product->short_desc = $request->post('short_desc');
        $product->desc = $request->post('desc');
        $product->keywords = $request->post('keywords');
        $product->technical_specification = $request->post('technical_specification');
        $product->warranty = $request->post('warranty');
        $product->slug = Str::slug($request->post('slug'));
        $product->status = 1;
        $product->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/product');
    }



    public function delete_product(Request $request, $id)
    {
        $result = product::find($id);
        $result->delete();
        $request->session()->flash('message', 'product deleted');
        return redirect('admin/product');

    }

    public function status(Request $request, $status, $id)
    {
        $result = product::find($id);
        $result->status = $status;
        $result->save();

        if ($status)
            $request->session()->flash('message', 'product status update');
        return redirect('admin/product');



    }
}
