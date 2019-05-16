<?php

namespace App\Http\Controllers\Api\Sections\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\ModelFilters\Universal\RoleFilter;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::filter($request->all(), RoleFilter::class)
                    ->paginate($request->page_size);

        return $this->setData($roles)
            ->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = Role::with('permissions','permissionFields')->findOrFail($id);

        /**
         * Remapping role permissions
         */
        //echo json_encode($role->permissions->toArray()); exit;
        $permissions =  $role->permissions->map(function($v){
            $v->name = str_replace('.', '_', $v->name);
            $limitations = empty($v->pivot->limitations)  ? new \stdClass : $v->pivot->limitations;
            return collect(['permission_id' => $v->id, 'limitations' => $limitations, 'name' => $v->name]);

        })->keyBy('name');

        /**
         * Remapping the permission fields
         */
        $permission_fields = $role->permissionFields->map(function($v){
            $v->pivot->_id = $v->pivot->permission_field_id.'_';
            return $v->pivot;

        })->keyBy('_id');

        $permission_fields =  ( $permission_fields->isEmpty() ?  new \stdClass : $permission_fields) ;
        $permissions =  ( $permissions->isEmpty() ?  new \stdClass : $permissions) ;

        $role->setRelation('permissions', $permissions);
        $role->setRelation('permissionFields', $permission_fields);

        $permissions = Permission::with(['permissionGroup' => function ($q) {
            $q->select('id','name');
        },'permissionFields' => function($q) {
            $q->select('permission_id','title','client_field','table_columns','id');
        }])->get();




        return $this->setData([
            'role' => $role,
            'permissions' => $permissions
        ])->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validation($request,$id);

        $role = Role::findOrFail($id);

        $role_data = $request->only(['choosable', 'landing_page', 'name', 'parent_role_id', 'title', 'description','client_ids', 'settings']);

        $role->update($role_data);

        /**
         * Sync Permission with Role
         */
        $permissions = $request->get('permissions', []);
        $permissions = collect($permissions);

        $permission_data = $permissions->values()->map(function($p) {
            $p = collect($p);
            return $p->only('permission_id','limitations');

        })->keyBy('permission_id')->toArray();


        #Sync Permission field with Role.

        $role->permissions()->sync($permission_data);
        $role_permissions = $role->permissions()->get();

        $permission_fields = $request->get('permission_fields', []);
        $permission_fields = collect($permission_fields);

        #Making the data ready for role_permission_fields table

        $permission_fields_data = $permission_fields->values()->map(function($pf) use($role_permissions) {

            $pf = collect($pf);
            $rp = $role_permissions->where('id', $pf->get('permission_id'))->first();

            $pf->put('role_permission_id', ($rp ? $rp->pivot->id : null) );

            return $pf->only('permission_id','permission_field_id', 'authority', 'role_permission_id');

        })->reject(function($pf) {

            return !$pf->get('role_permission_id') ? true : false;
        })
        ->keyBy('permission_field_id')->toArray();

        $role->permissionFields()->sync($permission_fields_data);

        # Deleting Role detail from cache repo.
        \Cache::forget('permission_role_repository_'. $id);

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Validate  the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */

    protected function validation(Request $request,$id=NULL)
    {
        $request->validate([
            'title'                 => ['required','string'],
            'landing_page'          => ['required','string'],
            'description'           => ['required','string'],
        ]);
    }
}
