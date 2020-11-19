@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listing</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div>
                            @can('create')
                                <div>
                                    <a class="btn btn-outline-primary" href="{{ route('book.create') }}">
                                        Add new...
                                    </a>
                                </div>
                            @endcan
                            <br>
                            <table class="table table-bordered table-striped">
                                @if(count($books) > 0)
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Created</th>
                                        @if(in_array(auth()->user()->role_id, [1,2]))
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->created_at->format('m/d/y') }}</td>
                                            @if(in_array(auth()->user()->role_id, [1,2]))
                                                <td style="display: flex;">
                                                    <div style="margin-right: 3px;">
                                                        @can('edit')
                                                            <a class="btn btn-outline-success" href="{{ route('book.edit', $book->id) }}">edit</a>
                                                        @endcan
                                                    </div>
                                                    <div style="margin-left: 3px;">
                                                        @can('delete')
                                                            <form method="POST" action="{{ route('book.destroy', $book->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-outline-danger" type="submit">delete</button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @else
                                    <p>No books :(</p>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
