<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\VehicleTypeRepository;

class VehicleTypeController
{

    private $vehicleTypeRepository;

    public function __construct(VehicleTypeRepository $vehicleTypeRepository)
    {
        $this->vehicleTypeRepository = $vehicleTypeRepository;
    }

    /**
     * @Route("/vehicle-types", name="get_vehicle_types", methods={"GET"})
    */
    public function get(Request $request): JsonResponse
    {
        $vehicleTypes = $this->vehicleTypeRepository->findAll();

        $data=[];
        foreach ($vehicleTypes as $vehicle) {
            $data[] = $vehicle->toArray();
        }

        return new JsonResponse(['vehicle_types' => $data], Response::HTTP_CREATED);
    }
    
    /**
     * @Route("/makes/{typeId}", name="get_makes", methods={"GET"})
    */
    public function getMakes($typeId): JsonResponse
    {
        $vehicleType = $this->vehicleTypeRepository->find($typeId);
        $makes = $vehicleType->getMakes();

        $data=[];
        foreach ($makes as $make) {
            $item = $make->toArray();
            $item['vehicle_type_id'] = $typeId;
            $data[] = $item;
        }

        return new JsonResponse(['makes' => $data], Response::HTTP_CREATED);
    }
}