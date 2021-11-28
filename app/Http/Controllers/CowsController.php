<?php

namespace App\Http\Controllers;

use App\Models\Cow;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCow;
use Illuminate\Support\Facades\DB;

class CowsController extends Controller
{
    public function index()
    {
        return view('animals.bovinos.index', ['cows' => Cow::latest()->paginate(20)]);
    }

    public function create()
    {
        return view('animals.cows.create');
    }

    public function store(StoreCow $request)
    {
        $validatedData = $request->validate();
        $cow = Cow::create($validatedData);

        return redirect()->route('bovinos.show', ['cow' => $cow->id]);
    }

    public function show($id)
    {
        return view('animals.bovinos.show', ['cow' => Cow::findOrFail($id)]);
    }

    public function edit($id)
    {
        $cow = Cow::findOrFail($id);
        return view('animals.bovinos.edit', ['cow' => $cow]);
    }

    public function update(Request $request, $id)
    {
        $cow = Cow::findOrFail($id);
        $this->authorize($cow);
        $validatedData = $request->validated();
        $cow->fill($validatedData);
        $cow->save();

        return redirect()->route('bovinos.show', ['cow' => $cow->id]);
    }

    public function destroy($id)
    {
        $cow = Cow::findOrFail($id);
        $this->authorize($cow);

        DB::table('cows')->where('id', $cow)->delete();
        $cow->delete();

        return redirect()->route('bovinos.index');
    }
}
