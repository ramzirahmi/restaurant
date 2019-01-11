<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenusController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
     {
       $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $menu=Menu::all();
        return view('Menus', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input=$request->all();

      if(isset($input['image']))
        { 
         $input['image']=$this->upload($input['image']);
        }
    else
      {
     $input['image']='images/defautl.jpg';
      }
      $input['user_id']= \Auth::user()->id;
      Menu::create($input);
      return redirect()->back();
      }

    public function upload($file)
    {
      $extension=$file->getClientOriginalExtension();
      $sha1=sha1($file->getClientOriginalName());
      $filename=date('Y-m-d-h-i-s').".".$sha1.".".$extension;
      $path=public_path('images/');
      $file->move($path, $filename);
      return 'image/'.$filename;
      
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    dd($id);
        $menu=Menu::findOrFail($id)->delete();
        return redirect()->bak();
    }
}
