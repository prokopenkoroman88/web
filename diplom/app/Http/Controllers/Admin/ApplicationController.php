<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Application;//+

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $path='/admin/applications';

    public function index()
    {
        $applications = Application::all();
        //$applications = Application::paginate(10);
        $path=$this->path;
        return view('admin.applications.index',compact('applications','path')); 

    }

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
            $application = Application::create($request->all());//new +id
        else{
            $application = Application::find($id);//старое
            $application->update($request->all());
        };



        $file = $request->file('img');//  'img' - имя поля формы
        //$file = $request->img;


        //$file = Storage::url($file);

        //dd($request->img);
        //dd($file);
        if($file){//если картинка выбрана, загрузить в нашу папку 'uploaded'
            $fName = $file->getClientOriginalName(); //uploaded file
            $fTeka='images/applications';
            $file->move($fTeka, $fName);//в папку в public, новое назв файла

            $application->img = "/$fTeka/$fName";
            $application->save();
        };



        return redirect($this->path.'?product_id='.$request->product_id);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $application = new Application();
        $applications = $this->allApps();
        return view('admin.applications.create',compact('application','applications')); 
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
        $application = Application::find($id);
        return view('admin.applications.show',compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::find($id);
        $applications = $this->allApps();
        return view('admin.applications.edit',compact('application','applications'));

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
        Application::find($id)->delete();
        return redirect($this->path);
    }
}
