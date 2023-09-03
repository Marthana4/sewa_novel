<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; 
use Illuminate\Validation\Rule;
use JWTAuth; 
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Models\Novel;
use App\Models\Transaksi;
use Carbon\Carbon;
use DB;
use Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin-dashboard')->with('message', 'Berhasil Login');
            }
            else{
                return redirect('/penyewa-dashboard')->with('message', 'Berhasil Login');
            }
        }

        return redirect()->back()->with('alert', 'Email atau password salah!');
        // try { 
        //     if(! $token = JWTAuth::attempt($credentials)) {
        //         // return response()->json(['error' => 'invalid_credentials'], 400);
        //         return redirect()->back()->with('alert', 'Username atau password salah!');
        //     } 
        // } catch (JWTException $e) {
        //     //   return response()->json(['error' => 'could_not_create_token', 500]);
        //     return redirect()->back()->with('alert', 'Username atau password salah!'); 
        // } 
        //   return response()->json(compact('token'));
        // return redirect('/admin-user')->with('message', 'Berhasil Login');

    }

    public function register(Request $request){
        $validate = Validator::make($request->all(), [
            'nama' => 'required|string|max:500',
            'no_hp' => 'required|numeric|min:11',
            'email' => 'required|string|max:255|unique:users',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:4|'
        ]);

        if($validate->fails()){
            return response()->json($validate->errors()->toJson(), 400);
        }else{
            $data = $request->input();
            try {
                $user = new User;
                $user->nama = $data['nama'];
                $user->no_hp = $data['no_hp'];
                $user->email = $data['email'];
                $user->username = $data['username'];
                $user->password = Hash::make($data['password']);
                $user->role = 'penyewa';
                $user->created_by = 0;
                $user->created_at = Carbon::now();
                $user->updated_by = 0;
                $user->updated_at = null;
                $user->save();

                return redirect('/');
                // $token = JWTAuth::fromUser($user,[
                //     'id' => $user->id,
                //     'role' => $user->role
                // ]);
                // return response()->json(['data'=>[
                //     "message" => 'Data berhasil ditambah',
                //     "token" => $token
                // ]], 200);
            } catch (Exception $e) {
                return redirect()->back()->with('message', 'Data gagal ditambah');
                // return response()->json(['error'=>'Data gagal ditambah'], 500);
            }
        }
    }

    public function dashboard()
    {
        $penyewa=User::where('role', 'penyewa')->count();
        $novel=Novel::count();
        $transaksi=Transaksi::count();
        $novelDetail=Novel::all();

        $user = Auth::user();
            if ($user->role === 'admin') {
                return view('admin.dashboard', compact('penyewa', 'novel', 'transaksi'));
            }
            else{
                return view('penyewa.dashboard', compact('novel', 'transaksi', 'novelDetail'));
            }
    }

    public function logout(Request $req){
        Auth::logout();
        return redirect('/');
        // $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        // return response()->json(['message'=>'Berhasil logout'], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $user= User::where('nama','LIKE','%'.$keyword.'%')
        ->paginate(10);
        return view('admin.user',compact('user','keyword'));
        // return response()->json(['status'=>'Success', 'data'=>['content'=>$user]], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required|string|max:500',
            'no_hp' => 'required|numeric|min:11',
            'email' => 'required|string|max:255',
            'username' => 'required|string',
            'password' => 'required|string|min:4|'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors()->toJson(), 400);
        } else {
            try {
                $data = User::find($id);
                $data->nama = $request->nama;
                $data->no_hp = $request->no_hp;
                $data->email = $request->email;
                $data->username = $request->username;
                $data->password = $request->password;
                $data->updated_by = auth()->user()->id;
                $data->updated_at = Carbon::now();

                $data->update();
                return redirect("/profile/{$id}");
                // return response()->json(['status'=>'success', 'data' => [
                //     'message' => 'Data berhasil di update'
                // ]], 200);
            } catch (Exception $e) {
                return redirect()->back()->with('message', 'Data gagal diupdate');
                // return response()->json(['error'=>'Data gagal di update','message'=>$e], 500);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::where('id', $id)->delete();
        // $status = $data->delete();
        // return redirect('/user');

        if ($data) {
            return response()->json(['status'=>'Data berhasil dihapus']);
        } else {
            return response()->json(['status'=>'Data gagal dihapus']);
        }
    }
}
