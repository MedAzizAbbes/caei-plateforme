<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankSetting;
use Illuminate\Http\Request;

class BankSettingController extends Controller
{
    public function edit()
    {
        $setting = BankSetting::first() ?? new BankSetting();
        return view('admin.bank-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'bank_name' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'account_holder' => 'nullable|string|max:255',
            'iban' => 'nullable|string|max:255',
            'rib' => 'nullable|string|max:255',
            'swift_code' => 'nullable|string|max:255',
            'currency' => 'required|string|in:TND,EUR,USD',
        ]);

        $setting = BankSetting::first() ?? new BankSetting();
        $setting->fill($validated);
        $setting->save();

        return back()->with('success', 'Les paramètres bancaires ont été mis à jour avec succès.');
    }
}
