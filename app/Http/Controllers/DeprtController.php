<?php

namespace App\Http\Controllers;
use App\Models\deprtModel;
use App\Models\studentModel;
use Illuminate\Http\Request;

class DeprtController extends Controller
{
    public function index()
    {
        $deprt=deprtModel::all();
        if($deprt->count()>0){
            return response()->json
           ([
            'status'=>200,
            'varstudents'=>$deprt
           ],200);


        }else{
            return response()->json
            ([
                'status'=>404,
                'student'=>'No records'
            ],404);
      
        }
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:191',
            'student_id'=>'required|Integer',
        ]);
        if($validator->fails()){
            return response()->json
            ([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $de=deprtModel::create([
                'name'=>$request->name,
                'student_id'=>$request->student_id,
            ]);
            if($de){
                return response()->json
                ([
                    'status'=>200,
                    'message'=>"Data created successfully"
                ],200);
            }else{
                return response()->json
                ([
                    'status'=>500,
                    'message'=>"Some thing Worngs"
                ],500); 
            }
        }
    }
}
