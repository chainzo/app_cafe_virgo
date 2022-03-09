<?php

namespace App\Models;

use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table ='user';

    protected $primarykey = 'id';
    protected $allowedFields = ['nama','username','password','jenis_kelamin','jenis'];
}
?>