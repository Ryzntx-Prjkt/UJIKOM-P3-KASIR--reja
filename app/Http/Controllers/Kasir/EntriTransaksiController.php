<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class EntriTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoice = mt_rand(1000000, 9999999);
        $menu = Menu::all();
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            $total_harga = 0;
            foreach ($cart as $cr => $item){
                $total_harga += $cart[$cr]['harga'];
            }
            if($request->has('search')){
                $menu = Menu::where('nama_menu', 'LIKE', '%'.$request->search.'%')->get();
                return view('kasir.entri-transaksi.index', compact('menu', 'invoice', 'cart', 'total_harga'));
            } else{
                return view('kasir.entri-transaksi.index', compact('menu', 'invoice', 'cart', 'total_harga'));
            }
        } else{
            if($request->has('search')){
                $menu = Menu::where('nama_menu', 'LIKE', '%'.$request->search.'%')->get();
                return view('kasir.entri-transaksi.index', compact('menu', 'invoice'));
            } else{
                return view('kasir.entri-transaksi.index', compact('menu', 'invoice'));
            }
            return view('kasir.entri-transaksi.index', compact('menu', 'invoice'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return response()->json($menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tambah_ke_keranjang(Request $request){
        $data = $request->all();
        $id_menu = $data['id_menu'];
        $nama_menu = $data['nama_menu'];
        $qty = $data['qty'];
        $harga = $data['harga'];
        $row_id = md5($nama_menu . serialize($qty));
        $data = [
            $row_id = [
                'id_menu' => $id_menu,
                'nama_menu' => $nama_menu,
                'qty' => $qty,
                'harga' => $harga,
                'row_id' => $row_id,
            ]
        ];

        if(!$request->session()->has('cart')){
            $request->session()->put('cart', $data);
        } else {
            $exist = 0;
            $cart = $request->session()->get('cart');

            foreach($cart as $cr => $carts){
                if($cart[$cr]['id_menu'] == $id_menu){
                    $cart[$cr]['qty'] += $qty;
                    $cart[$cr]['harga'] += $harga;
                    $exist++;
                }
            }

            if($exist == 0) {
                $newcart = array_merge_recursive($cart, $data);
                $request->session()->put('cart', $newcart);
                //dd($newcart);
            } else {
                // dd($cart);
                $request->session()->put('cart', $cart);
            }
        }
        return redirect()->back()->with('toast_success', 'Menu berhasil dimasukan ke keranjang!');
    }

    public function hapus_dari_keranjang($row_id, Request $request){

        $newcart = $request->session()->get('cart');

        foreach($newcart as $cr => $carts){
            if($newcart[$cr]['row_id'] == $row_id){
                unset($newcart[$cr]);
            }
        }

        if(count($newcart) == 0){
            $request->session()->forget('cart');
            return redirect()->route('entri-transaksi.index')->with('toast_success','Item berhasil dihapus dari keranjang!');
        } else {
            $request->session()->put('cart', $newcart);
        }

        return redirect()->route('entri-transaksi.index')->with('toast_success','Item berhasil dihapus dari keranjang!');
    }

    public function kosongkan_keranjang(Request $request){
        $request->session()->forget('cart');
        return redirect()->route('entri-transaksi.index')->with('toast_success', 'Keranjang berhasil di kosongkan!');
    }

    public function simpan_transaksi(Request $request){
        $id_user = auth()->user()->id;
        $invoice = $request->get('kode');
        $cart = $request->session()->get('cart');
        $total_harga = 0;
        $total_menu = count($cart);
            foreach ($cart as $cr => $item){
                $total_harga += $cart[$cr]['harga'];
                DetailTransaksi::create([
                    'id_menu' => $cart[$cr]['id_menu'],
                    'qty' => $cart[$cr]['qty'],
                    'harga' => $cart[$cr]['harga'],
                    'invoice' => $invoice,
                ]);
            }
            Transaksi::create([
                'invoice' => $invoice,
                'nama_pelanggan' => $request->get('name_pelanggan'),
                'id_user' => $id_user,
                'total_harga' => $total_harga,
                'total_menu' => $total_menu,
            ]);
            $request->session()->forget('cart');
            return back()->with('toast_success', 'Transaksi berhasil di simpan');
    }
}
