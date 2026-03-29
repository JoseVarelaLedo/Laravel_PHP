<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\InfoRequest;
use App\Models\Info;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::get();
        return view('index', compact('infos'));
    }

    public function create()
    {
        return view ('create');
    }

    public function store(InfoRequest $request)
    {
        //generar nombre de archivo único con el timestamp
        $filename = time() . '.' . $request->file->extension();
        //mover archivo al directorio public, al subdirectorio images
        //si dicho subdirectorio no existe, se crea automáticamente
        //$request->file->move(public_path('images'), $filename);

        //mover al storage, no a public
        //si el subdirectorio images no existe, se crea automáticamente
        $request->file->storeAs('images', $filename, 'public');

        // otra forma de guardar un archivo en el disco local o s3 o ftp o sftp
        // Storage::disk('local')->put();

        //almacenar en la BD
        $info = new Info;
        $info->name = $request->name;
        //estrategia 1: usar la uri local donde se almacena
        //$info->file_uri = "images/*".$filename;
        //estrategia 2: usar directamente el nombre de archivo
        //y construir la ruta a posteriori
        $info->file_uri = $filename;
        $info->save();

         // asi tambien podemos hacer para que puedan descargar un archivo
        // return Storage::download('descarga.jpg', $info->file_url);

        //obtener URL de acceso al archivo:
        Storage::url($info->file_uri);
         //url temporal
         Storage::temporaryUrl('my_image.jpg', now()->addMinutes(10));

        return redirect()->route('index');
    }
}
