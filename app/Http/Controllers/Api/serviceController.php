<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


use App\Models\service;


use App\Http\Resources\CobaResource;

class serviceController extends Controller
{
    public function index()
    {
       
        $services = service::latest()->paginate(5);

       
        return new CobaResource(true, 'List Data Service', $services);
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
        $image->storeAs('public/service', $image->hashName());

      
        $service = service::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        //return response
        return new CobaResource(true, 'Data Service Berhasil Ditambahkan!',  $service);
    }

    public function show($id)
    {
       
        $service = service::find($id);

        if (!$service) {
            return response()->json("maaf id tidak ditemukan", 404);
        }

        
        return new CobaResource(true, 'Detail Data Service', $service);
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

    
        $service = service::find($id);

        if (!$service) {
            return response()->json("maaf id tidak ditemukan", 404);
        }

        //check if image is not empty
        if ($request->hasFile('image')) {

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/service', $image->hashName());

            //delete old image
            Storage::delete('public/service/'.basename($service->image));

            
            $service->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
            ]);

        } else {

           
            $service->update([
                'title'     => $request->title,
                'content'   => $request->content,
            ]);
        }

        //return response
        return new CobaResource(true, 'Data Service Berhasil Diubah!', $service);
    }

    public function destroy($id)
    {

     
        $service = service::find($id);

        if (!$service) {
            return response()->json("maaf id tidak ditemukan", 404);
        }

        //delete image
        Storage::delete('public/service/'.basename($service->image));



        $service->delete();

        //return response
        return new CobaResource(true, 'Data Service Berhasil Dihapus!', null);
    }

}
