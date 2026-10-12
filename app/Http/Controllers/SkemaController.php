<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::withCount('pesertas')
            ->latest()
            ->get();

        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => ['required', 'string', 'max:50', 'unique:skemas,kode'],
            'nama_skema' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        Skema::create($validated);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema sertifikasi berhasil ditambahkan.');
    }

    public function show(Skema $skema)
    {
        $skema->load('pesertas');

        return view('skema.show', compact('skema'));
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $validated = $request->validate([
            'kode' => [
                'required',
                'string',
                'max:50',
                'unique:skemas,kode,' . $skema->id,
            ],
            'nama_skema' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $skema->update($validated);

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema sertifikasi berhasil diperbarui.');
    }

    public function destroy(Skema $skema)
    {
        if ($skema->pesertas()->exists()) {
            return back()->with(
                'error',
                'Skema tidak dapat dihapus karena masih digunakan oleh peserta.'
            );
        }

        $skema->delete();

        return redirect()
            ->route('skema.index')
            ->with('success', 'Skema sertifikasi berhasil dihapus.');
    }
}