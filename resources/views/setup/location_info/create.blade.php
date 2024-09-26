
@extends('layout.master')

@section('page-title', 'Company Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header text-center">

                <h4 class="text-muted">Location Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('com.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="formContainer">
                        <div class="row mb-3 form-row">
                            <div class="col-md-3">
                                <label for="slNo" class="form-label">Store Name</label>
                                <input type="text" class="form-control storeName" id="storeName" name="storeName[]" value="" placeholder="Enter Store Name">
                            </div>
                            <div class="col-md-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control address" id="address" name="address[]" value="" placeholder="Enter Address">
                            </div>
                            <div class="col-md-3">
                                <label for="storeType" class="form-label">Store Type</label>
                                <input type="text" class="form-control storeType" id="storeType" name="storeType[]" value="" placeholder="Enter Store Type">
                            </div>
                            <div class="col-md-3">
                                <label for="remark" class="form-label">Remark</label>
                                <input type="text" class="form-control remark" id="remark" name="remark[]" value="" placeholder="Enter Remark">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons to add and remove fields -->
                    <div>
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <button type="button" id="addButton" class="btn btn-outline-primary">Add Store</button>
                        <button type="button" id="removeButton" class="btn btn-outline-danger">Remove Store</button>
                        <button type="button" class="btn btn-outline-secondary">Exit</button>
                    </div>

                    <!-- Scripts for dynamic form fields -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            // Function to add a new field under each existing field
                            $('#addButton').click(function() {
                                // Add new input field under 'Store Name'
                                $('<input type="text" class="form-control storeName mt-2" name="storeName[]" placeholder="Enter Store Name">').insertAfter('.storeName:last');

                                // Add new input field under 'Address'
                                $('<input type="text" class="form-control address mt-2" name="address[]" placeholder="Enter Address">').insertAfter('.address:last');

                                // Add new input field under 'Store Type'
                                $('<input type="text" class="form-control storeType mt-2" name="storeType[]" placeholder="Enter Store Type">').insertAfter('.storeType:last');

                                // Add new input field under 'Remark'
                                $('<input type="text" class="form-control remark mt-2" name="remark[]" placeholder="Enter Remark">').insertAfter('.remark:last');
                            });

                            // Function to remove the last set of fields
                            $('#removeButton').click(function() {
                                if ($('.storeName').length > 1) {
                                    $('.storeName:last').remove(); // Remove the last 'Store Name' field
                                    $('.address:last').remove();   // Remove the last 'Address' field
                                    $('.storeType:last').remove(); // Remove the last 'Store Type' field
                                    $('.remark:last').remove();    // Remove the last 'Remark' field
                                }
                            });
                        });
                    </script>
                </form>
            </div>
        </div>
    </div>
@endsection
