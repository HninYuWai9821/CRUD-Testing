<?php

namespace App\Services\StaffType;

use Exception;
use App\Models\StaffType;
use Illuminate\Support\Facades\DB;

class StaffTypeService{
    public function storeStaffType($data)
    {
        try{

            DB::beginTransaction();

            $stafftype = StaffType::create($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollback();
        }
        return $stafftype;
    }

    public function showStaffType($id)
    {
        $stafftype = StaffType::findOrFail($id);

        return $stafftype;
    }

    public function editStaffType($id)
    {
        $stafftype = StaffType::findOrFail($id);

        return $stafftype;
    }

    public function updateStaffType($data, $id)
    {
        try{
            DB::beginTransaction();

            $stafftype = StaffType::findOrFail($id);

            $stafftype->update($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }

        return $data;
    }

    public function deleteStaffType($id)
    {
        try{
            DB::beginTransaction();

            $stafftype = StaffType::findOrFail($id);

            $stafftype->delete($id);

            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
        }

        return $stafftype;
    }
}
