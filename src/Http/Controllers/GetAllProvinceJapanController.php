<?php

namespace TienVanBui\Province\Http\Controllers;

use TienVanBui\Province\Http\Resources\JapanProvinceResource;
use TienVanBui\Province\Repositories\JapanProvinceRepository;
use Illuminate\Http\Request;

class GetAllProvinceJapanController
{
    protected $jpProvinceRepository = null;

    public function __construct(JapanProvinceRepository $jpProvinceRepository)
    {
        $this->jpProvinceRepository = $jpProvinceRepository;
    }

    public function allProvinces(Request $request)
    {
        $sort = $request->sort ?? 'asc';
        $sortCondition = $request->sortCondition ?? 'id';
        $keyword = $request->keyword ?? '';
        $japanProvinces = $this->jpProvinceRepository->getAllProvinces($sort, $sortCondition, $keyword);
        return JapanProvinceResource::collection($japanProvinces);
    }

    public function getProvinceById($id)
    {
        try {
            $japanProvinces = $this->jpProvinceRepository->findById($id);
            return JapanProvinceResource::make($japanProvinces);
        } catch (\Exception $e) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function paginateProvinces(Request $request)
    {
        $sort = $request->sort ?? 'asc';
        $sortCondition = $request->sortCondition ?? 'id';
        $keyword = $request->keyword ?? '';
        $japanProvinces = $this->jpProvinceRepository->getProvincesPaginator($sort, $sortCondition, $keyword);
        return JapanProvinceResource::collection($japanProvinces);
    }
}
