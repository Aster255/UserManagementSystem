<?php

namespace App\Http\Controllers\Web;

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


}
