<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packageBooking = PackageBooking::with(['customer', 'tour'])->orderByDesc('id')->paginate(10);
        return view('admin.package_bookings.index', compact('packageBooking'));
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
    public function show(PackageBooking $packageBooking)
    {

        return view('admin.package_bookings.show', compact('packageBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageBooking $packageBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackageBooking $packageBooking)
    {
        DB::transaction(function() use ($packageBooking){
            $packageBooking->update([
                'is_paid' => true,
            ]);
        });
        return redirect()->route('admin.package_bookings.show', $packageBooking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageBooking $packageBooking)
    {
        //
    }
}
