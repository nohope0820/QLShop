<?php

namespace App\Http\Controllers\Admin\TimeKeeping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TimeKeepingServices;
use App\Services\EmployeeServices;

class NoteController extends Controller
{
    protected $timekeepingServices;
    protected $employeeServices;

    public function __construct(EmployeeServices $employeeServices, TimeKeepingServices $timekeepingServices)
    {
        $this->timekeepingServices = $timekeepingServices;
        $this->employeeServices = $employeeServices;
    }

    public function index()
    {
        $listEmployee = $this->employeeServices->listEmployee();
        $listNotes = $this->timekeepingServices->listNotes();
        return view('layouts.Admin.TimeKeeping.FormNote')->with('listNotes', $listNotes)
                                                         ->with('listEmployee', $listEmployee);
    }

    public function note(Request $request)
    {
        $params = $this->getParams($request);
        $check = $this->timekeepingServices->checkTimeKeeping($params);
        if ($check == 0) {
            $params['SoCong'] = '';
            $this->timekeepingServices->store($params);
            $listNotes = $this->timekeepingServices->listNotes();
            $listEmployee = $this->employeeServices->listEmployee();
            return view('layouts.Admin.TimeKeeping.FormNote')->with('listNotes', $listNotes)
                                                      ->with('listEmployee', $listEmployee);
        } else {
            $params['SoCong'] = '';
            $this->timekeepingServices->updateNote($params);
            $listNotes = $this->timekeepingServices->listNotes($params);
            $listEmployee = $this->employeeServices->listEmployee();
            return view('layouts.Admin.TimeKeeping.FormNote')->with('listNotes', $listNotes)
                                                      ->with('listEmployee', $listEmployee);
        }
    }

    private function getParams(Request $request)
    {
        return $request->only(['MaNV', 'working_day', 'note']);
    }
}
