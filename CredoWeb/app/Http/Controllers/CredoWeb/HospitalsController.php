<?php
namespace App\Http\Controllers\CredoWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//use App\Models\CredoWeb\Users;
use App\Models\CredoWeb\Hospitals;



class HospitalsController extends Controller
{
 
    public function __construct() {
        
    }
    
    public function Index() {
//        $dataTypes = [
//            1 => ['ID' => 1, 'name' => 'patient'],
//            2 => ['ID' => 2, 'name' => 'doctor'],
//        ];
        //$dataHospitals = 'test';
        $dataHospitals = Hospitals::orderBy('ID')->get();
    
        //$dataUsers = Users::orderBy('ID')->get();
        
//        $dataUsers = DB::table('Users')->
//                select(
//                    'Users.ID',
//                    'Users.first_name',
//                    'Users.last_name',
//                    'Users.email',
//                    DB::raw("(CASE
//                        WHEN Users.type = 1 THEN 'patient'
//                        WHEN Users.type = 2 THEN 'doctor'
//                        ELSE ''
//                    END) as type"),
//                    'Users.created_at',
//                    'Users.workplace_id',
//                    'hospitals.name')->
//                leftJoin('hospitals', function ($leftJoin) {$leftJoin->on('hospitals.ID', '=', 'Users.workplace_id');})->orderBy('Users.ID')->get();
        
	return view('CredoWeb.hospitals',[
            'dataLink' => 'Hospitals', 
            'dataHospitals' => $dataHospitals
        ]); 
    }

    public function addHospitals(Request $request) {
        $addData = array();
        $requestData = $request->input('formData');
        //vetify data
        if (!empty($requestData)){
            foreach ($requestData as $key=>$value){
                switch ($value['name']) {
                    case 'name':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Name."];
                        }
                        break;
                    case 'address':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Address."];
                        }
                        break;
                    case 'phone':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing phone."];
                        }
                        break;
                    default:
                } 
                
            }
            
        } 
        
        
        
        foreach ($requestData as $key=>$value){
            if(empty($value['value'])){
                //$addData[$value['name']] = 'NULL';
            }
            else {
                $addData[$value['name']] = $value['value'];
            }
        };
        
        $responseSQL = Hospitals::create($addData);
        
        return [ 'success'=>1,'requestData'=>$addData, 'responseSQL' => $responseSQL]; 
    }
    
    public function openEditHospitalsForm(Request $request) {
        $addData = array();
        $hospitalID = $request->input('hospitalID');
        
        $responseSQL = Hospitals::where('ID', $hospitalID)->first();
        
        return [ 'success'=>1,'requestData'=>$responseSQL];
    }
    
    public function editHospital(Request $request) {
        $addData = array();
        $requestData = $request->input('formData');
        $hospitalID = $request->input('hospitalID');
        //vetify data
        if (!empty($requestData)){
            foreach ($requestData as $key=>$value){
                switch ($value['name']) {
                    case 'name':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Name."];
                        }
                        break;
                    case 'address':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Address."];
                        }
                        break;
                    case 'phone':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Phone."];
                        }
                        break;
                    default:
                } 
                
            }
            
        } 
        
        foreach ($requestData as $key=>$value){
            if(empty($value['value'])){
                //$addData[$value['name']] = 'NULL';
            }
            else {
                $addData[$value['name']] = $value['value'];
            }
        };
        
        $responseSQL = Hospitals::where('ID', $hospitalID)->update($addData);
        
        return [ 'success'=>1,'requestData'=>$addData, 'responseSQL' => $responseSQL]; 
    }
    
    public function deleteHospital(Request $request) {
        $hospitalID = $request->input('hospitalID');
        try {
            $responseSQL = Hospitals::where('ID', $hospitalID)->delete();
        }
        catch(Exception $e) {
            return ['success'=>0,'error'=>"Error."];
        }
        
        return [ 'success'=>1, 'responseSQL' => $responseSQL]; 
    }
    
    
}




