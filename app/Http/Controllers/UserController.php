<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Transformers\UserTransformer;
class UserController extends Controller
{
    //
    public function users(User $user)
    {
        $users = $user->all();
        //return response()->json($users);
        return fractal()
            ->collection($users)
            ->transformWith(new UserTransformer)
            ->toArray();
    }

    public function profileById(User $user, $id)
    {
        //$users = $user->find(Auth::user()->id);
        //return response()->json($users);
        $users = $user->find($id);
        return fractal()
            ->item($users)
            ->transformWith(new UserTransformer)
            ->includePosts()
            ->toArray();
    }
}
