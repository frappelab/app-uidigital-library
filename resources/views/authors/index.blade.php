@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-24">
                <h2>Autores</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th width="150px">Acciones</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->lastname }}</td>
                <td>
                    <form class="flex" action="{{ route('authors.destroy', $author->id) }}" method="POST">
                        <a class="btn-action" href="{{ route('authors.show', $author->id) }}"><span
                                class="btn-action--view"></span></a>

                        <a class="btn-action" href="{{ route('authors.edit', $author->id) }}"><span
                                class="btn-action--edit"></span></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action"><span class="btn-action--delete"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="pull-right">
        <a class="btn btn-ui-primary" href="{{ route('authors.create') }}">Crear autor</a>
    </div>

    {!! $authors->links() !!}
@endsection
