<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneController extends Controller
{
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
        //
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $data = array(
            'menu' => 'create_phone'
        );
        return view('Phone.create')->with($data);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store()
    {

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
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
    
    public function test(){
        echo "asdf"; exit();
        $data = array(
            'menu' => 'create_phone'
        );
        return view('phone.create')->with($data);
    }

    public function uploadimage(Request $request){
        $this->validate($request,[
            "image" => 'image|max:100000'
            ]);
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $request->file('image')->storeAs('public/PhoneImages',$fileNameToStore);
            
            $path = env("APP_URL", "localhost")."/storage/PhoneImages/".$fileNameToStore;
            
            header('Content-Type: application/json');
            $data = array(
                'path' => $path
            );
            echo json_encode($data);
        }
        
        function _outputJSON($msg, $status = 'error'){
            header('Content-Type: application/json');
            die(json_encode(array(
                'data' => $msg,
                'status' => $status
            )));
        }
    }
    