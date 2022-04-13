<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceApiController extends Controller
{
    public function create(Request $request)
    {
        if (
            ! $request->has('name') &&
            ! $request->has('user_id')
        ) {
            return 'error';
        }

        $workspace = new Workspace();
        $workspace->name = $request->name;
        $workspace->user_id = $request->user_id;

        if ($request->has('emoji_id'))
            if ($request->emoji_id != '')
                $workspace->emoji_id = $request->emoji_id;

        $workspace->save();

        return $workspace;
    }

    public function change(Request $request)
    {
        if (
            ! $request->has('name') &&
            ! $request->has('id')
        ) {
            return 'error';
        }

        $workspaces = new Workspace();
        $workspace = $workspaces->find($request->id);

        $workspace->name = $request->name;

        if ($request->has('emoji_id'))
            if ($request->emoji_id != '')
                $workspace->emoji_id = $request->emoji_id;

        $workspace->save();
    }

    public function delete(Request $request)
    {
        if (! $request->has('id'))
            return 'error';

        $workspaces = new Workspace();
        $workspace = $workspaces->find($request->id);
        $workspace->delete();

    }

}
