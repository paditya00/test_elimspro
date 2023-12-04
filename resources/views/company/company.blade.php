@extends('template.layout')

@section('content')
    @if (session()->has('success'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/companies/create" class="btn btn-primary mb-3">New Company</a>

    <table id="example" class="display wrap">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->created_at }}</td>
                    <td>{{ $company->updated_at }}</td>
                    <td>
                        <a href="/companies/{{ $company->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square text-decoration-none"></i></a>
                        <form action="/companies/{{ $company->id }}" method="post" class="d-inline border-0">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus {{ $company->name }}?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
