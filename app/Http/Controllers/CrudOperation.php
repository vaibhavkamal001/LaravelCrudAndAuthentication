<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;   
use Illuminate\Support\Facades\Auth; 

class CrudOperation extends Controller
{

    public function logOut(Request $req){
        Auth::logout();
 
        $req->session()->invalidate();
    
        $req->session()->regenerateToken();
    
        return redirect(route('login'));
    }

    public function login(Request $req){
        $data = $req->validate([
            'email'=>'required|max:50',
            'password'=>'required|min:8'         
        ]);

        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            $req->session()->regenerate();
            return redirect(route('dashboard'));
        }

        return redirect(route('login'));
    }

    public function register(Request $req){
        $data = $req->validate([
            'name'=>'required|max:20',
            'email'=>'required|max:50',
            'password'=>'required|min:8'         
        ]);

        User::create([
            'name'=>$data['name'],
            'email'=> $data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        return redirect(route('login'));
    }

    public function Delete($id){
        $data = Task::find($id);
        $data->delete();
        return redirect(route("dashboard"));
    }

    public function dashboard(){
        $user = Auth::User();
        $data = Task::where("user_id",$user['id'])->get();
        return view("table",["data"=>$data]);
    }
    
    public function addTask(Request $req){
        $data = $req->validate([
            'task'=>'required|max:20'         
        ]);

        $user = Auth::user();

        Task::create([
            "user_id"=>$user['id'],
            "tasks"=>$data['task']
        ]);

        return redirect(route("dashboard"));
    }

    public function showRegister(){
        return view("register");
    }

    public function showLogin(){    
        return view("login");
    }


}
