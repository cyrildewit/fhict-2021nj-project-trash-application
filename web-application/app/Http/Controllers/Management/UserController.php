<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(25);

        return view('management.user.index', [
            'users' => $users,
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'nfc_uid' => 'required|string',
        ]);

        $user = new User();
        $user->fill($validated);
        $user->password = Hash::make($request->password);
        $user->uuid = Str::uuid();
        $user->save();

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Succesvol gebruiker aangemaakt!');

        return redirect()->route('management.user.show', ['uuid' => $user->uuid]);
    }

    public function show(string $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        abort_unless($user, 404);

        return view('management.user.show', [
            'user' => $user,
        ]);
    }

    public function edit(string $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        abort_unless($user, 404);

        return view('management.user.edit', [
            'user' => $user,
        ]);
    }

    public function create()
    {
        return view('management.user.create');
    }

    public function update(Request $request, string $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        abort_unless($user, 404);

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'nfc_uid' => 'required|string',
        ]);

        $user->update($validated);

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Succesvol gebruiker bijgewerkt!');

        return redirect()->back();
    }

    public function updateAvatar(Request $request, string $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        abort_unless($user, 404);

        $validated = $request->validate([
            'avatar' => 'required',
        ]);

        $user
            ->addFromMediaLibraryRequest($request, 'avatar')
            ->toMediaCollection('avatar');

        $request->session()->flash('status', 'success');
        $request->session()->flash('message', 'Succesvol profielfoto bijgewerkt!');

        return redirect()->back();
    }
}
