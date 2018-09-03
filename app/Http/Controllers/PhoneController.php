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
        header('Content-Type: application/json');
        $data = new stdClass();
        $data->success = true;
        echo json_encode($data);
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
    
    public function uploadimage(Request $request){
    //     var_dump($request); exit();
    //     //$this->_outputJSON("Haha");
    //     $msg = "This is a simple message.";
    //   return response()->json(array('msg'=> $msg), 200);
    header('Content-Type: application/json');
$data = new stdClass();
$data->success = Upload::add($imgData);
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
