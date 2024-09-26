@extends('layout.master')

@section('page-title', 'Edit UOM Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header text-center">
                <h4>IT Bangla Ltd.</h4>
                <p class="text-muted">Edit UOM Information</p>
            </div>
            <div class="card-body">
                <form action="{{ route('uom.update', $uominfo->uom_slno) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="formContainer">
                        <div class="row mb-3 form-row">
                            <div class="col-md-2">
                                <label for="slNo" class="form-label">Sl No.</label>
                                <input type="text" class="form-control" name="uom_slno" value="{{ $uominfo->uom_slno }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="uom" class="form-label">UOM</label>
                                <input type="text" name="uom" class="form-control" value="{{ $uominfo->uom }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ $uominfo->uom_desc }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('uom.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
