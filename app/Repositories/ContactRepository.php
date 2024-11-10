<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\ContactMessage;

class ContactRepository implements ContactRepositoryInterface
{
    protected $contact;

    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }

    public function storeContactMessage($data)
    {
        return $this->contact->create($data);
    }

    public function getAllContactMessages()
    {
        return $this->contact->all();
    }

    public function deleteContactMessage($id)
    {
        return $this->contact->find($id)->delete();
    }
}
