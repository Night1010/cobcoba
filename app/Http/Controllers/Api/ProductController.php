<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use App\Models\product;


use App\Http\Resources\CobaResource;

class ProductController extends Controller
{
    public function index()
    {
        //get all posts
        $products = product::latest()->paginate(5);

        //return collection of posts as a resource
        return new CobaResource(true, 'List Data Product', $products);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'content'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/product', $image->hashName());

        //create post
        $product = product::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        //return response
        return new CobaResource(true, 'Data Post Berhasil Ditambahkan!', $product);
    }

    public function show($id)
    {
        //find post by ID
        $product = product::find($id);

        if (!$product) {
            return response()->json("maaf id tidak ditemukan", 404);
        }

        //return single post as a resource
        return new CobaResource(true, 'Detail Data Product', $product);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'content'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

    
        $product = product::find($id);

        if (!$product) {
            return response()->json("maaf id tidak ditemukan", 404);
        }

        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/product', $image->hashName());

            //delete old image
            Storage::delete('public/product/'.basename($product->image));

            
            $product->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);

        } else {

           
            $product->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        //return response
        return new CobaResource(true, 'Data product Berhasil Diubah!', $product);
    }


    public function destroy($id)
    {

        //find post by ID
        $product = product::find($id);

        if (!$product) {
            return response()->json("maaf id tidak ditemukan", 404);
        }

        //delete image
        Storage::delete('public/product/'.basename($product->image));

        //delete post
        $product->delete();

        //return response
        return new CobaResource(true, 'Data Product Berhasil Dihapus!', null);
    }

}
