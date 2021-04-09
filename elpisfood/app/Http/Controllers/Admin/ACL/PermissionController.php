<?php

namespace App\Http\Controllers\Admin\ACL;
use App\models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->paginate();
        return view('admin.pages.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        //dd($request->all());
        $this->repository->create($request->all());

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$permissions = $this->repository->find($id))
        {
            return redirect()->back();
        }
        return view('admin.pages.permissions.show',compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$permissions = $this->repository->find($id))
        {
            return redirect()->back();
        }
        return view('admin.pages.permissions.edit',compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermission $request, $id)
    {
        if(!$permissions = $this->repository->find($id))
        {
            return redirect()->back();
        }
        $permissions->update($request->all());

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$permissions = $this->repository->find($id)){
            return redirect()->back();
        }
        $permissions->delete();

        return redirect()->route('permissions.index');
    }
    public function search(StoreUpdatePermission $request)
    {
        $filters = $request->only('filter');
        $permissions = $this->repository
                                    ->where(function($query) use ($request)
                                    {
                                        if($request->filter)
                                        {
                                            $query->where('name',$request->filter)
                                                  ->orWhere('description','LIKE',"%{$request->filter}%");
                                        }
                                    })
                                    ->paginate();
        return view('admin.pages.permissions.index',compact('permissions','filters'));
    }
}
