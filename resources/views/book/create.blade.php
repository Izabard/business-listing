@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listing</div>

                    <div class="card-body">
                        <div>
                            <div>
                                <a href="/home">
                                    Go back...
                                </a>
                            </div>

                            <form method="POST" action="{{ route('book.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="title"
                                               class="form-control @error('title') is-invalid @enderror" name="title"
                                               value="{{ old('title') }}" autocomplete="title" autofocus>

                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="author" class="col-md-4 col-form-label text-md-right">author</label>

                                    <div class="col-md-6">
                                        <input id="author" type="author"
                                               class="form-control @error('author') is-invalid @enderror" name="author"
                                               value="{{ old('author') }}" autocomplete="author" autofocus>

                                        @error('author')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
