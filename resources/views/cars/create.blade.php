@extends('base')

@include('navbar')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Create Car') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cars.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="model">Model:</label>
                            <input type="text" name="model" id="model" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" name="description" id="description" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="release_date">Release Date:</label>
                            <input type="date" name="release_date" id="release_date" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('cars.index') }}" class="btn btn-secondary mt-2 me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary mt-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
