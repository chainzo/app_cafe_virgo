<?php

namespace App\Controllers;

use App\models\MenuModel;
use App\models\PesanModel;
use App\models\DetailPesanModel;
use CodeIgniter\Controller;
//use CodeIgniter\HTTP\Request;

class PesanController extends Controller
{
    /**
     * Instance of the main Request object.
     * 
     * @nav HTTPIncomingRequest
     */
    protected $request;
    
    function __construct()
    {
        $this->menu = new MenuModel();
        $this->session = session();
        $this->pesan = new PesanModel();
        $this->detailpesan = new DetailPesanModel();
    }
    public function index()
    {
        //$pesan= new PesanModel();
        $data['data'] = $this->menu->select('id,nama')->findAll();

        if(session ('cart') != null) {
            $data['menu'] = array_values(session('cart'));
        }else{
            $data['menu'] = null;
        }
        return view("pesan", $data);
        }
        public function addCart()
        {
            $id = $this->request->getPost('id_menu');
            $jumlah = $this->request->getPost('jumlah');
            $men = $this->menu->find($id);
            if($men)
            {
            }
            // print_r($id);
            $isi = array(
                'id_menu' => $id,
                'nama' => $men['nama'],
                'harga' => $men['harga'],
                'jumlah' =>$jumlah,
            );

            if ($this->session->has('cart')) {
                $index = $this->cek($id);
                $cart = array_values(session('cart'));
                if ($index == -1)   {
                    array_push($cart,$isi);
                } else{
                    $cart[$index]['jumlah'] += $jumlah;
                }
                $this->session->set('cart', $cart);
            }else{
                $this->session->set('cart', array($isi));
            }
            return redirect('pesan')->with('success',"DATA BERHASIL DI TAMBAHKAN".$men ['nama']);
        }
        public function cek($id)
        {
            $cart = array_values(session('cart'));
            for ($i = 0; $i < count($cart); $i++){
                if ($cart[$i]['id_menu'] == $id){
                    return $i;
                }
            }
            return -1;
        }

        public function hapusCart($id)
        {
            $index = $this->cek ($id);
            $cart= array_values (session('cart'));
            unset ($cart[$index]);
            $this->session->set('cart',$cart);
            return redirect('pesan')->with('succes',"DATA BERHASIL DIHAPUS");    
        }
        public function simpan()
        {
            if (session('cart') != null){
                $mpesan = array(
                    'id_user' => '23',
                    'tanggal' => date('y/m/d'),
                    'nama' => $this->request->getPost('nama'),
                    'no_meja' => $this->request->getPost('no_meja'),
                    'status' => 'dibayar',
                    'total_harga' => '0'
                );
                $id = $this->pesan->insert($mpesan);
                $cart = array_values(session('cart'));
                $tharga = 0;
                foreach ($cart as $val) {
                    $dpesans = array(
                        'id_pesan' => $id,
                        'id_menu' => $val['id_menu'],
                        'jumlah' => $val['jumlah'],
                        'harga' => $val['harga']
                    );
                    $tharga += $val['jumlah'] * $val['harga'];
                    $this->detailpesan->insert($dpesans);
                }
                $dtharga = array(
                    'total_harga' => $tharga,
                );
                $this->pesan->update($id,$dtharga);
                $this->session->remove('cart');
                return redirect('pesan')->with('success','pesanan berhasil disimpan');   
            }
        }
    }
    