<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\addDoctor;
use Illuminate\Support\Facades\Hash;

class addDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Modifier" class="edit btn btn-primary btn-sm editDoctor">Modifier</a> ';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Suprimer" class="btn btn-danger btn-sm deleteDoctor">Suprimer</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('ajoutdocteur',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = Str::random(6);

        $role = "medecin";

        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

            
        $user = User::updateOrCreate(['id' => $request->doctor_id],
            [
                'name' => $request->name, 
                'role' => $role,
                'hopital' => $request->hopital,
                'email' => $request->email,
                'password' => Hash::make($password),
            ]); 
            
            $addDoctor = [
                'subject' => 'Signalement des cas suspects de COVID-19',
                'greeting' => 'Bonjour '.$user->name,
                'body' => 'En fin de mieux prendre en charge les patients atteint du COVID-19 . <br> Veuillez nous signaler les cas suspects dans votre centre médical. Connectez-vous pour soumettre les cas : <br> <b>E-mail </b> : '.$user->email.'<br> <b>Mot de passe</b> : '.$password,
                'thanks' => 'Vous allez recevoir un second message pour confirmer votre inscription avant de vous connectez. <br>Merci!<br>Cordialement.',
                'actionURL' => url('login'),
            ];
    
            Notification::send($user, new addDoctor($addDoctor));
            
            $user->sendEmailVerificationNotification();
       
            return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
     
        return response()->json(['success'=>'Médecin supprimé avec succès.']);
    }
}
