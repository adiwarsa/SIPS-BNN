<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//Mengambil data user yang terbaru berdasarkan created_at
		$users = User::orderByDesc('created_at')->get();
		return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//Mendefinisikan model user
		$user = new User;
		return view('users.create', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//Request input dengan validasi
		$data = $request->validate([
			'name' => 'required|string',
			'email' => 'required|string|email|unique:users',
			'password' => 'required|confirmed',
		]);
		//Request input data tanpa validasi
		$data['password'] = $request->role;
		//inputan password dihash
		$data['password'] = Hash::make($data['password']);
		$data['email_verified_at'] = now();

		//Store request input ke database
		User::create($data);

		return to_route('users.index')->withSuccess('Data berhasil ditambahkan.');
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
	public function edit(User $user)
	{
		return view('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		//Input request dengan validasi
		$request->validate([
			'name' => 'required|string',
			'email' => 'required|string|email|unique:users,email,' . $user->id,
		]);

		//Input request tanpa validasi
		$data['name'] = $request->name;
		$data['role'] = $request->role;

		//jika user memasukkan password maka
		if ($request->password) {
			//inputan password akan dihash
			$data['password'] = Hash::make($request->password);
		}
		$data['email'] = $request->email;

		//update data
		$user->update($data);

		return to_route('users.index')->withSuccess('Data berhasil dirubah.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function delete(User $user)
	{
		//Hapus data user
		$user->delete();
		return to_route('users.index')->withSuccess('Data berhasil dihapus.');
	}
}
