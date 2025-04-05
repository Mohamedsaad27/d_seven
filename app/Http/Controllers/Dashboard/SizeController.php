<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\SizeRepositoryInterface;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    protected $sizeRepository;

    public function __construct(SizeRepositoryInterface $sizeRepository)
    {
        $this->sizeRepository = $sizeRepository;
    }

    public function index()
    {
        $sizes = $this->sizeRepository->getAllSizes();
        return view('dashboard.size.index', compact('sizes'));
    }

    public function create()
    {
        return view('dashboard.size.create');
    }

    public function store(Request $request)
    {
        $this->sizeRepository->storeSize($request);
        return redirect()->route('sizes.index')->with('success', 'Size created successfully');
    }

    public function edit($id)
    {
        $size = $this->sizeRepository->editSize($id);
        return view('dashboard.size.edit', compact('size'));
    }

    public function update($id, Request $request)
    {
        $this->sizeRepository->updateSize($id, $request);
        return redirect()->route('sizes.index')->with('success', 'Size updated successfully');
    }

    public function destroy($id)
    {
        $this->sizeRepository->deleteSize($id);
        return redirect()->route('sizes.index')->with('success', 'Size deleted successfully');
    }
}
