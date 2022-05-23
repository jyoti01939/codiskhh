<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function addview()
   {
       return view ('company.add_company');
   }

   public function upload(Request $request)
   {
       $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'file' => 'required|mimes:png,jpg,svg,jpeg|'
       ]);
       $company = new Company();
       $image = $request->file;
       $imagename = time(). '.' .$image->getClientOriginalExtension();
       $request->file->move('companylogo',$imagename);
       $company->logo = $imagename;
       $company->name = $request->name;
       $company->email = $request->email;
       $company->website = $request->website;
       $company->save();
       return redirect()->back()->with('message', 'Your Company added successfully');
   }

   public function showcompany()
   {
       $data = Company::paginate(10);
     return view('company.show_company',compact('data'));
   }

   public function delete($id)
   {
       $data = Company::find($id);
       $data->delete();
       return redirect()->back();
   }

   public function update($id)
   {
       $data = Company::find($id);
      return view ('company.update_company',compact('data'));
   }

   public function edit(Request $request , $id)
   {
       $data = Company::find($id);
       $image = $request->file;
       if($image)
       {
        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->file->move('companylogo',$imagename);
        $data->logo = $imagename;
       }
       $data->name = $request->name;
       $data->email = $request->email;
       $data->website = $request->website;
       $data->save();
       return redirect()->back()->with('message','Your data is updated successfully');
   }
}
