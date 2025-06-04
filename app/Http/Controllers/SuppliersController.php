<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    //
    public function index(Request $request)
    {
        $filter = $request->input('search');
        if ($filter) {
            $suppliers = Supplier::where('name', 'like', "%$filter%")->get();
        } else {
            $suppliers = Supplier::orderBy('name', 'asc')->get();
        }
        return view('suppliers.index', [
            'suppliers' => $suppliers,
            'filter' => $filter
        ]);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:F,J',
            'name' => 'required|min:2|max:50',
            'cpf_cnpj' => 'required|min:2|max:20',
            'phone' => 'required|min:2|max:20',
        ]);

        Supplier::create([
            'name' => $request->name,
            'type' => $request->type,
            'cpf_cnpj' => $request->cpf_cnpj,
            'phone' => $request->phone,
        ]);

        return redirect('/suppliers')->with('success', 'Tipo cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->update([
            'name' => $request->name,
            'type' => $request->type,
            'cpf_cnpj' => $request->cpf_cnpj,
            'phone' => $request->phone,

        ]);
        return redirect('/suppliers')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy($id) {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('/suppliers')->with('success', 'Fornecedor excluído com sucesso!');
    }
}
