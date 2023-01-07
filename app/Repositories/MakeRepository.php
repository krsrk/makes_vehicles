<?php

namespace App\Repositories;

class MakeRepository
{
    public function createView() : string
    {
        return <<<SQL
            CREATE VIEW `make_model_report` AS
            select m.make_name as make, mo.model_year, mo.model_name as model, vt.vehicle_type_name as vehicle_type
            from makes m
            INNER JOIN make_models_vehicles_types mmvt on m.id = mmvt.make_id
            INNER JOIN vehicle_types vt on vt.id = mmvt.vehicle_type_id
            INNER JOIN models mo on mo.id = mmvt.model_id;
            SQL;
    }
}