<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Event;
use Carbon\Carbon;
use Storage;

class CandidateController extends Controller
{
    public function indexFront()
    {
        session()->forget('last_order','candidate','last_vote');
        $lead1 = Candidate::orderBy('jml_vote', 'DESC')->take(1)->get();
        $lead2 = Candidate::orderBy('jml_vote', 'DESC')->skip(1)->take(1)->get();
        $lead3 = Candidate::orderBy('jml_vote', 'DESC')->skip(2)->take(1)->get();
        
        $count = Candidate::count();
        $skip = 3;
        $limit = $count - $skip; // the limit
        $leaderboards = Candidate::orderBy('jml_vote', 'DESC')->skip($skip)->take($limit)->get();
        
        $candidates = Candidate::all();
        return view('vote',compact('candidates', 'leaderboards', 'lead1', 'lead2', 'lead3'));
    }

    public function index()
    {
        $candidates = Candidate::leftjoin('events', 'events.id', '=', 'candidates.event_id')
                        ->select('candidates.*', 'events.title as event')
                        ->get();

        return view('dashboard.candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        return view('dashboard.candidate.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'daerah' => 'required',
            'hobi' => 'required',
            'bakat' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('candidate', 'public');
            }
            $usia = Carbon::parse($request->tanggal_lahir)->age;

            Candidate::create([
                'event_id' => $request->event,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'usia' => $usia,
                'daerah' => $request->daerah,
                'hobi' => $request->hobi,
                'bakat' => $request->bakat,
                'link' => $request->link,
                'image' => $imagePath,
            ]);

            return redirect()->route('candidate.index')->with('success', 'Candidate created successfully');
        } catch (\Exception $e) {
            return redirect()->route('candidate.create')->with('error', 'Failed to create candidate');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        $events = Event::all();
        return view('dashboard.candidate.edit', compact('candidate', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'event' => 'required',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'daerah' => 'required',
            'hobi' => 'required',
            'bakat' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        try {
            $imagePath = $candidate->image;
            if ($request->hasFile('image')) {
                // Delete old avatar
                if ($imagePath && Storage::exists('public/' . $imagePath)) {
                    Storage::delete('public/' . $imagePath);
                }
                // Store new avatar
                $imagePath = $request->file('image')->store('candidate', 'public');
            }
            $usia = Carbon::parse($request->tanggal_lahir)->age;

            $candidate->update([
                'event_id' => $request->event,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'usia' => $usia,
                'daerah' => $request->daerah,
                'hobi' => $request->hobi,
                'bakat' => $request->bakat,
                'link' => $request->link,
                'image' => $imagePath,
            ]);

            return redirect()->route('candidate.index')->with('success', 'Candidate updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('candidate.edit', $candidate)->with('error', 'Failed to update candidate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        try {
            Storage::delete('public/' . $candidate->image);
            $candidate->delete();
            return redirect()->route('candidate.index')->with('success', 'Candidate deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('candidate.index')->with('error', 'Failed to delete candidate');
        }
    }
}
