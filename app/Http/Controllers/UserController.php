<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$this->cekRole();
			$dataUser = User::orderBy('role', 'ASC')->get();
			return view('user.index', compact('dataUser'));
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$this->cekRole();
			return view('user.create');
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$this->cekRole();
			$this->validate($request, [
				'name' => 'required|string',
				'email' => 'required|string|unique:users,email',
				'password' => 'required|string|confirmed',
			]);

			try {
				$user = User::firstOrCreate([
					'name' => $request->name,
					'email' => $request->email,
					'password' => bcrypt($request->password),
					'role' => $request->role,
				]);

				session()->flash('status', 'Berhasil Menambah Pengguna !');
				return redirect(route('user.index'));
			} catch (\Exception $e) {
				return redirect()->back();
			}
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
				try {
					$this->cekRole();
					$user = User::findOrFail($id);
					return view('user.edit', compact('user'));
				} catch (\Exception $e) {
					return redirect()->back();
				}
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
			try {
				$user = User::findOrFail($id);

				$this->validate($request, [
					'name' => 'required|string',
					'email' => 'required|string|unique:users,email,'.$user->id,
					'password' => 'nullable|string|confirmed',
				]);

				if ($request->password != null) {
					$password = bcrypt($request->password);
				} else {
					$password = $user->password;
				}

				$user->update([
					'name' => $request->name,
					'email' => $request->email,
					'password' => $password,
					'role' => $request->role,
				]);
				
				session()->flash('status', 'Data Pengguna di-Ubah !');
				return redirect(route('user.index'));
			} catch (\Exception $e) {
				dd($e);
				return redirect()->back();
			}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			try {
			$user = User::findOrFail($id);
			$user->delete();

			session()->flash('status', 'Data Pengguna di-Hapus !');
			return redirect(route('user.index'));
		} catch (\Exception $e) {
			return redirect()->back();
		}
		}
		
		public function cekRole()
		{
			$user = Auth::user()->role;
			if ($user != 'admin') {
				return abort(404);
			}
		}
}
