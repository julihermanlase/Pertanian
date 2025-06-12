<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crop;
use App\Models\Land;
use Illuminate\Support\Facades\Auth;

class CropController extends Controller
{
    public function index(Request $request)
    {
        $query = Crop::with('user');

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('location', 'like', '%' . $request->search . '%');
        }

        $crops = $query->latest()->get();
        return view('backend.admin.content.crops.index', compact('crops'));
    }

    public function create()
    {
        $lands = Land::all();
        return view('backend.admin.content.crops.create', compact('lands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'land_id' => 'required|exists:lands,id',
            'name' => 'required',
            'variety' => 'required',
            'start_date' => 'required|date',
            'est_harvest_date' => 'required|date',
        ]);

        Crop::create([
            'land_id' => $request->land_id,
            'name' => $request->name,
            'variety' => $request->variety,
            'start_date' => $request->start_date,
            'est_harvest_date' => $request->est_harvest_date,
            'user_created_id' => Auth::id(),
            'user_created_name' => Auth::user()->name,
        ]);

        return redirect()->route('crops.index')->with('success', 'Data tanaman berhasil ditambahkan.');
    }

    public function edit(Crop $crop)
    {
        $lands = Land::all();
        return view('backend.admin.content.crops.edit', compact('crop', 'lands'));
    }

    public function update(Request $request, Crop $crop)
    {
        $request->validate([
            'land_id' => 'required|exists:lands,id',
            'name' => 'required',
            'variety' => 'required',
            'start_date' => 'required|date',
            'est_harvest_date' => 'required|date',
        ]);

        $crop->update([
            'land_id' => $request->land_id,
            'name' => $request->name,
            'variety' => $request->variety,
            'start_date' => $request->start_date,
            'est_harvest_date' => $request->est_harvest_date,
            'user_updated_id' => Auth::id(),
            'user_update_name' => Auth::user()->name,
        ]);

        return redirect()->route('crops.index')->with('success', 'Data tanaman berhasil diperbarui.');
    }

    public function destroy(Crop $crop)
    {
        $crop->delete();
        return redirect()->route('crops.index')->with('success', 'Data tanaman berhasil dihapus.');
    }
}
