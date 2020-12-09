<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use BenSampo\Enum\Rules\EnumValue;
use App\Enums\SeperationTray;
use Illuminate\Support\Str;
use Auth;
use Hash;

class AccountController extends Controller
{
    public function index()
    {
        $employee = Auth::guard('management')->user();

        return view('management.account.index', [
            'employee' => $employee,
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $employee = Auth::guard('management')->user();

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
        ]);

        $employee->update($validated);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Profiel is aangepast!');

        return redirect()->back();
    }

    public function passwordUpdate(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'confirmed', 'string'],
        ]);

        $employee = Auth::guard('management')->user();

        if (! Hash::check($request->current_password, $employee->password)) {
            return back()->withErrors([
                'current_password' => ['The provided password does not match our records.']
            ]);
        }

        $employee->password = Hash::make($request->new_password);
        $employee->save();

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Wachtwoord is aangepast!');

        return redirect()->back();
    }
}
