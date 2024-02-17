<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function updatePassword(UpdatePasswordRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            if (Hash::check($request->old_password, $user->password)) {

                if ($request->new_password === $request->confirm_password) {
                    $user->update([
                        'password' => $request->new_password,
                    ]);

                    return response()->json(['text' => 'Password updated successfully', 'status' => 200]);
                } else {
                    return response()->json(['text' => 'New password and confirm password do not match', 'status' => 400]);
                }
            } else {
                return response()->json(['text' => 'Old password does not match', 'status' => 400]);
            }
        } catch (Exception $e) {
            return response()->json(['text' => 'There is an error updating the password.', 'error' => $e->getMessage(), 'status' => 400]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
