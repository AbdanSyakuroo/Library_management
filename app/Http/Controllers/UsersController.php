<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan hanya pengguna dengan role 'anggota' dari kolom 'role'
        $users = User::where('role', 'anggota')->get();  // 'anggota' adalah nilai role
        
        return view('users.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          // Menampilkan hanya pengguna dengan role 'admin' dari kolom 'role'
          $admins = User::where('role', 'admin')->get();  // 'anggota' adalah nilai role
        
          return view('users.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'anggota',
        ]);

        return redirect('users');
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
        $usersy = User::findOrFail($id);
        return view('users.edit', compact('usersy'));
    }

    /**
     * Update the specified resource in storage.
     */
    
public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|min:8',
        'role' => 'required|in:admin,anggota',
    ]);

    // Temukan user berdasarkan ID
    $user = User::findOrFail($id);

    // Update data
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        'role' => $request->role,
    ]);
    

    return redirect('users')->with('success', 'User berhasil diperbarui.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('users');
    }
}
