<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('admin.pegawai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => "required|email|unique:users,email|string|max:255",
            'name' => "required|string|max:255",
            'username' => "required|string|max:255",
            'password' => "required|string|min:8|confirmed",
            'no_telp' => "required|numeric",
            'role' => "required"
        ]);

        if($validator->fails()){
            return redirect()->back()->with('toast_error', $validator->errors()->all())->withInput();
        }

        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'no_telp' => $data['no_telp'],
            'role' => $data['role'],
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('admin.pegawai.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.pegawai.edit', compact('data'));
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
        $data = $request->all();
        $user = User::findOrFail($id);
        $validator = Validator::make($data, [
            'email' => "required|email|string|max:255",
            'name' => "required|string|max:255",
            'username' => "required|string|max:255",
            'no_telp' => "required|numeric",
            'role' => "required"
        ]);

        if($validator->fails()){
            return redirect()->back()->with('toast_error', $validator->errors()->all())->withInput();
        }

        if($request->filled('password')){
            $validator = Validator::make($data, [
                'password' => "required|string|min:8|confirmed",
            ]);

            if($validator->fails()){
                return redirect()->back()->with('toast_error', $validator->errors()->all())->withInput();
            }
            $user->update([
                'password' => Hash::make($data['password']),
            ]);
        }

        $user->update([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'no_telp' => $data['no_telp'],
            'role' => $data['role'],
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        // return response()->json([
        //     'message' => 'Data sukses di hapus'
        // ]);
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil dihapus!');
    }
}
