<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVaccine;
use App\Models\Animals;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaccinesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vacinas = Vaccine::latest()->paginate(20);
        return view('vaccines.index', compact('vacinas'));
    }

    public function create()
    {
        $animals = Animals::all();
        return view('vaccines.create', compact('animals'));
    }

    public function store(StoreVaccine $request)
    {
        $validatedData = $request->validated();
        $animals = Animals::all();
        $vacina = Vaccine::create($validatedData);
        $animals->where('id', $vacina->animals_id );
        //$validatedData['animals_id'] = $request->Animals::whereBelongsto('animals_id')->id;

        $request->session()->flash('status', 'Vacina criada com sucesso!');
        return redirect()->route('vacinas.index', compact('vacina', 'animals'));
    }

    public function edit($id)
    {
        $vacina = Vaccine::findOrFail($id);
        $animals = Animals::all();
        return view('vaccines.edit', compact('vacina', 'animals'));
    }

    public function update(StoreVaccine $request, $id)
    {
        $vacina = Vaccine::findOrFail($id);
        $validatedData = $request->validated();
        $validatedData['animals_id'] = $request->animals()->id;
        $vacina->fill($validatedData);
        $vacina->save();

        return redirect()->route('vacinas.index', compact('vacina'));
    }

    public function destroy($id)
    {
        $vacina = Vaccine::findOrFail($id);
        $this->authorize($vacina);

        DB::table('vaccines')->where('id', $vacina)->delete();
        $vacina->delete();

        return redirect()->route('vacinas.index');
    }
}
