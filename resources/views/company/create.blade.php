@extends('template.layout')

@section('content')
<form action="/companies" method="post">
    @csrf
    <h3 class="mb-4">Register New Company</h3>
    <div class="mb-3 flex-fill">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control border border-dark @error('name') is-invalid @enderror" value="{{ old('name') }}" required />
        @error('name')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="mb-3 flex-fill">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control border border-dark @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
        @error('email')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 flex-fill">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" id="address" class="form-control border border-dark" />
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection