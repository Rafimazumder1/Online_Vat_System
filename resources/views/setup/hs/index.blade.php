@extends('layout.master')

@section('page-title', 'UOM Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header text-center">
                <p class="text-muted">HS Code Information</p>
            </div>
            <div class="card-body">
                <form action="{{ route('create.hs') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="formContainer">
                    <div class="row mb-3 form-row">
                        <div class="col-md-3">
                            <label for="hsCode" class="form-label">HS Code</label>
                            <input type="text" class="form-control" name="hs_code" value="{{ old('hs_code') }}"required>
                        </div>
                        <div class="col-md-5">
                            <label for="description" class="form-label">Descriotion</label>
                            <input type="text" name="description" class="form-control" value="" required>
                        </div>
                        <div class="col-md-2">
                            <label for="vds" class="form-label">VDS</label>
                            <select name="vds[]" class="form-control" required>
                                <option value="N">No</option>
                                <option value="Y">Yes</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="exd" class="form-label">EXD</label>
                            <select name="exd[]" class="form-control" required>
                                <option value="N">No</option>
                                <option value="Y">Yes</option>
                            </select>
                        </div>

                        {{-- ----- Master end --}}

                            <div class="row mb-3 form-row">
                                <div class="col-md-4">
                                    <label for="chargeDescription" class="form-label">Charge Description</label>
                                    <select name="charge_description[]" class="form-control" required>
                                        <option value="">Select Charge Description</option>
                                        @foreach($charts as $chart)
                                            <option value="{{ $chart->acname }}">{{ $chart->acname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="costType" class="form-label">Cost Type</label>
                                    <select name="cost_type[]" class="form-control" required>
                                        <option value="P">Percentage(%)</option>
                                        <option value="F">Fixed</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="rate" class="form-label">Rate</label>
                                    <input type="number" step="0.01" name="rate[]" class="form-control" value=""
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="controlHead" class="form-label">Control Head</label>
                                    <select name="control_head[]" class="form-control" required>
                                        <option value="">Select Control Head</option>
                                        @foreach($charts as $chart)
                                            <option value="{{ $chart->accode }}">{{ $chart->acname }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                    <div class="col-md-4">

                                    <select name="charge_description[]" class="form-control" required>
                                        <option value="">Select Charge Description</option>
                                        @foreach($charts as $chart)
                                            <option value="{{ $chart->acname }}">{{ $chart->acname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="col-md-2">

                                <select name="cost_type[]" class="form-control" required>
                                    <option value="P">Percentage(%)</option>
                                    <option value="F">Fixed</option>
                                </select>
                            </div>

                            <div class="col-md-2">

                                <input type="number" step="0.01" name="rate[]" class="form-control" value="" required>
                            </div>

                             <div class="col-md-4">

                                    <select name="control_head[]" class="form-control" required>
                                        <option value="">Select Control Head</option>
                                        @foreach($charts as $chart)
                                            <option value="{{ $chart->accode }}">{{ $chart->acname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                 </div>



                `;

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
