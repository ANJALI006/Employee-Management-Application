<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Requests\AddEmployeeRequest;
use DataTables;


class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function list()
    {
        $data = Employee::with('employeeDesignation')->latest();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-primary btn-xs" href="' . route('admin.employee.edit', encrypt($row->id)) . '"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="btn btn-danger btn-xs cdelete" destroy-route="' . route('admin.employee.destroy', encrypt($row->id)) . '" id="' . encrypt($row->id) . '"><i class="fa fa-trash"></i> Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $listOfDesignation = Designation::latest()->get();
        return view('employee.create', compact('listOfDesignation'));
    }

    public function store(AddEmployeeRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {

            $profilePicture = $request->profilePicture;
            if ($profilePicture) {
                $profilePictureFileName = 'profile_picture_' . time() . '_' . $profilePicture->getClientOriginalName();
                $profilePictureFileName = str_replace(" ", "-", $profilePictureFileName);
                $filePath = request()->file('profilePicture')->storeAs('profile_picture', $profilePictureFileName, 'public');
            }
            $resume = $request->resume;
            if ($resume) {
                $resumeFileName = 'resume_' . time() . '_' . $resume->getClientOriginalName();
                $resumeFileName = str_replace(" ", "-", $resumeFileName);
                $filePath = request()->file('resume')->storeAs('resume', $resumeFileName, 'public');
            }


            $joiningDate = date('Y-m-d H:i:s', strtotime($request->joiningDate));
            $dob = date('Y-m-d H:i:s', strtotime($request->dob));

            $addressStatus = 0;
            if ($request->addressStatus == "on") {
                $addressStatus = 1;
            }

            $created = Employee::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'joining_date' => $joiningDate,
                'dob' => $dob,
                'designation_id' => $request->designation,
                'gender' => $request->genderType,
                'mobile_number' => $request->mobileNumber,
                'land_line' => $request->landLine,
                'email' => $request->email,
                'present_address' => $request->presentAddress,
                'same_as_present_address' => $addressStatus,
                'permanent_address' => $request->permanentAddress,
                'status' => $request->status,
                'profile_picture' => $profilePictureFileName,
                'resume' => $resumeFileName,
            ]);
            if ($created) {
                return redirect()->route('admin.employee.index')->with([
                    'message' => 'Employee added successfully'
                ]);
            }
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function edit($id)
    {
        $employeeId = decrypt($id);
        if ($employeeId) {
            $listOfDesignation = Designation::latest()->get();
            $employeeDetails = Employee::with('employeeDesignation')->find($employeeId);
            if ($employeeDetails) {
                return view('employee.edit', compact('employeeDetails', 'listOfDesignation'));
            } else {
                return redirect()->route('admin.employee.index')->with([
                    'message' => 'Employee not found',
                    'message_important' => true
                ]);
            }
        }
    }

    public function update(Request $request)
    {
        $employeeDetails = Employee::find($request->employeeId);
        if ($employeeDetails) {
            if ($request->profilePicture) {
                $profilePicture = $request->profilePicture;
                $profilePictureFileName = 'profile_picture_' . time() . '_' . $profilePicture->getClientOriginalName();
                $profilePictureFileName = str_replace(" ", "-", $profilePictureFileName);
                $filePath = request()->file('profilePicture')->storeAs('profile_picture', $profilePictureFileName, 'public');
            } else {
                $profilePictureFileName = $employeeDetails->profile_picture;
            }

            if ($request->resume) {
                $resume = $request->resume;
                $resumeFileName = 'resume_' . time() . '_' . $resume->getClientOriginalName();
                $resumeFileName = str_replace(" ", "-", $resumeFileName);
                $filePath = request()->file('resume')->storeAs('resume', $resumeFileName, 'public');
            } else {
                $resumeFileName = $employeeDetails->resume;
            }

            $joiningDate = date('Y-m-d H:i:s', strtotime($request->joiningDate));
            $dob = date('Y-m-d H:i:s', strtotime($request->dob));

            $addressStatus = 0;
            if ($request->addressStatus == "on") {
                $addressStatus = 1;
            }

            $updated = $employeeDetails->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'joining_date' => $joiningDate,
                'dob' => $dob,
                'designation_id' => $request->designation,
                'gender' => $request->genderType,
                'mobile_number' => $request->mobileNumber,
                'land_line' => $request->landLine,
                'email' => $request->email,
                'present_address' => $request->presentAddress,
                'same_as_present_address' => $addressStatus,
                'permanent_address' => $request->permanentAddress,
                'status' => $request->status,
                'profile_picture' => $profilePictureFileName,
                'resume' => $resumeFileName
            ]);
            if ($updated) {
                return redirect()->route('admin.employee.index')->with([
                    'message' => 'Employee Updated successfully'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $employeeId = decrypt($id);
        $employee = Employee::find($employeeId);
        if ($employee) {
            $deleted = $employee->delete();
            if ($deleted) {
                return redirect()->route('admin.employee.index')->with([
                    'message' => 'Employee Removed successfully'
                ]);
            }
        }
    }
}
