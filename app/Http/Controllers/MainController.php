<?php

namespace App\Http\Controllers;

use App\Models\Emoji;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class MainController extends Controller
{

    public function main()
    {
        if (Auth::check())
        {
            $users = new User();
            $workspaces = new Workspace();
            $tasks = new Task();
            $statuses = new Status();
            $emoji = new Emoji();

            $user = $users->find(Auth::id());

            return view('main', [
                'user' => $user,
                'workspaces' => $user->workspaces()->get(),
                'statuses' => $statuses->all(),
                'emojis' => $emoji->all(),
            ]);
        }

        return view('welcome');
    }

    public function authorization(Request $request)
    {
        if (!$request->has('data') && !$request->has('remember')) {
            return 'error';
        }

        $users = new User();

        $get = $request->all();

        $userData = explode("|", json_decode($get['data']));

        $id = base64_decode($userData[0]);
        $pass = $userData[1];
        $remember = $get['remember'];

        $user = $users->find($id);

        if ($user == null)
            return 'error';

        if ($pass != $user['password'])
            return 'error';

        Auth::login($user, $remember);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
