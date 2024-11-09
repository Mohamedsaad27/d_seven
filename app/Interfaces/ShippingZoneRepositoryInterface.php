<?php

namespace App\Interfaces;

interface ShippingZoneRepositoryInterface
{
    public function getAllShippingZones();
    public function getShippingZoneById($id);
    public function createShippingZone(array $data);
    public function updateShippingZone($id, array $data);
    public function deleteShippingZone($id);
}
