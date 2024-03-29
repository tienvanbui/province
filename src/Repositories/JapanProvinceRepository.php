<?php

namespace TienVanBui\Province\Repositories;

use TienVanBui\Province\Models\JapanProvinces;

class JapanProvinceRepository
{

    protected $sort = 'asc';
    protected $sortCondition = 'id';
    protected $keyword = '';

    public function setParams($sort, $sortCondition)
    {
        $this->sortCondition = $sortCondition;
        $this->sort = $sort;
    }
    public function sortQuery($query, $sort, $sortCondition)
    {
        $this->setParams($sort, $sortCondition);
        return $query->orderBy($this->sortCondition, $this->sort);
    }
    public function filters($query, $keyword)
    {
        $this->keyword = $keyword;
        if (!empty($this->keyword)) {
            $query->where('province_name', 'like', "%" . $this->keyword . "%")
                ->orWhere('kanji_province_name', 'like', "%" . $this->keyword . "%")
                ->orWhere('hiragana_province_name', "%" . $this->keyword . "%")
                ->orWhere('province_capital', "%" . $this->keyword . "%");
        }
        return $query;
    }
    public function getAllProvinces($sort, $sortCondition, $keyword)
    {
        $query = JapanProvinces::query();
        $query = $this->filters($query, $keyword);
        return $this->sortQuery($query, $sort, $sortCondition)->get();
    }

    public function getProvincesPaginator($sort, $sortCondition, $keyword)
    {
        $query = JapanProvinces::query();
        $query = $this->filters($query, $keyword);
        return $this->sortQuery($query, $sort, $sortCondition)->paginate(config('province.paginate'));
    }

    public function findById($id)
    {
        $jpProvinces = JapanProvinces::where('id', $id)->first();
        return $jpProvinces;
    }
}
