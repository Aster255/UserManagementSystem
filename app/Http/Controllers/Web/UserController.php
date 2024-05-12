<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return Inertia::render('User/Index', ['users' => $users]);
    }

    public function create()
    {
        return Inertia::render('User/Create');
    }

    public function store(StoreUserRequest $request)
    {
        $request->validated($request->all());

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('users.index'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return Inertia::render('User/Show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return Inertia::render('User/Edit', ['user' => $user]);
    }

    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $this->fillMissingData($request->validated(), $user);
        $user->update($data);

        return redirect(route('users.show', ['user_id' => $id]), );
    }

    private function fillMissingData($data, $user)
    {
        $fields = [
            'first_name',
            'last_name',
            'address',
            'postal_code',
            'phone_number',
            'username',
            'email',
        ];
        foreach ($fields as $field) {
            if (empty($data[$field])) {
                $data[$field] = $user->{$field};
            }
        }
        return $data;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        return Inertia::render('User/Delete', ['user' => $user]);
    }

    public function destroy(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = User::findOrFail($id);

        $user->tokens()->delete();

        $user->delete();
        return redirect(route('users.index'));
    }

    public function deleteMultiple()
    {
        return Inertia::render('User/DeleteMultiple');
    }

    public function destroyMultiple(Request $request)
    {

        $request->validate([
            'password' => ['required', 'current_password'],
            'user_ids' => ['array']
        ]);

        $userIds = $request->input('user_ids', []);

        $deletedIds = [];
        $notFoundIds = [];
        foreach ($userIds as $userId) {
            try {
                $user = User::findOrFail($userId);
                $user->tokens()->delete();
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
