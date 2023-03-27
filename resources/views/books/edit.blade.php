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


    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12  mb-16">
                <div class="form-group">
                    <strong>Título:</strong>
                    <input type="text" name="title" value="{{ $book->title }}" class="form-control"
                        placeholder="Título">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-16">
                <div class="form-group">
                    <strong>Autor:</strong>
                    <select class="form-control" name="author_id" id="author_id">
                        @foreach ($authors as $author)
                            <option value={{ $author->id }}
                                {{ $book->author_id == $author->id ? 'selected="selected' : '' }}>{{ $author->name }}
                                {{ $author->lastname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12  mb-16">
                <div class="form-group">
                    <strong>Caratula:</strong>
                    <input type="text" name="cover" value="{{ $book->cover }}" class="form-control"
                        placeholder="url caratula">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12  mb-16">
                <div class="form-group">
                    <strong>ISBN:</strong>
                    <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control"
                        placeholder="ISBN">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-16">
                <div class="form-group">
                    <strong>No Páginas:</strong>
                    <input type="text" name="pages" value="{{ $book->pages }}" class="form-control"
                        placeholder="No páginas">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-16">
                <div class="form-group">
                    <strong>Editorial:</strong>
                    <select class="form-control" name="editorial_id" id="editorial_id">
                        @foreach ($editorials as $editorial)
                            <option value={{ $editorial->id }}
                                {{ $book->editorial_id == $editorial->id ? 'selected="selected' : '' }}>
                                {{ $editorial->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex">
                <a class="btn btn-ui-secundary" href="{{ route('books.index') }}"> Volver</a>
                <button type="submit" class="btn btn-ui-primary">Actualizar</button>
            </div>
        </div>


    </form>
@endsection
