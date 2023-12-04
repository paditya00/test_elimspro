@extends('template.layout')

@section('content')
    @if (session()->has('success'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/employees/create" class="btn btn-primary mb-3">New Employee</a>

    <table id="example" class="display wrap">
        <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->first_nm }} {{ $employee->last_nm }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->created_at }}</td>
                    <td>{{ $employee->updated_at }}</td>
                    <td>
                        <a href="/employees/{{ $employee->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square text-decoration-none"></i></a>
                        <form action="/employees/{{ $employee->id }}" method="post" class="d-inline border-0">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus {{ $employee->first_nm }}?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection