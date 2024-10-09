@extends('layout.master')

@section('page-title', 'UOM Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header text-center">
                <p class="text-muted">Item Information</p>
            </div>
            <div class="card-body">
                <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="formContainer">
                        <div class="row mb-3 form-row">

                            <div class="col-md-4">
                                <label for="itemdescription" class="form-label">Item Description</label>
                                <input type="text" name="ITEM_NAME" class="form-control" value="" required>
                            </div>

                            <div class="col-md-2">
                                <label for="categorygrade" class="form-label">Category</label>
                                <input type="text" name="CAT_CODE" class="form-control" value="" required>
                            </div>

                            <div class="col-md-2">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" name="TYPE_CODE" class="form-control" value="" required>
                            </div>

                            <div class="col-md-2">
                                <label for="accountshead" class="form-label">Accounts Head</label>
                                <select name="ACCODE" class="form-control" required>
                                    <option value="">Select a UOM</option>
                                    @foreach($chart as $cao)
                                        <option value="{{ $cao->accode }}">{{ $cao->accode }} - {{ $cao->acname }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="hscode" class="form-label">Hs Code</label>
                                <input type="text" name="HS_CODE" class="form-control" value="" required>
                            </div>

                            <div class="col-md-2">
                                <label for="secondaryconfactor" class="form-label">Primary Confactor</label>
                                <input type="text" name="PCONV_FACTOR" class="form-control" value=""
                                    required>
                            </div>

                            <div class="col-md-2">
                                <label for="uom" class="form-label">Primary UOM</label>
                                <select name="PITEM_UOM" class="form-control" required>
                                    <option value="">Select a UOM</option>
                                    @foreach($itemsuom as $uom)
                                        <option value="{{ $uom->uom_slno }}">{{ $uom->uom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="secondaryconfactor" class="form-label">Secondary Confactor</label>
                                <input type="text" name="SCONV_FACTOR" class="form-control" value=""
                                    required>
                            </div>

                            <div class="col-md-2">
                                <label for="secondaryuom" class="form-label">Secondary UOM</label>
                                <select name="SITEM_UOM" class="form-control" required>
                                    <option value="">Select a UOM</option>
                                    @foreach($itemsuom as $uom)
                                        <option value="{{ $uom->uom_slno }}">{{ $uom->uom }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary">Exit</button>
                        </div>
                </form>
                <div class="mt-4">
                    <h5 class="text-muted">Items List</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item Description</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Accounts Head</th>
                                <th>Hs Code</th>
                                <th>Primary Confactor</th>
                                <th>Primary UOM</th>
                                <th>Secondary Confactor</th>
                                <th>Secondary UOM</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            {{-- {{ dd($item) }} --}}
                                <tr>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->cat_code }}</td>
                                    <td>{{ $item->type_code }}</td>
                                    <td>{{ $item->accode }}</td>
                                    <td>{{ $item->hs_code }}</td>
                                    <td>{{ $item->pconv_factor }}</td>
                                    <td>{{ $item->primaryUom->uom ?? '' }}</td>
                                    <td>{{ $item->sconv_factor }}</td>
                                    <td>{{ $item->secondaryUom->uom ?? '' }}</td>
                                    {{-- <td>
                                    <a href="{{ route('edit.items', $item->item_code) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('edit.items', $item->item_code) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('delete.item', $item->item_code) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
