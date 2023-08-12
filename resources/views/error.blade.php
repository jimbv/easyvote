@extends('plantilla.plantilla')
@section('titulo','Easy Vote | Results')

@section('contenido') 
<h1 style="color:white;">  
	Error:<i> {{ $error }}</i> 
</h1>
         
<a href="/">
    <button type="submit" class="submit" style="background:#223353;margin-top:10px;">Volver</button>
</a>
@endsection