@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-24">
                <h2>Libros</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered ">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>ISBN</th>
            <th>Editorial</th>
            <th>No Páginas</th>
            <th>Autor</th>
            <th>Stock</th>
            <th width="150px">Acciones</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->editorial->name }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->author->name }} {{ $book->author->lastname }}</td>
                <td>
                    @if ($book->stock[0]->total == 0)
                        <label class="badge text-bg-primary">Sin Stock</label>
                    @elseif($book->stock[0]->total > 0)
                        <label class="badge text-bg-success">{{ $book->stock[0]->total }}</label>
                    @endif
                </td>
                <td class="flex">
                    @if ($book->stock[0]->total > 0)
                        <a class="btn-action" data-bs-toggle="modal" data-bs-target="#lend{{ $book->id }}"><span
                                class="btn-action--book-share"></span></a>
                    @endif

                    <form class="flex" action="{{ route('books.destroy', $book->id) }}" method="POST">
                        <a class="btn-action" href="{{ route('books.show', $book->id) }}"><span
                                class="btn-action--view"></span></a>

                        <a class="btn-action" href="{{ route('books.edit', $book->id) }}"><span
                                class="btn-action--edit"></span></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action"><span class="btn-action--delete"></span></button>
                    </form>
                </td>
            </tr>
            @include('partials.modal')
        @endforeach
    </table>
    <div class="pull-right mb-24">
        <a class="btn btn-ui-primary" href="{{ route('books.create') }}">Crear libro</a>
    </div>
    {!! $books->links() !!}
@endsection
