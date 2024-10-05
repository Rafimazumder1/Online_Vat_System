@extends('layout.master')

@section('page-title', 'Edit Chart of Account')

@section('content')
    <div class="container">
        <h2>Edit Chart of Account</h2>

        <form action="{{ route('update.chart', $chart->accode) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-10 p-4">
                    <label for="ACNAME" class="form-label">Account Name</label>
                    <input type="text" class="form-control" id="acname" name="acname" value="{{ $chart->acname }}" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Account</button>
                {{-- <a href="{{ route('your_route_name') }}" class="btn btn-secondary">Cancel</a> --}}
            </div>
        </form>
    </div>
@endsection
