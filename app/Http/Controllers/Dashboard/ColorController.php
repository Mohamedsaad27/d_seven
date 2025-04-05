<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\ColorRepositoryInterface;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    protected $colorRepository;

    public function __construct(ColorRepositoryInterface $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function index()
    {
        $colors = $this->colorRepository->getAllColors();
        return view('dashboard.color.index', compact('colors'));
    }

    public function create()
    {
        return view('dashboard.color.create');
    }

    public function store(Request $request)
    {
        $this->colorRepository->storeColor($request);
        return redirect()->route('colors.index')->with('success', 'Color created successfully');
    }

    public function edit($id, Request $request)
    {
        $color = $this->colorRepository->editColor($id, $request);
        return view('dashboard.color.edit', compact('color'));
    }

    public function update($id, Request $request)
    {
        $this->colorRepository->updateColor($id, $request);
        return redirect()->route('colors.index')->with('success', 'Color updated successfully');
    }

    public function destroy($id)
    {
        $this->colorRepository->deleteColor($id);
        return redirect()->route('colors.index')->with('success', 'Color deleted successfully');
    }
}
