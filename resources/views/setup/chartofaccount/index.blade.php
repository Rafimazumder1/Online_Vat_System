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

                            <td>
                                <a href="{{ route('edit.chart', $chart->accode) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('delete.chart', $chart->accode) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
