<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection as Collection;
use App\Contact;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idusuario = Auth::user()->id;
        $contactsarray =  DB::select('SELECT * FROM contacts where contacts.c_id_u_fk =' .$idusuario);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($contactsarray);
        $perPage = 3;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $uscontacts = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,['path' => LengthAwarePaginator::resolveCurrentPath()] );
        return view('home', compact('uscontacts'));
    }

    //Eliminar contacto
    public function user_destroy_contact($id)
   {
    $singlecon=Contact::find($id)->delete();     
    return redirect()->route('home')->with('success','Contacto eliminado satisfactoriamente');
   }

   //Vista Editar Conatcto
   public function user_edit_contact($id)
    {
        $singlecon=Contact::find($id);
        return view('homeupdatecont',compact('singlecon'));
    }

    //Actualizar Contacoto
   public function user_update_contact(Request $request, $id)
   {
    $this->validate($request,[ 'c_name'=>'required', 'c_lastname'=>'required', 'c_cont_number'=>'required','c_kindof'=>'required','c_relationship'=>'required']);
    Contact::find($id)->update($request->all());   
    return redirect()->route('home')->with('success','Contacto actualizado satisfactoriamente');
   }

   public function user_create_contact(Request $request){
        $this->validate($request,[ 'c_name'=>'required', 'c_lastname'=>'required', 'c_cont_number'=>'required', 'c_kindof'=>'required','c_relationship'=>'required']);
        $idusuario = Auth::user()->id;
        DB::table('contacts')->insert([
                'c_name' => $request->c_name,
                'c_lastname' => $request->c_lastname,
                'c_cont_number' => $request->c_cont_number,
                'c_kindof' => $request->c_kindof,
                'c_relationship' => $request->c_relationship,
                'c_id_u_fk' => $idusuario,
        ]);
        return redirect()->route('home')->with('success','Usuaro creado exitosamente');
   }

}
