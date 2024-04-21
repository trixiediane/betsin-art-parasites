<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Assuming you're using Laravel's authentication
        return view('user/index', compact('user'));
    }

    public function getUserDetails()
    {
        // https://laravel.com/docs/10.x/eloquent-relationships#eager-loading-specific-columns
        $user = auth()->user()->only('id', 'name', 'username');

        return response()->json($user);
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
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['text' => 'Successfully retrieved user information.', 'data' => $user, 'status' => 200]);
        } catch (Exception $e) {
            return response()->json(['text' => 'There is an error getting user information.', 'error' => $e->getMessage(), 'status' =>  400]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['text' => 'Successfully retrieved user information.', 'data' => $user, 'status' => 200]);
        } catch (Exception $e) {
            return response()->json(['text' => 'There is an error getting user information.', 'error' => $e->getMessage(), 'status' =>  400]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048', // Adjust file size and types as needed
        ]);

        try {
            $user = User::findOrFail($id);
            $user->bio = $request->bio;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarPath = $avatar->store('avatars', 'public'); // Store the file in the 'avatars' directory within the 'public' disk
                $user->avatar = $avatarPath;
            }

            $user->save();

            return response()->json(['text' => 'Successfully updated user information.', 'data' => $user, 'status' => 200]);
        } catch (Exception $e) {
            return response()->json(['text' => 'There is an error updating the user information.', 'error' => $e->getMessage(), 'status' => 400]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
