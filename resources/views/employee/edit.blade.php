@extends('template.layout')

@section('content')
<form action="/employees/{{ $employee->id }}" method="post">
    @method('put')
    @csrf
    <h3 class="mb-4">Edit Employee</h3>
    <div class="d-flex justify-content-between">
        <div class="mb-3 flex-fill">
            <label for="first_nm" class="form-label">First Name</label>
            <input type="text" name="first_nm" id="first_nm" class="form-control border border-dark @error('first_nm') is-invalid @enderror" value="{{ old('first_nm', $employee->first_nm) }}" required />
            @error('first_nm')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-3 flex-fill ms-3">
            <label for="last_nm" class="form-label">Last Name</label>
            <input type="text" name="last_nm" id="last_nm" class="form-control border border-dark @error('last_nm') is-invalid @enderror" value="{{ old('last_nm', $employee->last_nm) }}" required />
            @error('last_nm')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>
    </div>

    <div class="mb-3 flex-fill">
        <label for="company_id" class="form-label">Company</label>
        <select class="form-select border border-dark @error('company_id') is-invalid @enderror" name="company_id" id="company_id" >
          <option value="" selected>Open this select menu</option>
          @foreach ($companies as $company)
                @if ($company->id === old('company_id', $employee->id)) 
                    <option value="{{ $company['id'] }}" selected>{{ $company['name'] }}</option>
                @endif
                <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
          @endforeach
        </select>
        @error('company_id')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3 flex-fill">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control border border-dark @error('email') is-invalid @enderror" value="{{ old('email', $employee->email) }}" />
        @error('email')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 flex-fill">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control border border-dark @error('phone') is-invalid @enderror" value="{{ old('phone', $employee->phone) }}" />
        @error('phone')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection