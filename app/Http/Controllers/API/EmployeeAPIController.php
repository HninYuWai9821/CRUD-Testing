<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;

class EmployeeAPIController extends Controller
{
    protected $employeeService;

    public function __construct(
        EmployeeService $employeeService
    )
    {
        $this->employeeService=$employeeService;
    }

    public function getAllEmployee()
    {
        $employees = $this->employeeService->getAllemployee();

        return response()->json([
            'employees'=>$employees
        ]);
    }


    public function storeEmployee(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email'
        ]);

        $this->employeeService->storeEmployee($data);

        return response()->json(['$employee'])->setStatusCode(200);
    }

    public function showEmployee($id)
    {
        $employee = $this->employeeService->showEmployee($id);

        return response()->json([
            'employee' => $employee, 200
        ]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $data ['name'] = $request->name;
        $data ['email'] = $request->email;

        $employee = $this->employeeService->updateEmployee($data, $id);

        return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee], 200);
    }

    public function deleteEmployee($id)
    {
        $employee = $this->employeeService->deleteEmployee($id);

        return response()->json(['message' => 'Employee deleted successfully'], 200);
    }


}





