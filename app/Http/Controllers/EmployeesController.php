<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Log;
use Exception;

class EmployeesController extends Controller
{
    public function getEmployeeList()
    {
        try {
            $employees = Employee::orderBy('id', 'DESC')->get();
            return  response()->json($employees);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /* 
        Get Individual Employee Details
     */
    public function getEmployeeDetails(Request $request)
    {
        try {
            $employeeData = Employee::findOrFail($request->get('employeeId'));
            return  response()->json($employeeData);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /* Update Employee Data */
    public function updateEmployeeData(Request $request)
    {
        try {
            //dd($request->all());
            $employeeId = $request->get('employeeId');
            $employeeName = $request->get('employeeName');
            $employeeSalary = $request->get('employeeSalary');
          
            Employee::where('id', $employeeId)->update([
                'employee_name' => $employeeName,
                'salary' => $employeeSalary
            ]);
            
            return  response()->json([
                'employee_name' => $employeeName,
                'salary' => $employeeSalary
            ]);

        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /* Delete Employee Data */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /* Store Employee Data */ 
    public function store(Request $request)
    {
        try {
            $employeeName = $request->get('employeeName');
            $employeeSalary = $request->get('employeeSalary');

            Employee::create([
                'employee_name' => $employeeName,
                'salary' => $employeeSalary
            ]);

            return  response()->json([
                'employee_name' => $employeeName,
                'salary' => $employeeSalary
            ]);

        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
