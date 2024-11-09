<?php

namespace App\Repositories;

use App\Models\ShippingZone;
use App\Interfaces\ShippingZoneRepositoryInterface;

class ShippingZoneRepository implements ShippingZoneRepositoryInterface
{
    private $shippingZone;
    public function __construct(ShippingZone $shippingZone)
    {
        $this->shippingZone = $shippingZone;
    }
    public function getAllShippingZones()
    {
       
    }
    public function getShippingZoneById($id)
    {
        
    }
    public function createShippingZone(array $data)
    {
        
    }
    public function updateShippingZone($id, array $data)
    {
        
    }
    public function deleteShippingZone($id)
    {
        
    }
}
