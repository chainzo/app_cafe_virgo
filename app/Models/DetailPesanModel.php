<?php
namespace App\Models;

use CodeIgniter\Model;

class DetailPesanModel extends Model{
    protected $table = 'detailpesan';
    // uncoment below if you want add primary key
    protected $primarykey ='id';
    protected $allowedFields = ['id_pesan','id_menu','jumlah'];
}
?>