@extends('layout.master')

@section('page-title', 'UOM Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>IT Bangla Ltd.</h4>
                <p class="text-muted">UOM Information</p>
            </div>
            <div class="card-body">
                <form action="{{ route('uom.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="formContainer">
                        <div class="row mb-3 form-row">
                            <div class="col-md-2">
                                <label for="slNo" class="form-label">Sl No.</label>
                                <input type="text" class="form-control" name="uom_slno[]" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="uom" class="form-label">UOM</label>
                                <input type="text" name="uom[]" class="form-control" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description[]" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>
                    <!-- Button to add new fields -->
                    <div class="d-flex justify-content-between mb-3">
                        <button type="button" id="addButton" class="btn btn-outline-primary">Add UOM</button>
                        <button type="button" id="removeButton" class="btn btn-outline-danger">Remove UOM</button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary">Exit</button>
                    </div>
                </form>

                <!-- UOM Table -->
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>UOM</th>
                                <th>Description</th>
                                <th>Actions</th> <!-- New column for Edit/Delete -->
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($uomData) && count($uomData) > 0)
                                @foreach($uomData as $uom)
                                    <tr>
                                        <td>{{ $uom->uom_slno }}</td>
                                        <td>{{ $uom->uom }}</td>
                                        <td>{{ $uom->uom_desc  }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('uom.edit', $uom->uom_slno) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <!-- Delete Button with confirmation -->
                                            <form action="{{ route('uom.destroy', $uom->uom_slno) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this UOM?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">No UOM data found.</td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (optional, but useful for this example) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to add new row
            $('#addButton').click(function() {
                // Create new row HTML
                let newRow = `
                <div class="row mb-3 form-row">
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="uom_slno[]" value="">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="uom[]" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="description[]" class="form-control" value="" required>
                    </div>
                </div>`;

                // Append the new row to the form container
                $('#formContainer').append(newRow);
            });

            // Function to remove the last row (except the first one)
            $('#removeButton').click(function() {
                let rows = $('#formContainer .form-row');
                if (rows.length > 1) {
                    rows.last().remove(); // Remove the last form row
                }
            });
        });
    </script>
@endsection
