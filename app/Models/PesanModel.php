<?php

namespace App\Models;

use CodeIgniter\Model;
class PesanModel extends Model
{
    protected $table ='pesan';

    protected $primarykey = 'id';
    protected $allowedFields = ['nama','tanggal','nomer_nota','total_harga','nomer_meja','status'];
}
?>