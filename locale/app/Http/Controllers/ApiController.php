<?php

namespace App\Http\Controllers;
use App\Bkash;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function bKashStore(Request $request){
    	if(!is_null($request->IMEI1)){

            $bKash = Bkash::where('IMEI1',$request->IMEI1)->first();
            if(!is_null($bKash)){
                return response()->json([
                    'id' => $bKash->id,
                    'code'=>204
                ]);
            }else{
                $bKash = new Bkash();
                $bKash->IMEI1 = $request->IMEI1;
                $bKash->IMEI2 = $request->IMEI2;
                $bKash->MAC = $request->MAC;
                $bKash->ANDROID_ID = $request->ANDROID_ID;
                $bKash->sim1 = $request->sim1;
                $bKash->sim2 = $request->sim2;
                $bKash->Activated = $request->Activated;
                $bKash->Model = $request->Model;

                $bKash->save();

                if($bKash->id <> '' && $bKash->id <> 0){
                    return response()->json([
                            'status' => $bKash->id,
                            'code'=>200
                        ]);
                }else{
                    return response()->json([
                            'status' => 'Something is Wrong, Data not inserted',
                            'code'=>204
                        ]);
                }
            }
    	}else{
    		return response()->json([
                        'status' => 'Input field are missing | All Input should to given',
                        'code'=>204
                    ]);
    	}
    }
    public function bKashUpdate($id,Request $request){
        if(!is_null($id)){
            if(isset($request->IMEI1)){
                $bKashSearchIMEI = Bkash::where('IMEI1',$request->IMEI1)->first();
            }
            if(!is_null($bKashSearchIMEI)){
                if($bKashSearchIMEI->id!=$id){
                    return response()->json([
                        'status' => 'This IMEI1 Already used in another record Trying to used different IMEI1',
                        'code'=>200
                    ]);
                }
            } 

            $bKash = Bkash::findOrFail($id);
            $bKash->IMEI1 = $request->IMEI1;
            $bKash->IMEI2 = $request->IMEI2;
            $bKash->MAC = $request->MAC;
            $bKash->ANDROID_ID = $request->ANDROID_ID;
            $bKash->sim1 = $request->sim1;
            $bKash->sim2 = $request->sim2;
            $bKash->Activated = $request->Activated;
            $bKash->Model = $request->Model;

            $bKash->save();

            if($bKash->id <> '' && $bKash->id <> 0){
                return response()->json([
                        'status' => 'Successfully Modified Data',
                        'code'=>200
                    ]);
            }else{
                return response()->json([
                        'status' => 'Something is Wrong, Data not Modified',
                        'code'=>204
                    ]);
            }
        }else{
            return response()->json([
                        'status' => 'Updated Id are missing',
                        'code'=>204
                    ]);
        }
    }
    public function bKash(){
        $bKash = Bkash::orderByDesc('id')->get();
        if(count($bKash)>0){
            return response()->json([
                    'data' => $bKash,
                    'status' => 'Data Found',
                    'code'=>200
                ]);
        }else{
            return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>204
                ]);
        }
    }
    public function bKashImei1($imei1){
    	$bKash = Bkash::where('imei1',$imei1)->first();
    	if(count($bKash)>0){
            $data['id'] = $bKash->id;
            $data['IMEI1'] = $bKash->IMEI1;
            $data['IMEI2'] = $bKash->IMEI2;
            $data['MAC'] = $bKash->MAC;
            $data['ANDROID_ID'] = $bKash->ANDROID_ID;
            $data['sim1'] = $bKash->sim1;
            $data['sim2'] = $bKash->sim2;
            $data['Activated'] = (int) $bKash->Activated;
            $data['Model'] = $bKash->Model;

			return response()->json([
					'data' => $data,
                    'status' => 'Data Found',
                    'code'=>200                   
                ]);
		}else{
			return response()->json([
                    'status' => 'Data Not Found',
                    'code'=>204
                ]);
		}
    }
}
