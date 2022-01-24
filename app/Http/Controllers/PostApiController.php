<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogpost;
use Illuminate\Support\Facades\Validator;
class PostApiController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');

    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Blogpost::get();

        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return ['response' => $validator->messages(), 'success' => false];
        }

        $contact = Blogpost::create([
            'title' => $request->input('text'),
            'content' => $request->input('body'),
            ] ) ;

        // $item = new Blogpost();
        // $item->title = $request->input('text');
        // $item->content = $request->input('body');
        // $item->save();



        return response()->json( $contact );
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Blogpost::find($id);

        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return ['response' => $validator->messages(), 'success' => false];
        }

        $item = Blogpost::find($id);
        $item->title = $request->input('text');
        $item->content = $request->input('body');
        $item->save();

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Blogpost::find($id);

        $item->delete();

        return ['response' => 'Item deleted', 'success' => true];
    }
}
