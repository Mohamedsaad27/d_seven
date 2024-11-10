<?php

namespace App\Interfaces;

interface ContactRepositoryInterface
{
    public function storeContactMessage($data);
    public function getAllContactMessages();
    public function deleteContactMessage($id);
}
