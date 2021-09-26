<?php

namespace App\Services;

use App\Repositories\TimeKeepingRepository;

class TimeKeepingServices
{
    protected $TimeKeepingRepository;

    public function __construct(TimeKeepingRepository $timekeepingRepository)
    {
        return $this->TimeKeepingRepository = $timekeepingRepository;
    }

    public function listTimeKeeping()
    {
        return $this->TimeKeepingRepository->listTimeKeeping();
    }

    public function store(array $params)
    {
        return $this->TimeKeepingRepository->store($params);
    }

    public function checkTimeKeeping(array $params)
    {
        return $this->TimeKeepingRepository->checkTimeKeeping($params);
    }

    public function listByDate($date)
    {
        return $this->TimeKeepingRepository->listByDate($date);
    }

    public function listByName($MaNV)
    {
        return $this->TimeKeepingRepository->listByName($MaNV);
    }

    public function salaryPerEmployee(array $params)
    {
        return $this->TimeKeepingRepository->salaryPerEmployee($params);
    }

    public function update(array $params)
    {
        return $this->TimeKeepingRepository->update($params);
    }

    public function listNotes()
    {
        return $this->TimeKeepingRepository->listNotes();
    }

    // public function destroy($id)
    // {
    //     return $this->TimeKeepingRepository->destroy($id);
    // }

    // public function showInformation($id)
    // {
    //     return $this->TimeKeepingRepository->showInformation($id);
    // }
}
