<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface ColorRepositoryInterface
{
    public function getAllColors();
    public function storeColor(Request $request);
    public function editColor($id, Request $request);
    public function updateColor($id, Request $request);
    public function deleteColor($id);
}
