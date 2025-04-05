<?php

namespace App\Repositories;

use App\Interfaces\ShippingZoneRepositoryInterface;
use App\Models\ShippingZone;
use Illuminate\Http\Request;

class ShippingZoneRepository implements ShippingZoneRepositoryInterface
{
    private $shippingZone;

    public function __construct(ShippingZone $shippingZone)
    {
        $this->shippingZone = $shippingZone;
    }

    public function getAllShippingZones()
    {
        return $this->shippingZone->all();
    }

    public function getShippingZoneById($id)
    {
        return $this->shippingZone->find($id);
    }

    public function createShippingZone(Request $request)
    {
        $validatedData = $request->validate([
            'zone_name' => 'required|string',
            'shipping_cost' => 'nullable|integer',
        ]);
        return $this->shippingZone->create($validatedData);
    }

    public function editShippingZone($id, Request $request)
    {
        $shippingZone = ShippingZone::findOrFail($id);
        return $shippingZone;
    }

    public function updateShippingZone($id, Request $request)
    {
        $validatedData = $request->validate([
            'zone_name' => 'required|string',
            'shipping_cost' => 'nullable|integer',
        ]);
        return $this->shippingZone->find($id)->update($validatedData);
    }

    public function deleteShippingZone($id)
    {
        return $this->shippingZone->find($id)->delete();
    }
}
