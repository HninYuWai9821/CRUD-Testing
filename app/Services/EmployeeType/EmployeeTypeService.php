<?php

namespace App\Services\EmployeeType;

use App\Models\Employee;
use Exception;
use App\Models\EmployeeType;
use Illuminate\Support\Facades\DB;

class EmployeeTypeService
{
    public function getAllEmplopyeeType()
    {
        $employeeTypes = EmployeeType::paginate(3);

        return $employeeTypes;
    }

    public function storeEmployee($data)
    {
        try{

            DB::beginTransaction();

            $employeeType = EmployeeType::create($data);

            DB::commit();

        }catch(Exception $expection){
            DB::rollback();
        }
        return $employeeType;
    }

    public function editEmployee($id)
    {
        $employeeType = EmployeeType::findOrFail($id);

        return $employeeType;
    }

    public function updateEmployee($data, $id)
    {
        try{
            DB::beginTransaction();

            $employeeType = EmployeeType::findOrFail($id);

            $employeeType->update($data);

            DB::commit();

        }catch(Exception $expection){
            DB::rollBack();
        }
        return $employeeType;
    }

    public function deleteEmployee($id)
    {
        try{
            DB::beginTransaction();

            $employeeType = EmployeeType::findOrFail($id);

            $employeeType->delete();

            DB::commit();

        }catch(Exception $expection){
            DB::rollBack();
        }
    }

}
