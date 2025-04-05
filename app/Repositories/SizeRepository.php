<?php
namespace App\Repositories;

use App\Interfaces\SizeRepositoryInterface;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeRepository implements SizeRepositoryInterface
{
    protected $size;

    public function __construct(Size $size)
    {
        $this->size = $size;
    }

    public function getAllSizes()
    {
        return $this->size->all();
    }

    public function storeSize(Request $request)
    {
        $validated = $request->validate([
            'size' => 'required',
        ]);
        return $this->size->create($validated);
    }

    public function editSize($id)
    {
        $size = $this->size->findOrFail($id);
        return $size;
    }

    public function updateSize($id, Request $request)
    {
        $size = $this->size->findOrFail($id);
        $validated = $request->validate([
            'size' => 'required',
        ]);
        $size->update($validated);
        return $size;
    }

    public function deleteSize($id)
    {
        $size = $this->size->findOrFail($id);
        $size->delete();
    }
}
