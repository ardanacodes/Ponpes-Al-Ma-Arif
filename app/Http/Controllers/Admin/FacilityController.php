<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Facilities/Index', [
            'facilities' => Facility::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Facilities/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'required',
            'photo' => 'required|image'
        ]);

        $photo = $request->file('photo')->store('facilities', 'public');

        Facility::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photo
        ]);

        return redirect('/admin/facilities');
    }

    public function edit(Facility $facility)
    {
        return Inertia::render('Admin/Facilities/Edit', [
            'facility' => $facility
        ]);
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'required',
            'photo' => 'nullable|image'
        ]);

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($facility->photo);
            $facility->photo = $request->file('photo')->store('facilities', 'public');
        }

        $facility->update([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $facility->photo
        ]);

        return redirect('/admin/facilities');
    }

    public function destroy(Facility $facility)
    {
        Storage::disk('public')->delete($facility->photo);
        $facility->delete();

        return redirect('/admin/facilities');
    }
}
