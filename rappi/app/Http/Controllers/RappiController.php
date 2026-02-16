<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 
use App\Http\Requests\RappiRequest;
use App\Services\RappiServices;


class RappiController extends Controller
{
    protected $rappiService;

    public function __construct(RappiServices $rappiService)
    {
        $this->rappiService = $rappiService;
    }

    public function index()
    {
        $rappi = $this->rappiService->getAllRappi();
        return response()->json([
            'message' => 'Rappi retrieved successfully',
            'data' => $rappi
        ]);
    }

    public function show($id)
    {
       $rappi = $this->rappiService->getRappiById($id);
        if (!$rappi) {
            return response()->json([
                'message' => 'Rappi not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Rappi retrieved successfully',
            'data' => $rappi
        ]);

    }
    
    public function store(RappiRequest $request)
    {
        $rappi = $this->rappiService->create($request);
        return response()->json([
            'message' => 'Rappi created successfully',
            'data' => $rappi
        ], 201);
    }

    public function update($id, RappiRequest $request)
    {
        $rappi = $this->rappiService->update($id, $request);
        if (!$rappi) {
            return response()->json([
                'message' => 'Rappi not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Rappi updated successfully',
            'data' => $rappi
        ]);
    }

    public function destroy($id)
    {
        $result = $this->rappiService->delete($id);
        if (!$result) {
            return response()->json([
                'message' => 'Rappi not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Rappi deleted successfully'
        ]);
    }
}
