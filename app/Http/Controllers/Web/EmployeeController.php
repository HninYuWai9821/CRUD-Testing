<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(
        EmployeeService $employeeService
    )
    {
        $this->employeeService = $employeeService;
    }
    public function index()
    {
        $employees = $this->employeeService->getAllEmployee();

        return view('employee.index')->with([
            'employees'=>$employees
        ]);
    }

    public function create()
    {
        $employeeTypes =EmployeeType::all();
        return view('employee.create')->with(['employeeTypes'=>$employeeTypes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'type_id'=>'required'
        ]);

        $employee = $this->employeeService->storeEmployee($data);

        return redirect()->route('employees.index')->withSuccess('New Employee is added successfully');
    }

    public function show($id)
    {

        $employee = $this->employeeService->showEmployee($id);

        return view('employee.show')->with(['employee'=>$employee]);
    }

    public function edit($id)
    {
        $employeeTypes =EmployeeType::all();

        $employee=$this->employeeService->editEmployee($id);

        return view('employee.edit')->with([
            'employee'=>$employee,
            'employeeTypes'=>$employeeTypes
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required|string|min:5',
            'email'=>'required|email',
            'type_id'=>'required'
        ]);

        $employee = $this->employeeService->updateEmployee($data, $id);

        return redirect()->route('employees.index')->withSuccess('Employee Data Updated Successfully.');
    }

    public function destroy($id)
    {
        $employee = $this->employeeService->deleteEmployee($id);

        return redirect()->route('employees.index')->withSuccess('Employee removed successfully.');
    }
}
