<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface SizeRepositoryInterface
{
    public function getAllSizes();
    public function storeSize(Request $request);
    public function editSize($id);
    public function updateSize($id, Request $request);
    public function deleteSize($id);
}
