@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar categoria</h2>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Revisa algunos campos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12  mb-16">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="name" value="{{ $author->name }}" class="form-control"
                        placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-16">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="lastname" value="{{ $author->lastname }}" class="form-control"
                        placeholder="Apellidos">
                </div>
            </div>
            <div class="flex">
                <a class="btn btn-ui-secundary" href="{{ route('authors.index') }}"> Volver</a>
                <button type="submit" class="btn btn-ui-primary">Actualizar</button>
            </div>
        </div>


    </form>
@endsection
