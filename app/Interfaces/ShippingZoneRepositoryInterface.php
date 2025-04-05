<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ShippingZoneRepositoryInterface
{
    public function getAllShippingZones();
    public function getShippingZoneById($id);
    public function createShippingZone(Request $request);
    public function editShippingZone($id, Request $request);
    public function updateShippingZone($id, Request $request);
    public function deleteShippingZone($id);
}
