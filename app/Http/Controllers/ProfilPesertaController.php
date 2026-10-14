<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfilPesertaController extends Controller
{
    public function dashboard()
    {
        $peserta = Peserta::with('skema')
            ->where('user_id', Auth::id())
            ->first();

        return view('peserta.dashboard', compact('peserta'));
    }

    public function edit()
    {
        $peserta = Peserta::where('user_id', Auth::id())
            ->first();

        if (!$peserta) {
            $peserta = new Peserta();
            $peserta->nama = Auth::user()->name;
            $peserta->email = Auth::user()->email;
        }

        $skemas = Skema::all();

        return view('peserta.profil', compact(
            'peserta',
            'skemas'
        ));
    }

    public function update(Request $request)
    {
        $peserta = Peserta::where('user_id', Auth::id())
            ->first();

        $validated = $request->validate([
            'nik' => [
                'required',
                'string',
                'digits:16',
                Rule::unique('pesertas', 'nik')
                    ->ignore($peserta?->id),
            ],
            'nama' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string'],
            'skema_id' => [
                'required',
                'exists:skemas,id',
            ],
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 angka.',
            'nik.unique' => 'NIK sudah digunakan peserta lain.',
            'nama.required' => 'Nama lengkap wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'skema_id.required' => 'Silakan pilih skema sertifikasi.',
            'skema_id.exists' => 'Skema sertifikasi tidak valid.',
        ]);

        if (!$peserta) {
            $peserta = new Peserta();
            $peserta->user_id = Auth::id();
        }

        $peserta->fill($validated);
        $peserta->email = Auth::user()->email;
        $peserta->user_id = Auth::id();
        $peserta->save();

        return redirect()
            ->route('peserta.profil.edit')
            ->with('success', 'Data diri berhasil disimpan.');
    }
}
