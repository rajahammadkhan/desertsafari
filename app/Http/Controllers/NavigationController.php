<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NavigationController extends Controller
{

    public function index()
    {
        $navElements = Navigation::with('children')->get();
        $counted = $navElements->countBy('parent_id');
        $data = [
            'navElements' => Navigation::with('children')->get(),
        ];
        dd($counted->all());
        return $data;
    }

    public function addSlug()
    {
        dd(Str::slug('RETRO, WOMEN, Blouses & Tops, '));
        $nav = Navigation::get();
        foreach ($nav as $key => $value) {
            $value->slug = Str::slug($value->name);
            $value->save();
        }
        return Navigation::get();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(Navigation $navigation)
    {
        
    }

    public function edit(Navigation $navigation)
    {
        
    }

    public function update(Request $request, Navigation $navigation)
    {
        
    }

    public function destroy(Navigation $navigation)
    {
        
    }
}
