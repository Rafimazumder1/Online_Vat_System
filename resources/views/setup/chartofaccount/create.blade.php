@extends('layout.master')

@section('page-title', 'Welcome')

@section('content')
    <!-- Form to Create a New Chart of Account -->
    <form action="{{ route('create.chart') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-10 p-4">
                <label for="ACNAME" class="form-label">Chart Of Account</label>
                <input type="text" class="form-control" id="acname" name="acname" required>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Create Account</button>
        </div>
    </form>

    <!-- Table to Display Existing Chart of Accounts -->
    <div class="mt-4">
        <h2>Existing Chart of Accounts</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Account Code</th>
                    <th>Account Name</th>
                </tr>
            </thead>
            <tbody>
                @if($charts->isEmpty())
                    <tr>
                        <td colspan="2">No data available.</td>
                    </tr>
                @else
                    @foreach ($charts as $chart)
                        <tr>
                            <td>{{ $chart->accode }}</td>
                            <td>{{ $chart->acname }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
