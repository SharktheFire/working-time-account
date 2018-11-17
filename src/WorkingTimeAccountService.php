<?php

class WorkingTimeAccountService
{
    private $repository;
    private $profileService;

    public function __construct()
    {
        $this->repository = new MySQLRepository();
        $this->profileService = new ProfileService();
    }

    public function addWorkingTime(string $startTime, string $endTime)
    {
        $this->repository->addTime($startTime, $endTime);
    }

    public function getAllTimes()
    {
        return $this->repository->getAll();
    }

    public function getProfile()
    {
        $this->profileService->getProfile();
    }
}
?>
