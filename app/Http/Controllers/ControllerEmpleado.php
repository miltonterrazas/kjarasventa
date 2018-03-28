<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleado;
//use App\Http\Controllers\ControllerEmpleado;
use Illuminate\Support\Facades\Redirect;
use DB;

class ControllerEmpleado extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $empleados=DB::table('empleados')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->where('estado','=','1')
            ->paginate(7);
            return view('empleados.index',["empleados"=>$empleados,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

         $empleados = new empleado;
     
        $v = \Validator::make($request->all(), [
            
            'nombre' => 'required',
            'apellido' => 'required',
            'ci'    => 'required|unique:empleados',
            'direccion' => 'required',
            'telefono' => 'required'
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withInput($request->except('ci'))->withErrors($v->errors());
        }

       
         $empleados->ci=$request->get('ci');
         $empleados->nombre=$request->get('nombre');
         $empleados->apellido=$request->get('apellido');
        $empleados->fechaedad=$request->get('fecha');
         $empleados->direccion=$request->get('direccion');
         $empleados->telefono=$request->get('telefono');
        $empleados->estado='1';
        $empleados->save();
        return Redirect::to('empleados');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('empleados.show',["empleados"=>empleados::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('empleados.edit',["empleados"=>empleado::findOrFail($id)]);
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
        $empleados=empleado::findOrFail($id);
        $empleados->fill($request->all());
        // $clientes->nombre=$request->get('nombre');
        // $clientes->apellido=$request->get('apelliddo');
        // $clientes->ci=$request->get('ci');
        // $clientes->direccion=$request->get('direccion');
        // $clientes->telefono=$request->get('telefono');
        $empleados->update();
        return Redirect::to('empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado=empleado::findOrFail($id);
        $empleado->estado='0';
        $empleado->update();
        return Redirect::to('empleados');
    }
}
