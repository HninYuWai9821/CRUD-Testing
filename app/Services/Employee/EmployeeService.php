<?php

namespace App\Services\Employee;

use Exception;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;


class EmployeeService
{
    public function getAllEmployee()
    {
        $data = Employee::paginate(5);
        return $data;
    }

    public function storeEmployee($data)
    {
        try{
            DB::beginTransaction();

            $employee = Employee::create($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollback();
        }

        return $employee;
    }

    public function showEmployee($id)
    {
        $employee = Employee::findOrFail($id);

        return $employee;
    }

    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);

        return $employee;
    }

    public function updateEmployee($data, $id)
    {
        try{
            DB::beginTransaction();

            $employee = Employee::findOrFail($id);

            $employee->update($data);

            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
        }
        return ($employee);
    }

    public function deleteEmployee($id)
    {
        try{
            DB::beginTransaction();

            $employee = Employee::findOrFail($id);

            $employee->delete();

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }
    }

}
