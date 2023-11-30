@extends('base')

@include('navbar')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Edit Car') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cars.update', $car->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $car->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" name="model" id="model" value="{{ $car->model }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $car->description }}" required>
                        </div>
                        <div class="form-group">
                            <label for="release_date">Release Date</label>
                            <input type="date" class="form-control" name="release_date" id="release_date" value="{{ $car->release_date }}" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('cars.index') }}" class="btn btn-secondary mt-2 me-2">Cancel</a>
                            <button type="submit" class="btn btn-success mt-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
