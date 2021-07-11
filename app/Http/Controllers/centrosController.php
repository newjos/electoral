<?php

namespace App\Http\Controllers;

use App\centros;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\CollectionCollection;
use DB;


class centrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    
       $datos['centros']=centros::groupBy('estado')->paginate(10);                          
       return view('centros.index', $datos);
        

    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\centros  $centros
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
      
       $datos['centros']=centros::groupBy('municipio')->paginate(10); 
       return view('centros.municipios', $datos);

      
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\centros  $centros
     * @return \Illuminate\Http\Response
     */
    public function edit(centros $centros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\centros  $centros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, centros $centros)
    {
        //
    }

    public function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('centros')
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
