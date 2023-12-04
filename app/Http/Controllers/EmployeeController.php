<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.employee', [
            "employees" => Employee::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create', [
            "companies" => Company::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validates = $request->validate([
            'first_nm' => 'required',
            'last_nm' => 'required',
            'company_id' => 'nullable',
            'email' => 'unique:employees|email',
            'phone' => 'unique:employees|min:11|max:13|regex:/^[0-9+]+$/'
        ]);

        Employee::create($validates);
        return redirect('/employees')->with('success', $request['first_nm'].' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            "employee" => $employee,
            "companies" => Company::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $rule = [
            'first_nm' => 'required',
            'last_nm' => 'required',
            'company_id' => 'nullable'
        ];

        if ($request->email != $employee->email) {
            $rule['email'] = 'unique:employees|email';
        }

        if ($request->phone != $employee->phone) {
            $rule['phone'] = 'unique:employees|min:11|max:13|regex:/^[0-9+]+$/';
        }

        $validates = $request->validate($rule);

        Employee::where('id', $employee->id)
            ->update($validates);
        return redirect('/employees')->with('success', $employee->first_nm.' berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        return redirect('/employees')->with('success', $employee->first_nm.' berhasil dihapus!');
    }
}
