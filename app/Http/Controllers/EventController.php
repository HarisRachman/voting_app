<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Storage;
use Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::leftjoin('organizers', 'organizers.id', '=', 'events.organizer_id')
                        ->select('events.*', 'organizers.nama as organizer')
                        ->get();

        return view('dashboard.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizers = Organizer::all();
        return view('dashboard.event.create', compact('organizers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organizer' => 'required',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'required',
            'tag' => 'required',
            'harga' => 'required',
            'awal_vote' => 'required',
            'akhir_vote' => 'required',
            'venue' => 'required',
            'lokasi' => 'required',
            'link' => 'required',
            'tanggal' => 'required',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('event', 'public');
            }

            Event::create([
                'organizer_id' => $request->organizer,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'image' => $imagePath,
                'deskripsi' => $request->deskripsi,
                'tag' => $request->tag,
                'harga_vote' => $request->harga,
                'awal_vote' => $request->awal_vote,
                'akhir_vote' => $request->akhir_vote,
                'venue' => $request->venue,
                'lokasi' => $request->lokasi,
                'link' => $request->link,
                'tanggal_acara' => $request->tanggal,
                'waktu_awal' => $request->waktu_awal,
                'waktu_akhir' => $request->waktu_akhir,
            ]);

            return redirect()->route('event.index')->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            return redirect()->route('event.create')->with('error', 'Failed to create event');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $organizers = Organizer::all();
        return view('dashboard.event.edit', compact('organizers', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'organizer' => 'required',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'deskripsi' => 'required',
            'tag' => 'required',
            'harga' => 'required',
            'awal_vote' => 'required',
            'akhir_vote' => 'required',
            'venue' => 'required',
            'lokasi' => 'required',
            'link' => 'required',
            'tanggal' => 'required',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required',
        ]);

        try {
            $imagePath = $event->image;
            if ($request->hasFile('image')) {
                // Delete old avatar
                if ($imagePath && Storage::exists('public/' . $imagePath)) {
                    Storage::delete('public/' . $imagePath);
                }
                // Store new avatar
                $imagePath = $request->file('image')->store('event', 'public');
            }

            $event->update([
                'organizer_id' => $request->organizer,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'image' => $imagePath,
                'deskripsi' => $request->deskripsi,
                'tag' => $request->tag,
                'harga_vote' => $request->harga,
                'awal_vote' => $request->awal_vote,
                'akhir_vote' => $request->akhir_vote,
                'venue' => $request->venue,
                'lokasi' => $request->lokasi,
                'link' => $request->link,
                'tanggal_acara' => $request->tanggal,
                'waktu_awal' => $request->waktu_awal,
                'waktu_akhir' => $request->waktu_akhir,
            ]);

            return redirect()->route('event.index')->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('event.edit', $event)->with('error', 'Failed to update event');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            Storage::delete('public/' . $event->image);
            $event->delete();
            return redirect()->route('event.index')->with('success', 'Event deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('event.index')->with('error', 'Failed to delete event');
        }
    }
}
