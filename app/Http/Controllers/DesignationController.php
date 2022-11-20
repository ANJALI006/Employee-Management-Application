<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Requests\AddDesignationRequest;
use DataTables;

class DesignationController extends Controller
{
    public function index()
    {
        return view('designation.index');
    }

    public function list()
    {
        $data = Designation::latest();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-primary btn-xs" href="' . route('admin.designation.edit', encrypt($row->id)) . '"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-danger btn-xs cdelete" destroy-route="' . route('admin.designation.destroy', encrypt($row->id)) . '" id="' . encrypt($row->id) . '"><i class="fa fa-trash"></i> Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('designation.create');
    }

    public function store(AddDesignationRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $created = Designation::create([
                'designation' => $request->designation
            ]);
            if ($created) {
                return redirect()->route('admin.designation.index')->with([
                    'message' => 'Designation created successfully'
                ]);
            }
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function edit($id)
    {
        $designationId = decrypt($id);
        if ($designationId) {
            $designationDetails = Designation::find($designationId);
            if ($designationDetails) {
                return view('designation.edit', compact('designationDetails'));
            } else {
                return redirect()->route('admin.designation.index')->with([
                    'message' => 'Designation not found',
                    'message_important' => true
                ]);
            }
        }
    }

    public function update()
    {
        $designationDetails = Designation::find(request('designationId'));
        if ($designationDetails) {
            $updated = $designationDetails->update([
                'designation' => request('designation')
            ]);
            if ($updated) {
                return redirect()->route('admin.designation.index')->with([
                    'message' => 'Designation Updated successfully'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $designationId = decrypt($id);
        $designationToRemove = Designation::find($designationId);
        if ($designationToRemove) {
            //check for employee
            $deleted = $designationToRemove->delete();
            if ($deleted) {
                return redirect()->route('admin.designation.index')->with([
                    'message' => 'Designation Deleted successfully'
                ]);
            }
        }
    }
}
