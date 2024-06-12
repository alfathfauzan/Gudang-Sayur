<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Keranjang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    

    

    public function create()
    {
        return view('tambahalamat');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $validatedData = $request->validate([
            'nama_alamat' => ['required', 'string', 'max:255'],
            'nama_penerima' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:30'],
            'state' => ['required', 'string', 'max:30'],
            'zip_code' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:500'],
        ]);

        $validatedData['user_id'] = $userId;

        

        Alamat::create($validatedData);
        return redirect('/alamat',)->with('success', 'Create Address Sucessfull! ');

    }

    public function edit($id)
    {
        $alamat = Alamat::findOrFail($id);

        return view('editalamat', compact('alamat'));
    }

    public function update(Request $request, $id)
    {
        $alamat = Alamat::findOrFail($id);

        $alamat->update($request->all());

        return redirect()->route('alamat')->with('success', 'Address updated successfully');
    }


    public function destroy($id)
    {
        $alamat = Alamat::findOrFail($id);

        $alamat->delete();

        return redirect()->route('alamat')->with('success', 'Address deleted successfully');
    }




}
