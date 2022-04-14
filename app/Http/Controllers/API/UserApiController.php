<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{

    public function login(Request $request)
    {
        if (!$request->has('email') && !$request->has('password')) {
            return 'error';
        }

        $data = $request->only(['email', 'password']);

        $email = $data['email'];
        $pass = $data['password'];

        if (! DB::table('users')->where('email', $email)->exists()) {
            return 'data is not correct';
        }

        $user = DB::table('users')
            ->where('email', $email)
            ->first();

        if (! password_verify($pass, $user->password))
        {
            return 'data is not correct';
        }

        return json_encode(base64_encode($user->id) . '|' . $user->password);
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails())
            return json_encode($validator->errors());

        event(new Registered($user = $this->create($validator->validated())));

        $idWorkspace = $this->createWorkspaces($user);
        $this->createTasks($idWorkspace);

        return 'success|' . json_encode(base64_encode($user->id) . '|' . $user->password);;
    }

    public function updateEmoji(Request $request)
    {
        if (
            ! $request->has('id') &&
            ! $request->has('emoji_id')
        ) {
            return 'error';
        }

        $users = new User();
        $user = $users->find($request->id);
        $user->emoji_id = $request->emoji_id;
        $user->save();
    }

    public function resetPassword(Request $request)
    {
        if (
            ! $request->has('email') &&
            ! $request->has('_token')
        ) {
            return 'error';
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status;
    }

    private function createWorkspaces($user)
    {
        $workspace = new Workspace();
        $workspace['name'] = 'Task List';
        $workspace['emoji_id'] = '6';
        $workspace['user_id'] = $user->id;
        $workspace->save();
        $id = $workspace['id'];

        $workspace = new Workspace();
        $workspace['name'] = 'Home';
        $workspace['emoji_id'] = '7';
        $workspace['user_id'] = $user->id;
        $workspace->save();

        $workspace = new Workspace();
        $workspace['name'] = 'Work';
        $workspace['emoji_id'] = '8';
        $workspace['user_id'] = $user->id;
        $workspace->save();

        return $id;
    }

    private function createTasks($id)
    {
        $task = new Task();
        $task['header'] = 'Do something';
        $task['text'] = 'Do something';
        $task['status_id'] = '1';
        $task['workspace_id'] = $id;
        $task->save();
    }

    protected function create(array $data)
    {
        $user = (new User())->forceFill([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->save();

        return $user;
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function username()
    {
        return 'email';
    }
}
