<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ContactRepositoryInterface;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contacts = $this->contactRepository->getAllContactMessages();
        return view('website.contact', compact('contacts'));
    }

    public function create()
    {
        return view('website.contact.create');
    }

    public function store(Request $request)
    {

        $this->contactRepository->storeContactMessage($request->all());
        return redirect()->route('contact.index')->with('success', 'Contact message sent successfully');
    }

    public function destroy($id)
    {
        $this->contactRepository->deleteContactMessage($id);
        return redirect()->route('contact.index')->with('success', 'Contact message deleted successfully');
    }
}
