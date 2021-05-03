@extends('layouts.app')
@section('title','Agenda De Eventos')
@section('content')

<div class="container mt-3">
   {{-- @if (session('mensaje'))
   <div class="alert alert-success">
      <p>{{session('mensaje')}}</p>
</div>
@endif --}}
<div id="agenda"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Ingrese Eleccion o Consulta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">Cerrar <i class="fas fa-times"></i></span>
            </button>
         </div>

         <form id="formularioEventos" class="needs-validation" {{-- action="{{url('eventos/agregar')}}" method="post" --}}
            novalidate>
            @csrf
            <div class="modal-body">
               <div class="form-group d-none">
                  <label for="id ">ID</label>
                  <input type="text" name="id" id="id " class="form-control" placeholder="ID" aria-describedby="helpId">
               </div>
               <div class="form-group">
                  <label for="title ">Título</label>
                  <input type="text" name="title" id="title " class="form-control {{-- @error('title') is-invalid @enderror --}}"
                     placeholder="Título" aria-describedby="helpId" required value="{{old('title')}}">
                  {{-- @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror --}}
               <div class="invalid-feedback"> Digité un título al evento </div>
            </div>

            <div class="form-group">
               <label for="descripcion">Descripción</label>
               <textarea class="form-control" name="descripcion" placeholder="Descripción" id="descripcion" rows="3"
                  required></textarea>
               <div class="invalid-feedback"> Digité una descripción del evento </div>
            </div>

            <div class="form-group">
               <label for="start">Fecha Inicial</label>
               <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId"
                  placeholder="Fecha Incicio">
               <div class="invalid-feedback">
                  Fecha No Valida
               </div>
            </div>
            <div class="form-group">
               <label for="end">Fecha Final</label>
               <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="Fecha Final">
               <div class="invalid-feedback">
                  Fecha No Valida
               </div>
            </div>
      </div>

      <div class="modal-footer">
         <button type="button" class="btn btn-success" id="btnGuardar">
            <i class="icon far fa-save"></i>Guardar
         </button>
         <button type="button" class="btn btn-warning" id="btnModificar"> <i class="icon fas fa-file-medical-alt"></i>Modificar
         </button>
         <button type="button" class="btn btn-danger" id="btnEliminar"> <i class="icon far fa-trash-alt"></i>Eliminar
         </button>
         {{--  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon fas fa-times"></i>Cerrar
         </button> --}}
      </div>
      </form>
   </div>
</div>
</div>
@endsection
