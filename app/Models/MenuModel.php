<?php

namespace App\Models;

use CodeIgniter\Model;
class MenuModel extends Model
{
    protected $table ='menu';

    protected $primarykey = 'id';
    protected $allowedFields = ['nama','harga','jumlah','keterangan','jenis'];
}
?>