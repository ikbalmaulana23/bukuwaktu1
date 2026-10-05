<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalDataController extends Controller
{
    public function edit()
    {
        $data = auth()->user()->personalData;

        return view('personal-data.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'genre' => 'nullable|array',
            'genre.*' => 'string',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
        ]);

        $genre = $request->genre
            ? implode(', ', $request->genre)
            : null;

        auth()->user()->personalData()->updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'full_name' => $request->full_name,
                'genre' => $genre,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'city' => $request->city,
            ]
        );



        return redirect('/')
            ->with('pesan', 'berhasil simpan data');
    }
}
