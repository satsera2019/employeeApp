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
}
