@extends('app')

@section('contenido')
    @foreach ($imagenes as $img)
        <div style="height: 200px; width: 200px">
            <img src="{{ $img->imagen_url }}" alt="img">
            
        </div>
    @endforeach
@endsection
