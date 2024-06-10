<?php

namespace App\Http\Controllers;

use App\Models\StaffType;
use Illuminate\Http\Request;
use App\Services\StaffType\StaffTypeService;



class StaffTypeController extends Controller
{
    protected $staffTypeService;

    public function __construct(
        StaffTypeService $staffTypeService
    )
    {
        $this->staffTypeService = $staffTypeService;
    }
    public function index()
    {
        $stafftypes = StaffType::paginate(10);
        return view('stafftype.index')->with(['stafftypes' => $stafftypes]);
    }

    public function create()
    {
        return view('stafftype.create');
    }

    public function store(Request $request)
    {
        $data['name']=$request->name;

        $stafftype = $this->staffTypeService->storeStaffType($data);

        return redirect()->route('stafftypes.index')->withSuccess('New Staff Type is added.');
    }

    public function show($id)
    {

        $stafftype = $this->staffTypeService->showStaffType($id);

        if(!$stafftype){
            return redirect('stafftypes.index')->with('errors','Staff Type Not Found');
        }

        return view('stafftype.show')->with(['stafftype'=>$stafftype]);
    }

    public function edit($id)
    {
        $stafftype = $this->staffTypeService->editStaffType($id);

        return view('stafftype.edit')->with(['stafftype'=>$stafftype]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:20'
        ]);

        $stafftype = $this->staffTypeService->updateStaffType($data, $id);

        return redirect()->route('stafftypes.index')->withSuccess('Update Staff Type Successfully');
    }

    public function destroy($id)
    {
        $stafftype = $this->staffTypeService->deleteStaffType($id);
        return redirect()->route('stafftypes.index')->withSuccess('Delete Staff Type Successfully');
    }




}
