@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Biblioteca</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @php
                                    use App\Models\Book;
                                    $all_books = Book::all();
                                @endphp

                                @foreach ($all_books as $book)
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card-dashboard card-dashboard--auto mb-16">
                                            <div class="card-dashboard__show">
                                                <img class="card-dashboard__show__cover" src={{ $book->cover }}
                                                    alt={{ $book->id }}>
                                                <div class="card-dashboard__show__fields">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group ellipse">
                                                            <strong>Título:</strong>
                                                            {{ $book->title }}
                                                        </div>
                                                    </div>
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @php
                            use App\Models\Book;
                            $cant_users = Book::all();
                        @endphp
                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $cant_users }}</span></h2>
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
