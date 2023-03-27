@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Libro</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card-dashboard card-dashboard--auto mb-16">
            <div class="card-dashboard__show">
                <img class="card-dashboard__show__cover" src={{ $book->cover }} alt={{ $book->id }}>
                <div class="card-dashboard__show__fields">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Código:</strong>
                            {{ $book->id }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Título:</strong>
                            {{ $book->title }}
                        </div>
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Caratula:</strong>
                            {{ $book->cover }}
                        </div>
                    </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>ISBN:</strong>
                            {{ $book->isbn }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>No páginas:</strong>
                            {{ $book->pages }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Autor:</strong>
                            {{ $book->author->name }} {{ $book->author->lastname }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Editorial:</strong>
                            {{ $book->editorial->name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-ui-secundary" href="{{ route('books.index') }}">Volver</a>
    </div>
    </div>
@endsection
