<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhoneBrand;

class PhoneBrandsController extends Controller
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
        $brands = PhoneBrand::all();
        $data = array(
            'menu' => "list_brand",
            'brands' => $brands
        );
        return view('PhoneBrand.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'menu' => "create_brand"
        );
        return view('PhoneBrand.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "brand_name" => "required",
            "image" => 'image|nullable|max:10000'
        ]);

        if($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/BrandImages',$fileNameToStore);
        }else{
            $fileNameToStore = "NoImage.PNG";
        }

        $brand = new PhoneBrand;
        $brand->brand_name = $request->input('brand_name');
        $brand->url = $request->input('url');
        $brand->image = $fileNameToStore;
        $brand->save();

        return redirect('/brand')->with('success',"Save success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = PhoneBrand::find($id);
        return view('PhoneBrand.show')->with('brand',$brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = PhoneBrand::find($id);
        return view('PhoneBrand.edit')->with('brand',$brand);
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
        $this->validate($request,[
            "brand_name" => "required",
            "image" => 'image|nullable|max:10000'
        ]);

        if($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->storeAs('public/BrandImages',$fileNameToStore);
        }

        $brand = PhoneBrand::find($id);
        $brand->brand_name = $request->input('brand_name');
        $brand->url = $request->input('url');
        if(isset($fileNameToStore)){
            $brand->image = $fileNameToStore;
        }
        $brand->save();

        return redirect('/brand')->with('success',"Update success");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = PhoneBrand::find($id);
        $brand->delete();
        return redirect('/brand')->with('success',"Delete ". $brand->brand_name ." brand success");
    }
}
