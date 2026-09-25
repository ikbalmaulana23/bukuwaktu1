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
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'birth_date' => 'nullable|date',
        ]);

        auth()->user()->personalData()->updateOrCreate(
            ['user_id' => auth()->id()],
            $request->only([
                'full_name',
                'phone',
                'address',
                'city',
                'birth_date',
            ])
        );

        return back()->with('success', 'Data pribadi berhasil disimpan.');
    }
}
