<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Carbon\Carbon;

class EventoController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return view('evento.index');
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
      //
      request()->validate(Evento::$rules);
      $evento = Evento::create($request->all());



      return back()->with('mensaje', 'Tu Tarea ha sido agregada al calendario');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Evento  $evento
    * @return \Illuminate\Http\Response
    */
   public function show(Evento $evento)
   {
      //
      $evento = Evento::all();
      return response()->json($evento);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Evento  $evento
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
      $evento = Evento::find($id);

      $evento->descripcion = Str::of($evento->descripcion)->upper();
      $evento->title = Str::of($evento->title)->upper();
      $evento->start = Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d');
      $evento->end = Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d');

      return response()->json($evento);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Evento  $evento
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Evento $evento)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Evento  $evento
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
      $evento = Evento::find($id)->delete();
      return response()->json($evento);
   }
}
