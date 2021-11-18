<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;//+

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public $path='/user/comments';

    public function write(Request $request, $id){//+
        //store(Request $request)
        //update(Request $request, $id)

        //dd($request);
        $request->validate([
            'user_id' => 'required|exists:users,id',//
            'release_id' => 'required|exists:releases,id',//,id
            'mark' => 'required|min:0|max:5',
            'descr' => 'required|min:1',
            //'slug' => 'required|min:3', 
            //'content' => 'required|min:20|max:150',
//            'price' => 'required|min:0.01',
//            'sku' => 'required|min:3',
            //'category_id' => 'required|exists:categories,id',
        ]);


        if(!$id)
            $comment = Comment::create($request->all());//new +id
        else{
            $comment = Comment::find($id);//старое
            $comment->update($request->all());
        };
        //$comment->save();
        //dd($comment);

        //return redirect($this->path); 
        
        $url = '/whatsnew/'.$comment->release->product->slug.'/'.$comment->release->version.'#new-comment';    
        return redirect($url);
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
        return $this->write($request, 0);
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
        return $this->write($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Comment::find($id)->delete();
        //return redirect($this->path);
        
        $comment = Comment::find($id);
        $url = '/whatsnew/'.$comment->release->product->slug.'/'.$comment->release->version;

        return redirect($url);
    }
}
