@extends('layout.master')

@section('page-title', 'Company Information')

@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <b style="color:cornflowerblue">Supplier & Clint Information</b>
        </div>
        <div class="card-body">
            <form action="{{ route('c&s.update', $company->company_code) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Input Fields -->
                <div class="form-group">
                    <label for="DRCR_CODE">DRCR Code</label>
                    <input type="text" name="DRCR_CODE" class="form-control @error('DRCR_CODE') is-invalid @enderror" placeholder="Enter DRCR Code" value="{{ old('DRCR_CODE', $company->drcr_code) }}">
                    @error('DRCR_CODE')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="DRCR_NAME">DRCR Name</label>
                    <input type="text" name="DRCR_NAME" class="form-control @error('DRCR_NAME') is-invalid @enderror" placeholder="Enter DRCR Name" value="{{ old('DRCR_NAME', $company->drcr_name) }}">
                    @error('DRCR_NAME')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="DRCR_FLAG">DRCR Flag</label>
                    <input type="text" name="DRCR_FLAG" class="form-control @error('DRCR_FLAG') is-invalid @enderror" placeholder="Enter DRCR Flag" value="{{ old('DRCR_FLAG', $company->drcr_flag) }}">
                    @error('DRCR_FLAG')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="SHORT_NAME">Short Name</label>
                    <input type="text" name="SHORT_NAME" class="form-control @error('SHORT_NAME') is-invalid @enderror" placeholder="Enter Short Name" value="{{ old('SHORT_NAME', $company->short_name) }}">
                    @error('SHORT_NAME')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="BUSINESS_NATURE">Business Nature</label>
                    <input type="text" name="BUSINESS_NATURE" class="form-control @error('BUSINESS_NATURE') is-invalid @enderror" placeholder="Enter Business Nature" value="{{ old('BUSINESS_NATURE', $company->business_nature) }}">
                    @error('BUSINESS_NATURE')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="CONTACT_PERSON">Contact Person</label>
                    <input type="text" name="CONTACT_PERSON" class="form-control @error('CONTACT_PERSON') is-invalid @enderror" placeholder="Enter Contact Person" value="{{ old('CONTACT_PERSON', $company->contact_person) }}">
                    @error('CONTACT_PERSON')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="GROUP_TYPE">Group Type</label>
                    <input type="text" name="GROUP_TYPE" class="form-control @error('GROUP_TYPE') is-invalid @enderror" placeholder="Enter Group Type" value="{{ old('GROUP_TYPE', $company->group_type) }}">
                    @error('GROUP_TYPE')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="CTRL_FLAG">Control Flag</label>
                    <input type="text" name="CTRL_FLAG" class="form-control @error('CTRL_FLAG') is-invalid @enderror" placeholder="Enter Control Flag" value="{{ old('CTRL_FLAG', $company->ctrl_flag) }}">
                    @error('CTRL_FLAG')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="DRCR_STATUS">DRCR Status</label>
                    <input type="text" name="DRCR_STATUS" class="form-control @error('DRCR_STATUS') is-invalid @enderror" placeholder="Enter DRCR Status" value="{{ old('DRCR_STATUS', $company->drcr_status) }}">
                    @error('DRCR_STATUS')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="REF_DRCR_CODE">Reference DRCR Code</label>
                    <input type="text" name="REF_DRCR_CODE" class="form-control @error('REF_DRCR_CODE') is-invalid @enderror" placeholder="Enter Reference DRCR Code" value="{{ old('REF_DRCR_CODE', $company->ref_drcr_code) }}">
                    @error('REF_DRCR_CODE')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="FUTURE_ONE">Future One</label>
                    <input type="text" name="FUTURE_ONE" class="form-control @error('FUTURE_ONE') is-invalid @enderror" placeholder="Enter Future One" value="{{ old('FUTURE_ONE', $company->future_one) }}">
                    @error('FUTURE_ONE')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="FUTURE_TWO">Future Two</label>
                    <input type="text" name="FUTURE_TWO" class="form-control @error('FUTURE_TWO') is-invalid @enderror" placeholder="Enter Future Two" value="{{ old('FUTURE_TWO', $company->future_two) }}">
                    @error('FUTURE_TWO')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="FUTURE_THREE">Future Three</label>
                    <input type="date" name="FUTURE_THREE" class="form-control @error('FUTURE_THREE') is-invalid @enderror" placeholder="Enter Future Three" value="{{ old('FUTURE_THREE', $company->future_three) }}">
                    @error('FUTURE_THREE')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="USER_ID">User ID</label>
                    <input type="text" name="USER_ID" class="form-control @error('USER_ID') is-invalid @enderror" placeholder="Enter User ID" value="{{ old('USER_ID', $company->user_id) }}">
                    @error('USER_ID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="ENTER_DATE">Enter Date</label>
                    <input type="date" name="ENTER_DATE" class="form-control @error('ENTER_DATE') is-invalid @enderror" placeholder="Enter Date" value="{{ old('ENTER_DATE', $company->enter_date) }}">
                    @error('ENTER_DATE')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="LAST_UPDATE">Last Update</label>
                    <input type="text" name="LAST_UPDATE" class="form-control @error('LAST_UPDATE') is-invalid @enderror" placeholder="Enter Last Update" value="{{ old('LAST_UPDATE', $company->last_update) }}">
                    @error('LAST_UPDATE')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="FUTURE_FOUR">Future Four</label>
                    <input type="text" name="FUTURE_FOUR" class="form-control @error('FUTURE_FOUR') is-invalid @enderror" placeholder="Enter Future Four" value="{{ old('FUTURE_FOUR', $company->future_four) }}">
                    @error('FUTURE_FOUR')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Form Submit Button -->
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('c&s.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
