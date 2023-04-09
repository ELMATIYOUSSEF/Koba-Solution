<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $role = Role::orderBy('id')->get();

        return response()->json([
            'status' => 'success',
            'Role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission_ids);
      
        return response()->json([
            'status' => true,
            'message' => "role Created successfully!",
            'role' => $role
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
        $role = Role::find($role);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        return response()->json($role, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permission_ids);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        return response()->json([
            'status' => true,
            'message' => "Role Updated successfully!",
            'Role' => $role
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (!$role) {
            return response()->json([
                'message' => 'role not found'
            ], 404);
        }

        $role->delete();

        return response()->json([
            'status' => true,
            'message' => 'role deleted successfully'
        ], 200);
    }
}
