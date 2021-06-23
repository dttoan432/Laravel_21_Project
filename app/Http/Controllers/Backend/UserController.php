<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',User::class);
        $users = User::orderBy('role', 'ASC')->get();
        return view('backend.users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',User::class);
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create',User::class);
        $data = $request->except('_token');
        $data['password'] = bcrypt($request->get('password'));
        $user = User::create($data);

        if ($user){
            return redirect()->route('backend.user.index')->with("success",'Tạo mới thành công');
        }
        return redirect()->route('backend.user.index')->with("error",'Tạo mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $this->authorize('view', $user);

        return view('backend.users.show')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('backend.users.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->except('_token');
        $user = User::find($id);
        $this->authorize('update', $user);

        if ($data['password'] == null){
            $data['password'] = $user->password;
        } else {
            $data['password'] = bcrypt($request->get('password'));
        }
        $user->update($data);

        if ($user){
            return redirect()->route('backend.user.index')->with("success",'Thay đổi thành công');
        }
        return redirect()->route('backend.user.index')->with("error",'Thay đổi thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        if ($user){
            return redirect()->route('backend.user.index')->with("success",'Xóa thành công');
        }
        return redirect()->route('backend.user.index')->with("error",'Xóa thất bại');
    }
}
