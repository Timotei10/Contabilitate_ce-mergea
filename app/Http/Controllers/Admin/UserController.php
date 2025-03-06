<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Preia toți utilizatorii din baza de date
        return view('admin.users', compact('users')); // Trimite datele către view
    }

    public function store(Request $request)
    {
        // Validare date
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Creare utilizator client
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',  // Setăm rolul la "client"
        ]);

        // Redirecționare către lista de utilizatori cu un mesaj de succes
        return redirect()->route('admin.users')->with('success', 'Clientul a fost adăugat cu succes!');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Găsește utilizatorul după ID
        return view('admin.edit', compact('user')); // Trimite utilizatorul către view-ul de editare
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Găsește utilizatorul după ID
        $user->update($request->all()); // Actualizează utilizatorul cu datele din formular

        return redirect()->route('admin.users')->with('success', 'Utilizatorul a fost actualizat!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Șterge utilizatorul

        return redirect()->route('admin.users')->with('success', 'Utilizatorul a fost șters!');
    }
}
