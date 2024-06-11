<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laptop;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home()
    {
        return view("home",["key" => "home"]);
    }

    public function laptop()
    {
        $laptop = Laptop::orderBy("id","desc")->get();
        return view("laptop",["key" => "laptop", "lp" => $laptop]);
    }
    public function keranjang()
    {
        return view("keranjang",["key" =>"keranjang"]);
    }
    public function about()
    {
        return view("about",["key" =>"about"]);
    }

    public function formaddlaptop()
    {
        return view("form-add",["key" => "laptop"]);
    }
    public function formeditlaptop($id)
    {
        $laptop = laptop::find($id);
        return view("form-edit",["key" => "laptop", "mv" =>$laptop]);
    }

    public function savelaptop(Request $request)
    {
       $file_name = time()."-".$request->file("gambar")->getClientOriginalName();
       $path = $request->file("gambar")->storeAs('gambar', $file_name, 'public');

       Laptop::create([
        'Merek' => $request->Merek,
        'Nama' => $request->Nama,
        'Tahun' => $request->Tahun,
        'Spek' => $request->Spek,
        'Harga' => $request->Harga,
        'gambar' => $path
       ]);

       return redirect('/laptop')->with('alert','Data Berhasil di Simpan');
    }
    public function updatelaptop($id, Request $request)
    {
        $laptop = laptop::find($id);
        $laptop -> Merek = $request ->Merek;
        $laptop -> Nama = $request ->Nama;
        $laptop -> Tahun = $request ->Tahun;
        $laptop -> Spek = $request ->Spek;
        $laptop -> Harga = $request ->Harga;

        if($request -> gambar)
        {
            if($laptop->gambar)
            {
                Storage::disk('public')->delete($laptop ->gambar);
            }

            $file_name = time()."-".$request->file("gambar")->getClientOriginalName();
            $path = $request->file("gambar")->storeAs('gambar', $file_name, 'public');
            $laptop->gambar= $path;
        }
        $laptop -> save();
        return redirect('/laptop')->with('alert','Data Berhasil di Update');
    }

    public function deletelaptop($id)
    {
        $laptop = laptop::find($id);
        if($laptop ->gambar)
        {
            Storage::disk('public')->delete($laptop->gambar);
        }
        $laptop->delete();

        return redirect('/laptop')->with('alert','Data Berhasil di Hapus');
    }

    public function login()
    {
        return view("login");
    }

    public function formedituser()
    {
        return view("formedituser",["key" =>""]);
    }

    public function updateuser(Request $request)
    {
        if ($request->password_baru == $request->konfirmasi_password) 
        {
            $user = Auth::user();
    
            if (Hash::check($request->password_lama, $user->password)) 
            {
                $user->password = Hash::make($request->password_baru);
                $user->save();
    
                return redirect("/user")->with("info", "Password berhasil diubah");
            } 
            else 
            {
                return redirect("/user")->with("info", "Password lama tidak cocok");
            }
        } 
        else 
        {
            return redirect("/user")->with("info", "Konfirmasi password tidak sesuai");
        }
    }
}
 