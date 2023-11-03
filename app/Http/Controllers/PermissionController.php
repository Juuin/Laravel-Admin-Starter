<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function createRole(Request $request): RedirectResponse
    {
        if (!Auth::user()->hasPermissionTo('Create Role')) {
            return back()->with('error', '权限不足');
        }

        $validated = $request->validate([
            'name' => ['required', 'unique:roles'],
            'permissions' => ['required']
        ]);

        $role = Role::create(['name' => $validated['name']]);

        $role->syncPermissions($validated['permissions']);

        return back();
    }

    public function permissions()
    {
        // TODO
        $permissions = Auth::user()->permissions();
    }
}
