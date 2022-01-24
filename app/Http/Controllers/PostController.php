<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;

use App\Models\Blogpost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index','show']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // DB::connection()->enableQueryLog();
//        Lazy get res
//        $posts=Blogpost::all();
//        Eager loaded (RECOMENDED)
        // $posts=Blogpost::with('comment')->get();
        // foreach ($posts as $post){
        //     foreach ($post->comment as $comment){
        //         echo $comment->content . '<br>';
        //     }
        // }


        // dd(DB::getQueryLog());
        // if ($request->is('api/*')) {
        //     $items = Blogpost::get();

        //     return response()->json($items);

        // } else {
        //     return view('posts.index',['posts'=>Blogpost::withCount('comment')->get()]);
        // }

//        return view('posts.index',['posts'=>Blogpost::withCount('comment')->get()]);
        return view('posts.index',['posts'=>Blogpost::with('user')->orderByDesc('updated_at')->get()]);

//       dd(BlogPost::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



//    public function store(Request $request)
    public function store(StoreBlogPost $request)
    {
//        dd($request->all());



//        $validateData=$request->validate(
//            ['title'=>'bail|min:5|required|max:100|unique:App\Models\BlogPost,title',
//                'content'=>'required|max:255|min:10']);


//        $validateData=$request->validate();
        $validatedData=$request->validated();

//
        $validatedData['user_id']=Auth::user()->id;

//        dd($validatedData);
        $blog_post = Blogpost::create($validatedData);
//        $blog_post = new BlogPost();
//        $blog_post->title=$request->input('title');
//        $blog_post->content=$request->input('content');
//        $blog_post->save();
//        return redirect()->route('posts.index');
        $request->session()->flash('status','Blog post was created');
        return redirect()->route('posts.show',['post'=>$blog_post->id]);
//      dd($title,$content);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
//        $request->session()->reflash();
        return view('posts.show',[

            'post'=>Blogpost::with('comment')->findorfail($id)

        ]);


//        dd(BlogPost::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('posts.edit',['post'=>Blogpost::findorfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        $post = Blogpost::findorfail($id);
        $validatedData=$request->validated();

        $post->fill($validatedData);
        $post->save();
        $request->session()->flash('status','Blog post was updated');
        return redirect()->route('posts.show',['post'=>$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
//        v1
        $post = Blogpost::findorfail($id);
        $post->delete();

//        v2
//        BlogPost::destroy($id);
        $request->session()->flash('status','Blog post was deleted');
        return redirect()->route('posts.index');
    }
}
