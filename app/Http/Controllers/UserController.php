<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\User;

Class UserController extends Controller {
 use ApiResponser;

 private $request;

 public function __construct(Request $request){
    $this->request = $request;
 }

 public function getUsers(){
    $users = User::all();
    // return response()->json($users, 200);
    return $this->successResponse($users);
 }

 public function index(){
    $users = User::all();
    return $this->successResponse($users);
   
}
   
   public function add(Request $request ){
    $rules = [
    'user' => 'required|max:20',
    'password' => 'required|max:20',
    ];
   
    $this->validate($request,$rules);
   
    $user = User::create($request->all());
   
    return $this->successResponse($user, Response::HTTP_CREATED);
    }
}