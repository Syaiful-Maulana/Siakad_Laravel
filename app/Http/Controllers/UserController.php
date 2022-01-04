<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $users = User::where('name', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $users = User::paginate(5);
        }
        
        // $users = DB::table('users')->get();
        return view('Master.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')->get();
        return view('Master.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|min:6',
        ],
        [
            'name.required' => 'Username Tidak Boleh Kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $users = new User;
        $users-> name = $request->name;
        $users-> level = 'admin';
        $users-> email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();


        return redirect('admin')->with('status', 'Data Amin Berhasil Di Tambah');
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
        $users =  DB::table('users')->where('id', $id)->first();

        // return $users;
        return view('Master.edit', compact('users'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|min:6',
        ],
        [
            'name.required' => 'Username Tidak Boleh Kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);
        $users =  DB::table('users')->where('id', $id)
                 ->update([
                        'name' => $request->name,
                        'level'     => 'admin',
                        'email' => $request->email,
                        'password'   => bcrypt($request->password)
        ]);
        return redirect('admin')->with('status', 'Data AminBerhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('admin')->with('status', 'Data Berhasil Di Hapus');
    }
}
