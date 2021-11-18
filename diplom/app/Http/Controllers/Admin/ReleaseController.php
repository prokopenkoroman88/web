<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;//+
use App\Application;//+
use App\Release;//+

class ReleaseController extends Controller
{

    public $path='/admin/releases';

    public function allApps(){//+
        //колонки - коллекция объектов -> в ассоц массив
        return Application::all('id','name')->pluck('name','id')->all();
    }

    public function write(Request $request, $id){//+
        //store(Request $request)
        //update(Request $request, $id)

        $request->validate([
            'name' => 'required|min:3',
            //'slug' => 'required|min:3', 
            //'content' => 'required|min:20|max:150',
//            'price' => 'required|min:0.01',
//            'sku' => 'required|min:3',
            //'category_id' => 'required|exists:categories,id',
        ]);


        if(!$id)
            $release = Release::create($request->all());//new +id
        else{
            $release = Release::find($id);//старое
            $release->update($request->all());
        };
        //dd($request->applications); //[1,2]

        //dd($request->files);


        $aFiles=[];

        $files = $request->file('files');//  'img' - имя поля формы

        if($files)
        foreach ($files as $key => $file) :
            # code...

        //dd($request->img);
        //dd($file);
        if($file){//если картинка выбрана, загрузить в нашу папку 'uploaded'
            $fName = $file->getClientOriginalName(); //uploaded file
            $fTeka='update/'.$release->product->slug;
            $file->move($fTeka, $fName);//в папку в public, новое назв файла

            //$news->img = "/$fTeka/$fName";
            $aFiles[]="/$fTeka/$fName";
//   \update\
        };

        endforeach;

        
        $release->files=implode("\n",$aFiles);//join
        //dd($release->files);
        $release->save();

        $release->applications()->sync($request->applications); 
        //через метод applications() с belongsToMany передаем массив выбранных id-шек
        //запишет связи в промежуточную табличку product_category


        return redirect($this->path);      
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $releases = Release::all();
        //$releases = Release::paginate(10);
        $path=$this->path;
        return view('admin.releases.index',compact('releases','path')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $release = new Release();
        $releases = Release::all();
        $products = Product::all('id','name')->pluck('name','id')->all();
        $applications = $this->allApps();
        return view('admin.releases.create',compact('release','releases','products','applications')); 
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
        $release = Release::find($id);
        return view('admin.releases.show',compact('release'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $release = Release::find($id);
        $releases = Release::all();
        $products = Product::all('id','name')->pluck('name','id')->all();
        $applications = $this->allApps();
        return view('admin.releases.edit',compact('release','releases','products','applications'));
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
        Release::find($id)->delete();
        return redirect($this->path);
    }
}
