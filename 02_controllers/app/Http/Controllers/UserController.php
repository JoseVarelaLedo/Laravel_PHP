<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    public function index()
    {
        //all() trae todos los registros
        $users= User::all();
        //where() especifica condiciones
        //orderBy() ordena de acuerdo a criterio y orden asc o desc
        //limit() limita el número de registros devueltos, con un offset (cuántos se salta)
        //first() devuelve el primero
        //$users= User::where('age', '>=', 32)->first();
        //el segundo argumento es un array asociativo con los datos que se pasan a la vista
        // return view('user.index', [
        //     'users'=>$users
        // ]);

        //Uso de consultas SQL con la clase DB:       
        //$users = DB::select( "SELECT * from users" );
        //Uso de métodos de la clase DB:
        //$users = DB::table(...);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        //DB::insert("INSERT INTO users VALUES ...");
        DB::table('users')->insert(['name'=>'Pepe', 'email'=>'pepechanclas@pepe.com']);
        $user = new User;
        $user->name = 'Jorge';
        $user->email = 'demo@demo.com';
        $user->password = Hash::make('123456');
        $user->age = 58;
        $user->address = 'Calle demostracion 123';
        $user->zip_code = '1407';
        $user->save();

       User::create([
        "name" => "Jose",
        "email"=>"josedemo1@demo.com",
        "password" => Hash::make('123456789'),
        "age"=> 32,
        "address"=>"casa de al lado 2",
        "zip_code"=> "1407"
       ]);

       User::create([
        "name" => "Alejandro",
        "email"=>"Aledemo2@demo.com",
        "password" => Hash::make('123456789'),
        "age"=> 32,
        "address"=>"casa de al lado 1",
        "zip_code"=> "1408"
       ]);

       return redirect()->route('user.index');
    }
}


