<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'joiningDate' => 'required',
            'dob' => 'required',
            'designation' => 'required',
            'genderType' => 'required',
            'mobileNumber' => 'required',
            'landLine' => 'required',
            'presentAddress' => 'required',
            'permanentAddress' => 'required',
            'email' => 'required',
            'status' => 'required',
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'resume' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => 'First Name is Required',
            'lastName.required' => 'Last Name is Required',
            'joiningDate.required' => 'Joining Date is Required',
            'dob.required' => 'Date of Birth is Required',
            'designation.required' => 'Designation is Required',
            'genderType.required' => 'Gender is Required',
            'mobileNumber.required' => 'Mobile Number is Required',
            'landLine.required' => 'Land Line is Required',
            'presentAddress.required' => 'Present Address is Required',
            'permanentAddress.required' => 'Permanent Address is Required',
            'email.required' => 'Email is Required',
            'status.required' => 'Status is Required',
            'profilePicture.required' => 'Profile Picture is Required',
            'resume.required' => 'Resume is Required',
        ];
    }
}
