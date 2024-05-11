<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserResource::collection(
            User::paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return new UserResource($user);
        } catch (ModelNotFoundException $e) {
            return $this->error(null, 'User not found', 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return new UserResource($user);
        } catch (ModelNotFoundException $e) {
            return $this->error(null, 'User not found', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return $this->success(null, "Deleted successfully", 200);
        } catch (ModelNotFoundException $e) {
            return $this->error(null, 'User not found', 404);
        }
    }

    public function destroyMultiple(Request $request)
    {
        $userIds = $request->input('user_ids', []);
        if (empty($userIds)) {
            return $this->error(null, 'No user IDs provided', 400);
        }

        $deletedIds = [];
        $notFoundIds = [];
        foreach ($userIds as $userId) {
            try {
                $user = User::findOrFail($userId);
                $user->delete();
                $deletedIds[] = $userId;
            } catch (ModelNotFoundException $e) {
                $notFoundIds[] = $userId;
            }
        }

        $response = [
            'success' => [
                'deleted_ids' => $deletedIds
            ],
            'errors' => [
                'not_found_ids' => $notFoundIds
            ]
        ];

        return response()->json($response, 200);
    }
}
