<?php

namespace App\Http\Controllers;
use App\miembros;
use Illuminate\Http\Request;
use DB;



class miembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       $cedula = $request->get('buscar');
       $datos['miembros']=miembros::where('cedula','like',"%$cedula%")
       ->paginate(10);
       return view('miembros.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $bancolist = DB::table('bancos')
                        ->groupBy('banco')
                        ->orderBy('id','asc')
                        ->get(); 
        $cargolist = DB::table('cargos')
                        ->groupBy('cargo')
                        ->orderBy('id','asc')
                        ->get();                        
        $country_list = DB::table('dependencias_dinamicas')
                        ->groupBy('estado')
                        ->get();                        
        return view('miembros.create', compact('cargolist', 'bancolist', 'country_list'));
               
    }
   
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /**
         * validacion de los campos para que se puedan guardar sin errores de campos vacios
         */
        $campos=[

            'cedula' => 'required|string|max:9',
            'nombre' => 'required|string|max:100',
            'cargo' => 'required|string|max:150',
            'estado' => 'required|string|max:150',
            'municipio' => 'required|string|max:150',
            'parroquia' => 'required|string|max:150',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email',
            'banco' => 'required|string|max:80',
            'cuenta' => 'required|string|max:20',
            'titularCta' => 'required|string|max:100',
            'cedulaCta' => 'required|string|max:9',
            'centro' => 'required|string|max:200',
            
        ];
        $Mensaje=["required"=>'El :attribute es Requerido'];
        
        $this->validate($request,$campos,$Mensaje);

        $datosMiembros=request()->except('_token');

        //aqui se inserta en la base de datos
        miembros::insert($datosMiembros);

        //return response()->json($datosEstruturas);
        return redirect('miembros')->with('Mensaje','Registro Agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Miembros  $miembros
     * @return \Illuminate\Http\Response
     */
    public function show(miembros $miembros)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Miembros  $miembros
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bancolist = DB::table('bancos')
                        ->groupBy('banco')
                        ->orderBy('id','asc')
                        ->get(); 
        $cargolist = DB::table('cargos')
                        ->groupBy('cargo')
                        ->orderBy('id','asc')
                        ->get(); 
        
        $country_list = DB::table('dependencias_dinamicas')
                        ->groupBy('estado')
                        ->get();
        $miembro= miembros::findOrFail($id);
        return view('miembros.edit', compact('miembro', 'cargolist', 'bancolist', 'country_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Miembros  $miembros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[

            'cedula' => 'required|string|max:9',
            'nombre' => 'required|string|max:100',
            'cargo' => 'required|string|max:150',
            'estado' => 'required|string|max:150',
            'municipio' => 'required|string|max:150',
            'parroquia' => 'required|string|max:150',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email',
            'banco' => 'required|string|max:80',
            'cuenta' => 'required|string|max:20',
            'titularCta' => 'required|string|max:100',
            'cedulaCta' => 'required|string|max:9',
            'centro' => 'required|string|max:200',
            
        ];
        $Mensaje=["required"=>'El :attribute es Requerido'];
        
        $this->validate($request,$campos,$Mensaje);



        $datosmiembros=request()->except(['_token','_method']);
        miembros::where('id','=',$id)->update($datosmiembros);

       return redirect('miembros')->with('Mensaje','Registro Modificado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Miembros  $miembros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        miembros::destroy($id);
        return redirect('miembros')->with('Mensaje','Registro Eliminado con Exito');
    }
    public function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('dependencias_dinamicas')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
     }
}

