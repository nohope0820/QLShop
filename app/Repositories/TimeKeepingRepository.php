<?php

namespace App\Repositories;

use App\Models\TimeKeeping;
use Illuminate\Support\Facades\DB;

class TimeKeepingRepository extends Repository
{
    protected $timekeeping;

    public function __construct(TimeKeeping $timekeeping)
    {
        $this->timekeeping = $timekeeping;
    }
    
    public function store($params)
    {
        $this->timekeeping->create($params);
    }

    public function update($params)
    {
        return $this->timekeeping->where([['MaNV', '=', $params['MaNV']], ['working_day', '=', $params['working_day']]])
                          ->update(['note' => $params['note']]);
    }

    public function listNotes()
    {
        return $this->timekeeping->join('employees', 'employees.id', '=', 'time_keepings.MaNV')
                                 ->WhereNotIn('note', [' '])
                                 ->select('name', 'working_day', 'note')->paginate(10);
    }

    // public function destroy($id)
    // {
    //     return $this->timekeeping->where('id', '=', $id)
    //                       ->delete();
    // }

    public function listTimeKeeping()
    {
        return $this->timekeeping->paginate(10);
    }

    public function checkTimeKeeping($params)
    {
        $check = $this->timekeeping
                      ->where([['MaNV', '=', $params['MaNV']], ['working_day', '=', $params['working_day']]]);
        return $check->count();
    }

    public function listByDate($date)
    {
        $listByDate = $this->timekeeping->join('employees', 'employees.id', '=', 'time_keepings.MaNV')
                                   ->where('time_keepings.working_day', '=', $date)->get();
        return $listByDate;
    }

    public function listByName($MaNV)
    {
        $listByName = $this->timekeeping->join('employees', 'employees.id', '=', 'time_keepings.MaNV')
                                   ->where('time_keepings.MaNV', '=', $MaNV)->paginate(10);
        return $listByName;
    }

    public function salaryPerEmployee($params)
    {
        $salaryPerEmployee = $this->timekeeping->join('employees', 'employees.id', '=', 'time_keepings.MaNV')
        ->whereBetween('time_keepings.working_day', [$params['check_date_start'], $params['check_date_finish']])
        ->select('employees.name', 'employees.hsl', DB::raw("SUM(time_keepings.SoCong) as SoCong"))
        ->groupBy('time_keepings.MaNV', 'employees.name', 'employees.hsl')
        ->limit(30)->paginate(10);
        return $salaryPerEmployee;
    }
    

    // public function showInformation($id)
    // {
    //     return $this->timekeeping->where('id', '=', $id)->get();
    // }
}
