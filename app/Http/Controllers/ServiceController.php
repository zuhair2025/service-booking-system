<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Services\ServiceManager;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    private $serviceManager;

    public function __construct(ServiceManager $service)
    {
        $this->serviceManager = $service;
    }

    public function index()
    {
        $services = $this->serviceManager->getAllServices();

        return ServiceResource::collection($services);
    }

    public function store(ServiceRequest $request)
    {
        if ($request->user()->cannot('create', Service::class)) {
            return response()->json([
                'success' => false,
                'message' => 'You are not allowed to this page.'
            ]);
        }

        $data = $request->validated();

        $service = $this->serviceManager->store($data);

        return response()->json([
            'success' => true,
            'message' => 'Service Created Successfully',
            'data'  => new ServiceResource($service)
        ]);
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        if ($request->user()->cannot('update', $service)) {
            return response()->json([
                'success' => false,
                'message' => 'You are not allowed to this page.'
            ]);
        }

        $data = $request->validated();

        $service = $this->serviceManager->update($service,$data);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully',
            'service' => new ServiceResource($service)
        ]);
    }

    public function destroy(Service $service)
    {
        if (auth()->user()->cannot('delete', $service)) {
            return response()->json([
                'success' => false,
                'message' => 'You are not allowed',
            ], 403);
        }


        $this->serviceManager->delete($service);

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully',
        ],200);

    }
}
