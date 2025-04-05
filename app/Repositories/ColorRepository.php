<?php
namespace App\Repositories;

use App\Interfaces\ColorRepositoryInterface;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorRepository implements ColorRepositoryInterface
{
    public function getAllColors()
    {
        return Color::all();
    }

    public function storeColor(Request $request)
    {
        return Color::create($request->all());
    }

    public function updateColor($id, Request $request)
    {
        $color = Color::findOrFail($id);
        $color->update($request->all());
        return $color;
    }

    public function editColor($id, Request $request)
    {
        $color = Color::findOrFail($id);
        return $color;
    }

    public function deleteColor($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
    }
}
