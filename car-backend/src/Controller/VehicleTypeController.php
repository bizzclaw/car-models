<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\VehicleTypeRepository;

use App\Entity\VehicleType;
use App\Entity\Make;
use App\Entity\Model;
use App\Entity\SearchLog;


class VehicleTypeController extends AbstractController
{

    private $vehicleTypeRepository;

    public function __construct(VehicleTypeRepository $vehicleTypeRepository)
    {
        $this->vehicleTypeRepository = $vehicleTypeRepository;
    }

    /**
     * @Route("/vehicle-types", name="get_vehicle_types", methods={"GET"})
    */
    public function getVehicleTypes(Request $request): JsonResponse
    {
        $vehicleTypes = $this->vehicleTypeRepository->findAll();

        $data=[];
        foreach ($vehicleTypes as $vehicle) {
            $data[] = $vehicle->toArray();
        }

        return $this->json(['vehicle_types' => $data]);
    }

    /**
     * @Route("/vehicle-types/{typeId}", name="get_vehicle_type", methods={"GET"})
    */
    public function getVehicleType($id): JsonResponse
    {
        $vehicleType = $this->vehicleTypeRepository->find($typeId);
        $data = $vehicleType->toArray();
        return $this->json(['vehicle_type' => $data]);
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
            $data[] = $item;
        }

        return $this->json(['makes' => $data]);
    }

/**
     * @Route("/models/{typeId}/{makeCode}", name="get_models", methods={"GET"})
    */
    public function getModels(Request $request, $typeId, $makeCode): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();

        $models = $entityManager
        ->getRepository(Model::class)
        ->findBy([
            'makeCode' => $makeCode,
            'type' => $typeId
        ]);

        $data=[];
        foreach ($models as $model) {
            $item = $model->toArray();
            $data[] = $item;
        }

        $logRepo = $entityManager->getRepository(SearchLog::class);

        $referenceVehicleType = $entityManager->getReference(VehicleType::class,  intval($typeId));
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $requestTime = $_SERVER['REQUEST_TIME'];

        $log = new SearchLog();
        $log->setVehicleType($referenceVehicleType); // NOTE: This will throw an exception error if the vehicle type is invalid in the DB, but validating would take extra time.
        $log->setMakeAbbr($makeCode);
        $log->setResultCount(count($models));
        $log->setRequestTime($requestTime);
        $log->setIpAddress($request->getClientIp());
        $log->SetUserAgent($userAgent);

        $entityManager->persist($log);

        $entityManager->flush();

        return $this->json(['models' => $data]);
    }
}