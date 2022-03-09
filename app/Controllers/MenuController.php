<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;
use CodeIgniter\HTTP\Request;

class MenuController extends Controller
{
    /**
     * Instance of the main Request object.
     * 
     * @nav HTTPIncomingRequest
     */
    protected $request;
    function __construct()
    {
        $this->menus = new MenuModel();
    }
    public function tampil()
    {
        #code...
        //$menus = new MenuController();
        $data['data'] = $this->menus->findAll();
        return view('menu',$data);
    }
    public function create()
    {
        #code...
        $data=array(
            'nama'=>$this->request->getPost('nama'),
            'harga'=>$this->request->getPost('harga'),
            'jumlah'=>$this->request->getPost('jumlah'),
            'keterangan'=>$this->request->getPost('keterangan'),
            'jenis'=>$this->request->getPost('jenis'),
        );
        $this->menus->insert($data);
        return redirect('menu')->with('success',"data berhasil disimpan");
    }
    public function edit($id)
    {
        #code...
        $data=array(
            'nama'=>$this->request->getPost('nama'),
            'harga'=>$this->request->getPost('harga'),
            'jumlah'=>$this->request->getPost('jumlah'),
            'keterangan'=>$this->request->getPost('keterangan'),
            'jenis'=>$this->request->getPost('jenis'),
        );
        $this->menus->update($id,$data);
        return redirect('menu')->with('success',"data berhasil disimpan");
    }
    public function show($id)
    {
        #code...
    }
    public function delete($id)
    {
        $this->menus->delete($id);
        return redirect('menu')->with('success',"data berhasil dihapus");
    }
}
?>