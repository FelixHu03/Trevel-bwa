<?php

namespace App\Http\Controllers;

use App\Models\PackagePhoto;
use App\Models\PackageTour;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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

    public function details(PackageTour $packageTour){
        $photos = $packageTour->package_photos()->orderByDesc('id')->take(3)->get();
        return view('front.details', compact('packageTour', 'photos'));
    }
    public function book(PackageTour $packageTour){
        return view('front.book', compact('packageTour'));
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
