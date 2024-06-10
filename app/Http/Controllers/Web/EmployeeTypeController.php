<?php

namespace App\Http\Controllers\Web;

use App\Models\EmployeeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\EmployeeType\EmployeeTypeService;

class EmployeeTypeController extends Controller
{
    protected $employeeTypeService;

    public function __construct(
        EmployeeTypeService $employeeTypeService
    )
    {
        $this->employeeTypeService = $employeeTypeService;
    }

    public function index()
    {
        $employeeTypes = $this->employeeTypeService->getAllEmplopyeeType();

        return view('employeeType.index')->with(['employeeTypes'=>$employeeTypes]);
    }

    public function create()
    {
        return view('employeeType.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|min:5',
            'salary' => 'required|integer'
        ]);

        $employeeType = $this->employeeTypeService->storeEmployee($data);

        return redirect()->route('employeeTypes.index')->withSuccess('New Employee Type is added successfully.');
    }

    public function show($id)
    {
        $employeeType = EmployeeType::findOrFail($id);

        return view('employeeType.show')->with(['employeeType'=>$employeeType]);
    }

    public function edit($id)
    {
        $employeeType = $this->employeeTypeService->editEmployee($id);

        return view('employeeType.edit')->with(['employeeType'=>$employeeType]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'type' => 'required|min:5|max:20',
            'salary' => 'required|'
        ]);

        $employeeType = $this->employeeTypeService->updateEmployee($data, $id);

        return redirect()->route('employeeTypes.index')->withSuccess('Employee Type is updated successfully.');
    }

    public function destroy($id)
    {
        $employeeType = $this->employeeTypeService->deleteEmployee($id);

        return redirect()->route('employeeTypes.index')->withSuccess('Employee Type is deleted successfully.');
    }
}
