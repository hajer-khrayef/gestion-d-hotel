<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Category::all();
    }

    public function getIndex(){
        $categories = Category::latest()->get();

        return response()->json([
            'categories' => $categories
        ],200);
    }

    public function postIndex(Request $request){
        $this->validate($request,[
            'typeroom' => 'required|string|max:150',
            
            'description' => 'required|string|max:150',
            'image' => 'required',
        ]);
        if(!empty($request->image)){
            $name = time().'.' .explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            Image::make($request->image)->save(public_path('uploads/Category/photos/').$name);
            Image::make($request->image)->resize(150, 100)->save(public_path('uploads/Category/thumbnail/').$name);
            $request->merge(['image' => $name]);

        }
        auth()->user()->category()->create($request->all());
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
        $request->validate([
            'typeroom'=>'required',
            
            'description'=>'required',
            'image'=>'required',
           
          
            ]);
        
            return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($typeroom)
    {
        return Category::find($typeroom);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($typeroom)
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
    public function update(Request $request, $typeroom)
    {
        $this->validate($request,[
            'typeroom' => 'required|string|max:150',
           
            'description' => 'required|string|max:150',
            'image' => 'required|string|max:150',
           
        ]);

        $category = Category::findOrFail($typeroom);

        $currentphoto = $category->image;
        if($request->image != $currentphoto and !empty($request->image)){
            $name = time().'.' .explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            Image::make($request->image)->save(public_path('uploads/Category/photos/').$name);
            Image::make($request->image)->resize(150, 100)->save(public_path('uploads/Category/thumbnail/').$name);
            $request->merge(['image' => $name]);

            $thumbnail = public_path('uploads/Category/thumbnail/').$currentphoto;
            if(file_exists($thumbnail)){
                @unlink($thumbnail);
            }

            $photo = public_path('uploads/Category/photos/').$currentphoto;
            if(file_exists($photo)){
                @unlink($photo);
            }

        }

        $category->update($request->all());

        return response()->json([
            'message' => 'ok'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($typeroom)
    {
        return Category::destroy($id);
        // $category = Category::findOrFail($id);
        // $rooms = $category->room;
        // $rooms->delete();
        // $category->delete();

        // return response()->json([
        //     'message' => 'ok'
        // ],200);
    }
}