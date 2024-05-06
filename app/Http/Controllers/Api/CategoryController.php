<?php

namespace App\Http\Controllers\Api;

use App\Models\Chartsize;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChartsizeResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Chartsize::withCount(['products' => function ($query) {
                $query->withFilters(
                    request()->input('sizes', []),
                );
            }])
            ->get();

        return ChartsizeResource::collection($categories);
    }
}
