<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandController extends Controller
{
    public function index(Request $request)
    {
        $query = Land::with('user');

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('location', 'like', '%' . $request->search . '%');
        }

        $lands = $query->latest()->get();

        return view('backend.admin.content.lands.index', compact('lands'));
    }

    public function create()
    {
        return view('backend.admin.content.lands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'area' => 'required|numeric',
            'soil_type' => 'required|string',
        ]);

        Land::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'location' => $request->location,
            'area' => $request->area,
            'soil_type' => $request->soil_type,
            'user_created_id' => Auth::id(),
            'user_created_name' => Auth::user()->name,
        ]);

        return redirect()->route('lands.index')->with('success', 'Data lahan berhasil disimpan.');
    }

    public function edit(Land $land)
    {
        return view('lands.edit', compact('land'));
    }

    public function update(Request $request, Land $land)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'area' => 'required|numeric',
            'soil_type' => 'required|string',
        ]);

        $land->update([
            'name' => $request->name,
            'location' => $request->location,
            'area' => $request->area,
            'soil_type' => $request->soil_type,
            'user_updated_id' => Auth::id(),
            'user_update_name' => Auth::user()->name,
        ]);

        return redirect()->route('lands.index')->with('success', 'Data lahan berhasil diperbarui.');
    }

    public function destroy(Land $land)
    {
        $land->delete();
        return redirect()->route('lands.index')->with('success', 'Data lahan berhasil dihapus.');
    }
}
