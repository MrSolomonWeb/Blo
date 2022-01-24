<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\City;
use App\Models\country;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }



    public function home()
    {


//        $data=country::all();
//        $data=country::limit(5)->get();
//        $data=country::query()->limit(5)->get();
//        $data=country::where( 'Code' , '<','ALB')->select('Code','Name')->offset(1)->limit(2)->get();
//        $data=city::find(5);
//        $data=country::find('USA');
//        $data = new BlogPost();
//        $data->title='Some New';
//        $data->content='Some New Data';
//        $data->save();

//        BlogPost::create(['title'=>'Some New6','content'=>'Some New Data6']);
//$z=new BlogPost();
//        $z->fill(['title'=>'Some New8','content'=>'Some New Data8']);
//        $z->save();
//        dd($data);

//        $data=BlogPost::find(5);
//        $data->content='Some New Data upd';
//        $data->save();

//        $data=BlogPost::where( 'content' , '=','text');
//
//        $data->update(['content'=>'newupd']);


//        $data=BlogPost::findorfail(9);
//
//        $data->delete();

//        BlogPost::destroy(7);
//        BlogPost::destroy([3,4,5]);
//        $testdb = DB::connection('testdb')->select('select * from tch_users');
//       foreach ($testdb as $value){
//           echo $value->user_login;
//       }

//        $data=BlogPost::find(6);
//  dd($data,$data->rubric->title);
// $rubric=Rubric::find(3);

// dd($rubric->title,$rubric->post->title);

// $rubric=Rubric::find(1);

// dd($rubric->posts);
//       $data=BlogPost::find(6);
// dd($data,$data->rubric->title);

//        $data=BlogPost::find(6)->rubric;
//        dd($data);

//        $posts =Rubric::find(1)->posts()->select('title')->where('id','>','1')->get();
//        dd($posts);
//        DB::enableQueryLog();
//
//        $query = DB::getQueryLog();
//        print_r( $query);
//        $data=BlogPost::with('rubric')->where('id','>',1)->get();
//
//foreach ($data as $datum){
//    dd($datum->title,$datum->rubric->title);
//}


//   $post = BlogPost::find(1);
//dump($post->title);
//foreach ($post->tags as $item){
//dump($item->title);
//}

//        $post = Tag::find(1);
//        dump($post->title);
//        foreach ($post->posts as $item){
//            dump($item->title);
//        }
//
//        dump(Cache::get('key'));
//Cache::put('key', 'Value', 60);
        /*Cache::forget('key');
       */
//        dump(Cache::pull('key'));
//        dump(Cache::get('key'));

// Cache::put('key', 'Value', 300);
//
//        Cache::forget('key');
//
//        dump(Cache::get('key'));

//Cache::forever('key', 'Value');
//        dump(Cache::get('key'));
//Cache::flush();

//        if (Cache::has('posts')) {
//            $posts = Cache::get('posts');
//        } else {
//            $posts = BlogPost::orderBy('id', 'desc')->get();
//            Cache::put('posts', $posts);
//        }



        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blogPost($id, $welcome = 1)
    {
        $pages = [
            1 => [
                'title' => 'from page 1',
            ],
            2 => [
                'title' => 'from page 2',
            ],
        ];
        $welcomes = [1 => '<b>Hello</b> ', 2 => 'Welcome to '];

        return view('blog-post', [
            'data' => $pages[$id],
            'welcome' => $welcomes[$welcome],
        ]);
    }
}
