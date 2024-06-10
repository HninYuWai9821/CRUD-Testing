<?php

namespace App\Services\Specialty;

use App\Models\Specialty;
use Exception;
use Illuminate\Support\Facades\DB;

class SpecialtyService
{
    public function storeSpecialty($data)
    {
        try{
            DB::beginTransaction();

            $specialty = Specialty::create($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }

        return $specialty;

    }

    public function showSpecialty($id)
    {
        $specialty = Specialty::find($id);
        return $specialty;
    }

    public function editSpecialty($id)
    {
        $specialty = Specialty::find($id);
        return $specialty;
    }

    public function updateSpecialty($data, $id)
    {
        try{
            DB::beginTransaction();
            // $data = $request->validate([
            // 'name' => 'required|string|min:2|max:255',
            // ]);

            $specialty= Specialty::find($id);
            $specialty->update($data);

            DB::commit();


        }catch(Exception $exception){
            DB::rollBack();
        };

        return $data;
    }

    public function deleteSpecialty($id)
    {

        try{
            DB::beginTransaction();

            $specialty = Specialty::findOrFail($id);


            $response = $specialty->delete();

            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
            dd($exception);
        };

        return $specialty;
    }

}








