<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Photo;
use App\Post;
use Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        if(!$posts->isEmpty()){
            return view('admin.posts.index' , compact('posts'));
        }else{
            return "there is no post yet";
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $user= Sentinel::getUser();
//        $user= $user->getUserId();
        $data = $request->all();
        if($file = $request->file('post_img')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images/posts', $name);
            $photo = Photo::create(['path' => $name]);
            $data['img_id'] = $photo->id;
        }
//        $data['user_id'] = $user;
        $data['cat_id'] = 1 ;


//        Post::create($data);
//        return $this->index()->withSuccess('Post Has Been Created Successfully');
        $user->posts()->create($data);
        return redirect('admin/posts')->withSuccess('Thank you , it has benn created');

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
        $post = Post::findOrFail($id);
        return view('admin.posts.edit' , compact('post'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $post->delete();
        return redirect('admin/posts')->withSuccess('post has been deleted successfully');
    }
}
