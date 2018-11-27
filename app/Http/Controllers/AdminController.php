<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userslist = User::paginate(3);
        return view('adminviews.admin', compact('userslist'));
    }

    //Eliminar Usuario
    public function admin_destroy_user($id)
   {
    $singleuser=User::find($id)->delete();     
    return redirect()->route('admin.dashboard')->with('success','Usuario eliminado satisfactoriamente');
   }
   //Vista Editar Usuario
   public function admin_edit_user($id)
    {
        $singleuser=User::find($id);
        return view('adminviews.adminupdateusr',compact('singleuser'));
    }
    //Actualizar usuario
   public function admin_update_user(Request $request, $id)
   {
    $this->validate($request,[ 'name'=>'required', 'lastname'=>'required', 'gender'=>'required','birthdate'=>'required']);
    User::find($id)->update($request->all());   
    return redirect()->route('admin.dashboard')->with('success','Usuario actualizado satisfactoriamente');
   }

   public function admin_create_user(Request $request){
        $this->validate($request,[ 'name'=>'required', 'lastname'=>'required', 'identification'=>'required|unique:users', 'gender'=>'required','birthdate'=>'required', 'email'=>'required|unique:users','password'=>'required']);
        User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'identification' => $request->identification,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'email' => $request->email,
                'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.dashboard')->with('success','Usuario creado exitosamente');
   }
}
