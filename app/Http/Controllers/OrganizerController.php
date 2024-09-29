<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;
use Storage;
use Str;

class OrganizerController extends Controller
{
    
    public function index()
    {
        $organizers = Organizer::all();
        return view('dashboard.organizer.index', compact('organizers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.organizer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'banner' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {
            $logoPath = null;
            $bannerPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('organizer/logo', 'public');
            }

            if ($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('organizer/banner', 'public');
            }

            Organizer::create([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'deskripsi' => $request->deskripsi,
                'logo' => $logoPath,
                'banner' => $bannerPath,
            ]);

            return redirect()->route('organizer.index')->with('success', 'Organizer created successfully');
        } catch (\Exception $e) {
            return redirect()->route('organizer.create')->with('error', 'Failed to create organizer');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Organizer $organizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organizer $organizer)
    {
        return view('dashboard.organizer.edit', compact('organizer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organizer $organizer)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'banner' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {
            $logoPath = $organizer->logo;
            $bannerPath = $organizer->banner;

            if ($request->hasFile('logo')) {
                // Delete old avatar
                if ($logoPath && Storage::exists('public/' . $logoPath)) {
                    Storage::delete('public/' . $logoPath);
                }
                // Store new avatar
                $logoPath = $request->file('logo')->store('organizer/logo', 'public');
            }

            if ($request->hasFile('banner')) {
                // Delete old avatar
                if ($bannerPath && Storage::exists('public/' . $bannerPath)) {
                    Storage::delete('public/' . $bannerPath);
                }
                // Store new avatar
                $bannerPath = $request->file('banner')->store('organizer/banner', 'public');
            }

            $organizer->update(array_merge(
                $request->only('nama', 'deskripsi'),
                ['logo' => $logoPath, 'banner' => $bannerPath, 'slug' => Str::slug($request->nama)]
            ));

            return redirect()->route('organizer.index')->with('success', 'Organizer updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('organizer.edit', $organizer)->with('error', 'Failed to update organizer');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizer $organizer)
    {
        try {
            Storage::delete('public/' . $organizer->logo);
            Storage::delete('public/' . $organizer->banner);
            $organizer->delete();
            return redirect()->route('organizer.index')->with('success', 'Organizer deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('organizer.index')->with('error', 'Failed to delete organizer');
        }
    }

}
