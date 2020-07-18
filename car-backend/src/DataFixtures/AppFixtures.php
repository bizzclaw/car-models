<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\VehicleType;
use App\Entity\Make;
use App\Entity\Model;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $vehicleTypes = json_decode(file_get_contents('fixtures/vehicle_types.json'), true);
        $makes = json_decode(file_get_contents('fixtures/makes.json'), true);
        $models = json_decode(file_get_contents('fixtures/models.json'), true);

        $typeIndex = [];
        $modelIndex = [];

        foreach ($vehicleTypes as $data) {
            $code = $data['code'];
            $description = $data['description'];
            
            $vehicleType = new VehicleType();
            $vehicleType->setCode($code);
            $vehicleType->setDescription($description);
            $manager->persist($vehicleType);
            $typeIndex[$code] = $vehicleType;
        }

        foreach ($makes as $data) {
            $code = $data['code'];
            $description = $data['description'];
            $typeKey = $data['type'];

            $type;
            if ($typeKey == "") {
                $type = $typeIndex['H'];
            } else {
                $type = isset($typeIndex[$typeKey]) ? $typeIndex[$typeKey] : false;
            }

            if ($type) {
                $make = new Make();
                $make->setCode($code);
                $make->setDescription($description);
                $make->setType($type);
                $manager->persist($make);
            }

            $modelIndex[$code] = $make;
        }

        foreach ($models as $data) {
            $description = $data['description'];
            $makeKey = $data['group'];

            $make = isset($modelIndex[$makeKey]) ? $modelIndex[$makeKey] : false;

            if ($make) {
                $model = new Model();
                $model->setDescription($description);
                $model->setMake($make);
                $model->setType($make->getType());
                $manager->persist($model);
            }
        }

        $manager->flush();
    }
}
