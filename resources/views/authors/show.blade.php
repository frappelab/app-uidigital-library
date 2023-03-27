@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Autor</h2>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="card-dashboard card-dashboard--auto mb-16">
            <div class="card-dashboard__show">
                <div class="card-dashboard__show__img card-dashboard__show__img--category"></div>
                <div class="card-dashboard__show__fields">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Código:</strong>
                            {{ $author->id }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $author->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $author->lastname }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-ui-secundary" href="{{ route('authors.index') }}">Volver</a>
    </div>
    </div>
@endsection
