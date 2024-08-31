<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gender;
use App\Models\CivilStatus;
use App\Models\Course;
use App\Models\InterestLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
     public  function index () {

        $genders = Gender::all();
        $civilStatuses = CivilStatus::all();
        $courses = Course::all();
        $interestLevels = InterestLevel::all();
     


        return view(
            'auth.registro',
             compact('genders', 'civilStatuses','interestLevels' ,'courses')
        );
   }

     public  function store(Request $request) {
 
        //Validacion
        $request->validate([ 
            'name' => 'required|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
    



        ]);

            // Crear el usuario con los datos proporcionados
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'last_name' => $request->last_name,
        'mother_last_name' => $request->mother_last_name,
        'age' => $request->age,
        'civil_status_id' => $request->civil_status_id,
        'gender_id' => $request->gender_id,
        'course_id' => $request->course_id,
    ]);

    Auth::attempt($request->only('email','password'));

    return redirect()->route('home.index', [$request->user()->name]);

     }



}
