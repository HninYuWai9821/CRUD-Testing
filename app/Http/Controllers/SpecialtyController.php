<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use App\Services\Specialty\SpecialtyService;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    protected $specialtyService;

    public function __construct(
        SpecialtyService $specialtyService
    )
    {
        $this->specialtyService = $specialtyService;
    }

    public function index()
    {
        $specialties=Specialty::all();
        return view('specialty.index')->with(['specialties' => $specialties]);
    }

    public function create()
    {
        return view('specialty.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|min:5|max:20',
        ]);

        $specialty = $this->specialtyService->storeSpecialty($data);

        return redirect()->route('specialties.index')->withSuccess('New Specialy is added successfully.');
    }

    public function show($id)
    {
        $specialty = $this->specialtyService->showSpecialty($id);

        if(!$specialty) {
            return redirect()->route('specialties.index')
                ->with('error','Specialty not found!!');
            }

        return view('specialty.show')->with(['specialty' => $specialty]);

    }

    public function edit($id)
    {
        $specialty = $this->specialtyService->editSpecialty($id);

        return view('specialty.edit')->with(['specialty' => $specialty]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:255',
        ]);

        // $specialty = Specialty::findOrFail($id);

        // $specialty->update($data);

        $specialty = $this->specialtyService->updateSpecialty($data, $id);

        return redirect()->route('specialties.index')
        ->withSuccess('updated successfully.');
    }

    public function destroy($id)
    {

        $specialty = $this->specialtyService->deleteSpecialty($id);

        return redirect()->route('specialties.index')
            ->withSuccess('deleted successfully.');
    }
}
