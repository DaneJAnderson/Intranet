<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Uploads;
use Illuminate\Http\Request;

use App\Http\Requests;

class uploadsController extends Controller
{
    public function creates(){

        return view('uploads.create');
   
    }

    public function post(Request $request){
        

         $Files = $request->all();
         
        if ($request->hasFile('file')) {
           
           $path = storage_path();
           // $path = public_path();
           $pre = explode("/", $Files['url']);
           if(empty($pre[1])){
                $pre[0]='pdf';
           }
           // return dd($pre[0]);
          // Storage::disk('local')->put('file.txt', 'Contents');          
          $file = $request->file('file');
          // $url = $file->move($path.'\app\public\documents\test',$file->getClientOriginalName());
          $url = $file->move($path.'\app\public\documents\test\\'.strtolower($pre[0]), $file->getClientOriginalName());
          
        }
               
        $Uploads = new Uploads();
        $response = $Uploads->post($Files);
        
        // return response()->json($upload);
        return redirect('uploads/creates')->with('status', $response);        

    }

    public function update(){

        $Uploads = new Uploads();
        $upload = $Uploads->update();

        return view('uploads.update', ['upload' => $upload]);        
    }

}
