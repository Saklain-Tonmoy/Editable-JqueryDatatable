<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::all();
        return view('editable-table', compact('data'));
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            if($request->action == 'edit')
            {
                $data = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'position' => $request->position,
                    'salary' => $request->salary,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'joining_date' => $request->joining_date
                );

                Employee::where('id', $request->id)->update($data);
            }

            if($request->action == 'delete')
            {
                Employee::where('id', $request->id)->delete();
            }

            return response()->json($request);
        }
    }
}
