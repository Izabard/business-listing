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

                    <div>
                        @can('create')
                            <div>
                                <button>
                                    Add new...
                                </button>
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
                                            <td>
                                                @can('edit')
                                                    <button>edit</button>
                                                @endcan
                                                @can('delete')
                                                    <button>delete</button>
                                                @endcan
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
