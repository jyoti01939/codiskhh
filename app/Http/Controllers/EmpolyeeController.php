<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmpolyeeController extends Controller
{
    public function employeeview(Request $request)
    {
        $data = Company::all();

        return view ('employee.add_employee',compact('data'));
    }

    public function upload(Request $request)
   {
       $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'mobile' => 'required'
       ]);
       $employee = new Employee();
       $employee->first_name = $request->first_name;
       $employee->last_name = $request->last_name;
       $employee->company = $request->company;
       $employee->email = $request->email;
       $employee->mobile = $request->mobile;
       $employee->save();
       return redirect()->back()->with('message', 'Your employee added successfully');
   }

   public function showemployee()
   {
       $data = Employee::join('companies','companies.id','=','employees.company')
                       ->select('companies.*','employees.*')
                       ->paginate(10);
     return view('employee.show_employee',compact('data'));
   }

   public function delete($id)
   {
       $data = Employee::find($id);
       $data->delete();
       return redirect()->back();
   }

   public function update($id)
   {
       $data = Employee::join('companies','companies.id','=','employees.company')
                        ->select('companies.*','employees.*')->find($id);
      return view ('employee.update_employee',compact('data'));
   }

   public function edit(Request $request , $id)
   {
       $data = Employee::join('companies','companies.id','=','employees.company')
       ->select('companies.*','employees.*')->find($id);
       $data->first_name = $request->first_name;
       $data->last_name = $request->last_name;
       $data->company = $request->company;
       $data->email = $request->email;
       $data->mobile = $request->mobile;
       $data->save();
       return redirect()->back()->with('message','Your data is updated successfully');
   }
}



