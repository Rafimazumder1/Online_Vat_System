@extends('layout.master')

@section('page-title', 'Edit Item Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header text-center">
                <p class="text-muted">Edit Item Information</p>
            </div>
            <div class="card-body">
                {{-- Edit form for the item --}}
                <form action="{{ route('update.item', $item->item_code) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="formContainer">
                        <div class="row mb-3 form-row">
                            <div class="col-md-4">
                                <label for="itemdescription" class="form-label">Item Description</label>
                                <input type="text" name="ITEM_NAME" class="form-control" value="{{ $item->item_name }}" required>
                            </div>

                            <div class="col-md-2">
                                <label for="categorygrade" class="form-label">Category</label>
                                <input type="text" name="CAT_CODE" class="form-control" value="{{ $item->cat_code }}" required>
                            </div>

                            <div class="col-md-2">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" name="TYPE_CODE" class="form-control" value="{{ $item->type_code }}" required>
                            </div>

                            <div class="col-md-2">
                                <label for="accountshead" class="form-label">Accounts Head</label>
                                <select name="ACCODE" class="form-control" required>
                                    <option value="">Select an Account Head</option>
                                    @foreach($chart as $cao)
                                        <option value="{{ $cao->accode }}" {{ $cao->accode == $item->accode ? 'selected' : '' }}>
                                            {{ $cao->accode }} - {{ $cao->acname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="hscode" class="form-label">Hs Code</label>
                                <input type="text" name="HS_CODE" class="form-control" value="{{ $item->hs_code }}" required>
                            </div>

                            <div class="col-md-2">
                                <label for="primaryconfactor" class="form-label">Primary Confactor</label>
                                <input type="text" name="PCONV_FACTOR" class="form-control" value="{{ $item->pconv_factor }}" required>
                            </div>

                            <div class="col-md-2">
                                <label for="uom" class="form-label">Primary UOM</label>
                                <select name="PITEM_UOM" class="form-control" required>
                                    <option value="">Select a UOM</option>
                                    @foreach($itemsuom as $uom)
                                        <option value="{{ $uom->uom_slno }}" {{ $uom->uom_slno == $item->pitem_uom ? 'selected' : '' }}>
                                            {{ $uom->uom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="secondaryconfactor" class="form-label">Secondary Confactor</label>
                                <input type="text" name="SCONV_FACTOR" class="form-control" value="{{ $item->sconv_factor }}" required>
                            </div>

                            <div class="col-md-2">
                                <label for="secondaryuom" class="form-label">Secondary UOM</label>
                                <select name="SITEM_UOM" class="form-control" required>
                                    <option value="">Select a UOM</option>
                                    @foreach($itemsuom as $uom)
                                        <option value="{{ $uom->uom_slno }}" {{ $uom->uom_slno == $item->sitem_uom ? 'selected' : '' }}>
                                            {{ $uom->uom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('create.item.form') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
