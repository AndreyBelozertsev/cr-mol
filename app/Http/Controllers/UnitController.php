<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
    
    }
    public function show($slug)
    {
        $unit = Unit::activeItem($slug)->firstOrFail();

        $isDisabledVoteButton = isDisableVoteButton($unit->category->id);
  
        return view('unit.show', compact( 'unit', 'isDisabledVoteButton'));
    }
}
