<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\User;
use App\Category;
use App\PostCategory;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::
        paginate(8);
        return view('post.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('post.create', compact('categories','users'));
    }
    public function store(PostRequest $request)
    {
        $post = $request->all();
            if (Input::file('cover')!== NULL) {
                $image_upload = Input::file('cover');
                $extention = $image_upload->getClientOriginalExtension();
                $new_image_name = 'post-'. time().'.'.$extention;

                $img_path = public_path('image/post');
                $image_upload->move($img_path,$new_image_name);
                $post['image_cover'] = $new_image_name;
            }
        $save= Post::create($post);

        $category_data = array();
        foreach ($post['categories'] as $category) {
            $category_data[]=[
                'post_id'=> $save->id,
                'category_id'=> $category
            ];
        }
        $save_category= PostCategory::insert($category_data);

        if($save_category){
        return redirect('admin/post')->with('success','Postingan Berhasil ditambah');
        }
        return redirect()->back()->with('error','Gagal Menambah Data');
    }
    public function edit($id)
    {
        $posts = Post::findOrFail($id)->first();
        return view('post.edit',compact('posts'));
    }
    public function update(Request $request, $id)
    {
        $id = Post::where('id',$id);
        $post = $request->all();
        $update = $id->update([
            'category_id' => 1,
            'author_id'=>1,
            'title' => $post['title'],
            'content'=> $post['content'],
            'is_draft'=> $post['is_draft'],
        ]);
        if($update){
        return redirect('admin/post')->with('success','Postingan Berhasil diubah');
        }
        return redirect()->back()->with('error','Gagal Mengubah Postingan');
    }
    public function destroy(Request $request,$id)
    {
        $post = Post::where('id', $id);
        $cek = $post->delete();
        if ($cek) {
            return redirect('admin/post')->with('success','Postingan Berhasil dihapus');
        }
        return redirect()->back()->with('error','Gagal Menghapus Postingan');

    }
}
