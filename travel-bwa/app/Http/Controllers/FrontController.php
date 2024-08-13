<?php

namespace App\Http\Controllers;

use App\Models\PackageTour;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $package_tours = PackageTour::orderByDesc('id')->take(3)->get();
        return view('front.index', compact('package_tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(frontcontroller $frontcontroller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(frontcontroller $frontcontroller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, frontcontroller $frontcontroller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(frontcontroller $frontcontroller)
    {
        //
    }
}
