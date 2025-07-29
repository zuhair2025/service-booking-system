<?php

namespace App\Services;

use App\Models\Service;

class ServiceManager
{
    public function getAllServices()
    {
        return Service::where('status','active')->get();
    }

    public function store(array $data)
    {
        return Service::create($data);
    }

    public function update(Service $service, array $data)
    {
        $service->update($data);

        return $service;
    }

    public function delete(Service $service):void
    {
        $service->delete();
    }
}
