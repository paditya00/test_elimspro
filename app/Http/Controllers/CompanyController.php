<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('company.company', [
            "companies" => Company::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd(request());
        $validates = $request->validate([
            'name' => 'required',
            'email' => 'unique:companies|email',
            'address' => 'nullable'
        ]);

        Company::create($validates);
        return redirect('/companies')->with('success', $request['name'].' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $rule = [
            'name' => 'required',
            'address' => 'nullable'
        ];

        if ($request->email != $company->email) {
            $rule['email'] = 'unique:companies|email';
        }

        $validates = $request->validate($rule);

        Company::where('id', $company->id)
            ->update($validates);
        return redirect('/companies')->with('success', $company['name'].' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        Company::destroy($company->id);
        return redirect('/companies')->with('success', 'Company berhasil dihapus!');
    }
}
