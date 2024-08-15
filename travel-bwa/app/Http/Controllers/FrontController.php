<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageBookingRequest;
use App\Models\PackageBanks;
use App\Models\PackageBooking;
use App\Models\PackagePhoto;
use App\Models\PackageTour;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function book_store(StorePackageBookingRequest $request,PackageTour $packageTour){
        $user = Auth::user();
        $bank = PackageBanks::orderByDesc('id')->first();
        $packageBookingId = null;

    // & pada packageBookingId di bawah berfungsi untuk 
    // menghubungkan 1 sama lain dengan yang berada di luar

        DB::transaction(function () use($request, $user, $packageTour, $bank, &$packageBookingId){
            $validated = $request->validated();

            $startDate = new Carbon($validated['start_date']);
            $totalDays = $packageTour->days - 1;

            // misal mulai 10 dan tour nya hanya 5 hari 
            // di code diatas berfungsi untuk mulai darai 10, 11, 12, 13, 14

            $endDate = $startDate->addDays($totalDays);

            $sub_total = $packageTour->price * $validated['quantity'];
            $insurance = 300000 * $validated['quantity'];
            $tax = $sub_total * 0.10;
            
            $validated['end_date'] = $endDate;
            $validated['user_id'] = $user->id;
            $validated['is_paid'] = false;
            $validated['proof'] = 'dummytrx.png';
            $validated['package_tour_id'] = $packageTour->id;
            $validated['package_bank_id'] = $bank->id;
            $validated['insurance'] = $insurance;
            $validated['tax'] = $tax;
            $validated['sub_total'] = $sub_total;
            $validated['total_amount'] = $sub_total + $tax + $insurance;

            $packageBooking = PackageBooking::create($validated);
            $packageBookingId = $packageBooking->id;
        });

        if($packageBookingId){
            return redirect()->route('front.choose_bank', $packageBookingId);
        }else{
            return back()->withErrors('Failed to create booking.');
        }
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
