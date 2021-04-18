<?php
namespace App\Http\Controllers\CredoWeb;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Models\CredoWeb\Users;
use App\Models\CredoWeb\Hospitals;



class UsersController extends Controller
{
 
    public function __construct() {
        
    }
    //CredoWeb Users
    public function Index() {
        $dataTypes = [
            1 => ['ID' => 1, 'name' => 'patient'],
            2 => ['ID' => 2, 'name' => 'doctor'],
        ];
    
        $dataHospitals = Hospitals::select('ID', 'name')->orderBy('name')->get();
    
        //$dataUsers = Users::orderBy('ID')->get();
        
        $dataUsers = DB::table('Users')
                ->select(
                    'Users.ID',
                    'Users.first_name',
                    'Users.last_name',
                    'Users.email',
                    DB::raw("(CASE
                        WHEN Users.type = 1 THEN 'patient'
                        WHEN Users.type = 2 THEN 'doctor'
                        ELSE ''
                    END) as type"),
                    'Users.created_at',
                    'Users.workplace_id',
                    'hospitals.name')
                ->leftJoin('hospitals', function ($leftJoin) {$leftJoin->on('hospitals.ID', '=', 'Users.workplace_id');})
                ->orderBy('Users.ID')->get();
        
	return view('CredoWeb.users',[
            'dataUsers'=>$dataUsers, 
            'dataLink' => 'Users', 
            'dataTypes' => $dataTypes, 
            'dataHospitals' => $dataHospitals
        ]); 
    }

    public function addUser(Request $request) {
        $addData = array();
        $requestData = $request->input('formData');
        //vetify data
        if (!empty($requestData)){
            foreach ($requestData as $key=>$value){
                switch ($value['name']) {
                    case 'first_name':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing First Name."];
                        }
                        break;
                    case 'last_name':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Last Name."];
                        }
                        break;
                    case 'email':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Email."];
                        }
                        else {
                            if (!filter_var($value['value'], FILTER_VALIDATE_EMAIL)){
                                return ['success'=>0,'error'=>"Invalid Email format."];
                            }
                        }
                        break;
                    case 'type':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Type."];
                        }
                        else {
                            if (!is_int($value['value']) && !in_array($value['value'], [1,2])){
                                return ['success'=>0,'error'=>"Invalid Type format."];
                            }
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
        
        $responseSQL = Users::create($addData);
        
        return [ 'success'=>1,'requestData'=>$addData, 'responseSQL' => $responseSQL]; 
    }
    
    public function openViewUserForm(Request $request) {
        $addData = array();
        $userID = $request->input('userID');
        
        $responseSQL = Users::where('ID', $userID)->first();
        
        return [ 'success'=>1,'requestData'=>$responseSQL];
    }
    
    public function openEditUserForm(Request $request) {
        $addData = array();
        $userID = $request->input('userID');
        
        $responseSQL = Users::where('ID', $userID)->first();
        
        return [ 'success'=>1,'requestData'=>$responseSQL];
    }
    
    public function editUser(Request $request) {
        $addData = array();
        $requestData = $request->input('formData');
        $userID = $request->input('userID');
        //vetify data
        if (!empty($requestData)){
            foreach ($requestData as $key=>$value){
                switch ($value['name']) {
                    case 'first_name':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing First Name."];
                        }
                        break;
                    case 'last_name':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Last Name."];
                        }
                        break;
                    case 'email':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Email."];
                        }
                        else {
                            if (!filter_var($value['value'], FILTER_VALIDATE_EMAIL)){
                                return ['success'=>0,'error'=>"Invalid Email format."];
                            }
                        }
                        break;
                    case 'type':
                        if (empty($value['value']) ){
                            return ['success'=>0,'error'=>"Missing Type."];
                        }
                        else {
                            if (!is_int($value['value']) && !in_array($value['value'], [1,2])){
                                return ['success'=>0,'error'=>"Invalid Type format."];
                            }
                        }
                        break;
                    default:
                        //code to be executed if n is different from all labels;
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
        
        $responseSQL = Users::where('ID', $userID)->update($addData);
        
        return [ 'success'=>1,'requestData'=>$addData, 'responseSQL' => $responseSQL]; 
    }
    
    public function deleteUser(Request $request) {
        $userID = $request->input('userID');
        try {
            $responseSQL = Users::where('ID', $userID)->delete();
        }
        catch(Exception $e) {
            return ['success'=>0,'error'=>"Error."];
        }
        
        return [ 'success'=>1, 'responseSQL' => $responseSQL]; 
    }
    
    //CredoWeb Hospitals
    public function Hospitals() {
//        $dataTypes = [
//            1 => ['ID' => 1, 'name' => 'patient'],
//            2 => ['ID' => 2, 'name' => 'doctor'],
//        ];
    
        $dataHospitals = Hospitals::select('ID', 'name')->orderBy('ID')->get();
    
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

    
    
    
    public function Modal(Request $request, $id) {
        $dataLinks = Links::where('ID', $id)->first();
        if (!isset($dataLinks)){
            $dataLinks = ['Name'=>'', 'URL'=>'','Color_ID'=>0];
        }
        
        $dataColors = Colors::where('active', 1)->orderBy('color')->get();
        return view('modal',['ID'=>$id, 'linksData'=>$dataLinks, 'dataColors'=>$dataColors ]); 
    }
        
    public function Update(Request $request) {
        
        if (null !== $request->input('ID') ){
            $id = $request->input('ID');
            if (!is_int($id) && (1>$id || $id>9)) {
                return ['success'=>0,'error'=>"Missing Data."];
            } 
        }
        else{
            return ['success'=>0,'error'=>"Missing Data."];
        }
        
        if (null !== $request->input('color_id') ){
            $color = intval($request->input('color_id'));
            if (!is_int($color)) {
                return ['success'=>0,'error'=>"$color Missing Color22."];
            } 
            if ($color == 0) {
                $update = Links::where('ID', $id)->delete();
                return ['success'=>1,'error'=>"$color Missing Color22."];
            } 
        }
        else{
            return ['success'=>0,'error'=>"Missing Color11."];
        }
        

        if (null !== $request->input('name') ){
            $name = $request->input('name');
        }
        else{
            return ['success'=>0,'error'=>"Missing Title."];
        }

        if (null !== $request->input('url') ){
            $url = $request->input('url');
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                return ['success'=>0,'error'=>"Link is not a valid URL"];
            } 
        }
        else{
            return ['success'=>0,'error'=>"Missing Link"];
        }
        
        
        
        $update = 'test';
        $ifUpdate = Links::where('ID', $id)->first();
        if (isset($ifUpdate)){
            $updateDta = [
                'Name'=>$name,
                'URL'=>$url,
                'Color_ID'=>$color
            ]; 
            $update = Links::where('ID', $id)->update($updateDta);
        }
        else{
            $updateDta = [
                'ID'=>$id,
                'Name'=>$name,
                'URL'=>$url,
                'Color_ID'=>$color
            ]; 
            $update = Links::create($updateDta);
        }
        return [ 'success'=>1,'data'=>$update];
    }
    
}




