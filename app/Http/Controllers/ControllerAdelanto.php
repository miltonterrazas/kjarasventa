<?php

namespace App\Http\Controllers;
use DB;
use App\adelanto;
class ControllerAdelanto extends Controller
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
                ->paginate(7);
            return view('empleado.index',["empleados"=>$empleados,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adelantos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        $adelantos = new adelanto;

        $v = \Validator::make($request->all(), [

            'descripcion' => 'required',
            'fecha' => 'required',
            'monto'    => 'required'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput($request->except('idadelanto'))->withErrors($v->errors());
        }

        $adelantos->create($request->all());
        $adelantos = adelanto::all();
        return Redirect::to('adelantos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('adelantos.show',["adelantos"=>adelantos::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adelantos.edit',["adelantos"=>adelanto::findOrFail($id)]);
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
        $adelantos=adelanto::findOrFail($id);
        $adelantos->fill($request->all());
        // $clientes->nombre=$request->get('nombre');
    // $clientes->apellido=$request->get('apelliddo');
    // $clientes->ci=$request->get('ci');
    // $clientes->direccion=$request->get('direccion');
    // $clientes->telefono=$request->get('telefono');
    $adelantos->update();
    return Redirect::to('adelantos');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adelanto=adelanto::findOrFail($id);
        $adelanto->update();
        return Redirect::to('adelantos');
    }
}
