<?php
namespace App\Repositories\Interfaces;

use Illuminate\Foundation\Http\FormRequest;

interface RappiInterfaces
{
    public function getAllRappi();
    public function getRappiById($id);
    public function createRappi(array $data);
    public function updateRappi($id, array $data);
    public function deleteRappi($id);
}