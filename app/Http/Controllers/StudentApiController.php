<?php

namespace App\Http\Controllers;
use App\Models\studentModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    public function index()
    {
        $varstudents=studentModel::all();
        if($varstudents->count()>0){
            return response()->json
           ([
            'status'=>200,
            'varstudents'=>$varstudents
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
            'email'=>'required|string|max:191',
            'phone'=>'required|string|max:11',
            'course'=>'required|string|max:191',
        ]);
        if($validator->fails()){
            return response()->json
            ([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $varstudent=studentModel::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'course'=>$request->course,
            ]);
            if($varstudent){
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
    public function show($id)
    {
        $varrstudent=studentModel::find($id);
        if($varrstudent){
            return response()->json
            ([
                'status'=>200,
                'Student Data'=>$varrstudent
            ],200);
        }else{
            return response()->json
            ([
                'status'=>400,
                'message'=>"No data recorded"
            ],400); 
        }
    }
    public function edit($id)
    {
        $varrstudent=studentModel::find($id);
        if($varrstudent){
            return response()->json
            ([
                'status'=>200,
                'Student Data'=>$varrstudent
            ],200);
        }else{
            return response()->json
            ([
                'status'=>400,
                'message'=>"No data recorded"
            ],400); 
        }
        
    }
    public function update(Request $request, int $id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:191',
            'email'=>'required|string|max:191',
            'phone'=>'required|string|max:11',
            'course'=>'required|string|max:191',
        ]);
        if($validator->fails()){
            return response()->json
            ([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $upstudent=studentModel::find($id);
            if($upstudent){
                $upstudent->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'course'=>$request->course,
                ]);
                return response()->json
                ([
                    'status'=>200,
                    'message'=>"Data updated successfully"
                ],200);
            }else{
                return response()->json
                ([
                    'status'=>400,
                    'message'=>"No recorded here"
                ],400); 
            }
        }
    }
    public function delete($id)
    {
        $deleteData=studentModel::find($id);
        if($deleteData){
            $deleteData->delete();
            return response()->json
            ([
                'status'=>200,
                'message'=>"Data delete successfully"
            ],200);
        }else{
            return response()->json
            ([
                'status'=>400,
                'message'=>"No recorded here"
            ],400); 
        }
    }
}

