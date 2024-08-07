<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageBankRequest;
use App\Http\Requests\UpdatePackageBankRequest;
use App\Models\PackageBanks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = PackageBanks::orderByDesc('id')->paginate(10);
        // dd($banks);
        return view('admin.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageBankRequest $request)
    {
        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $validated['logo'] = $logoPath;
            }
            $newBank = PackageBanks::create($validated);
        });

        return redirect()->route('admin.banks.index');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(PackageBanks $packageBanks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageBanks $packageBanks)
    {
        return view('admin.banks.edit', compact('packageBanks'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageBankRequest $request, PackageBanks $packageBanks)
    {
        DB::transaction(function () use ($request,$packageBanks) {

            $validated = $request->validated();

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $validated['logo'] = $logoPath;
            }
            $packageBanks->update($validated);
        });

        return redirect()->route('admin.banks.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageBanks $packageBanks)
    {
        DB::transaction(function() use($packageBanks){
            $packageBanks->delete();
        });
        return redirect()->route('admin.banks.index');

    }
}
