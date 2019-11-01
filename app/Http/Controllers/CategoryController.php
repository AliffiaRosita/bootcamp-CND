<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = $request->all();
        //validasi inputan
        $request->validate([
            'name'=>'required|unique:categories|max:100',
            'description'=>'required',
         ]);
        $save= Category::insert([
            'name' => $categories['name'],
            'description'=> $categories['description'],
        ]);
        if($save){
        return response()->json([
            'success'=> true,
            'type'=> 'add',
            'message' => 'Berhasil Menambah Kategori baru'
        ]);
        }
        return response()->json([
            'success'=> false,
            'type'=>'add',
            'message' => 'Gagal Menambah Kategori!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $categories_data = $request->all();
        $categories = Category::where('id',$id);
        $update= $categories->update([
            'name' => $categories_data['name'],
            'description'=> $categories_data['description'],
        ]);
        if($update){
        return response()->json([
            'success'=> true,
            'type'=> 'update',
            'id' =>$id,
            'message' => 'Berhasil Mengubah Data Kategori '
        ]);
        }
        return response()->json([
            'success'=> false,
            'type'=>'update',
            'id' =>$id,
            'message' => 'Gagal Mengubah Kategori!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id);
        $cek = $category->delete();
        if ($cek) {
            return response()->json([
                'success'=> true,
                'id' =>$id,
                'message' => 'Berhasil Menghapus Data Kategori '
            ]);
            }
            return response()->json([
                'success'=> false,
                'id' =>$id,
                'message' => 'Gagal Mengubah Kategori!'
            ]);
    }
}
