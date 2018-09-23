<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use App\PhoneBrand;
use App\Phone;
use App\Photo;
use App\Specifications;

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
        $phones = Phone::all();
        //var_dump($phones[0]->brandss->brand_name); exit();
        $data = array(
            'menu' => 'list_phone',
            'phones' => $phones
        );
        return view('Phone.list')->with($data);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $brands = PhoneBrand::all();
        $data = array(
            'menu' => 'create_phone',
            'brands' => $brands
        );
        return view('Phone.create')->with($data);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
            'name'=>'required',
            'code'=>'required',
            'current_price'=>'required|numeric|min:0',
            'previous_price'=>'required|numeric|min:0',
            'brand'=>'required'
        ],$this->messages());
        
        var_dump($request); //exit();
        DB::beginTransaction();
        
        try {
            //Phone Insert
            $phone = array(
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'current_price' => $request->input('current_price'),
                'previous_price' => $request->input('previous_price'),
                'brand_id' => $request->input('brand'),
                'CreatedBy' => Auth::id(),
                'created_at' => date('d-m-d H:i:s'),
                'updated_at' => date('d-m-d H:i:s')
            );
            $phoneId =DB::table('phones')->insertGetId($phone);
            
            //Photo Insert
            
            $photos = array();
            $arrphoto =json_decode($request->input('imports'), true);
            
            foreach( $arrphoto as $p){
                $photo = array(
                    'phone_id' => $phoneId,
                    'import_name' => $p['import_name'],
                    'type' => $p['type'],
                    'src' => $p['src'],
                    'active' => true,
                    'order' => $p['order'],
                    'CreatedBy' => Auth::id(),
                    'created_at' => date('d-m-d H:i:s'),
                    'updated_at' => date('d-m-d H:i:s')
                );
                
                array_push($photos,$photo);
            }
            
            var_dump($photos);
            
            Photo::insert($photos);
            
            $spec = new  Specifications();
            $spec->phone_id = $phoneId;
            $spec->technology = $request->input('technology');
            $spec->twoG = $request->input('twoG');
            $spec->threeG = $request->input('threeG');
            $spec->fourG = $request->input('fourG');
            $spec->speed = $request->input('speed');
            $spec->GPRS = $request->input('GPRS');
            $spec->EDGE = $request->input('EDGE');
            $spec->announcedDate = $request->input('announcedDate');
            $spec->status = $request->input('status');
            $spec->releaseDate = $request->input('releaseDate');
            $spec->dimensions = $request->input('dimensions');
            $spec->weight = $request->input('weight');
            $spec->SIM = $request->input('SIM');
            $spec->type = $request->input('type');
            $spec->size = $request->input('size');
            $spec->resolution = $request->input('resolution');
            $spec->multitouch = $request->input('multitouch');
            $spec->protection = $request->input('protection');
            $spec->OS = $request->input('OS');
            $spec->chipset = $request->input('chipset');
            $spec->CPU = $request->input('CPU');
            $spec->GPU = $request->input('GPU');
            $spec->cardSlot = $request->input('cardSlot');
            $spec->internal = $request->input('internal');
            $spec->primary = $request->input('primary');
            $spec->features = $request->input('features');
            $spec->video = $request->input('video');
            $spec->secondary = $request->input('secondary');
            $spec->alertTypes = $request->input('alertTypes');
            $spec->loudSpeaker = $request->input('loudSpeaker');
            $spec->audioJack = $request->input('audioJack');
            $spec->WLAN = $request->input('WLAN');
            $spec->bluetooth = $request->input('bluetooth');
            $spec->GPS = $request->input('GPS');
            $spec->USB = $request->input('USB');
            $spec->NFC = $request->input('NFC');
            $spec->Radio = $request->input('Radio');
            $spec->sensors = $request->input('sensors');
            $spec->messaging = $request->input('messaging');
            $spec->browser = $request->input('browser');
            $spec->java = $request->input('java');
            $spec->batteryDetail = $request->input('batteryDetail');
            $spec->colors = $request->input('colors');
            $spec->testDetail = $request->input('testDetail');
            $spec->save();
            
            DB::commit();
            
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $brands = PhoneBrand::all();
        $phone = Phone::find($id);
        //var_dump($phone->photos[0]->src); exit();
        $data = array(
            'brands' => $brands,
            'phone' => $phone
        );
        return view('Phone.show')->with($data);
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
    
    public function messages()
    {
        return [
            'name.required'  => 'A message is required, :attribute',
        ];
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
    