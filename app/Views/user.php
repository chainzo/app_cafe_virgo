<?= $this->extend("layouts/admin")?>
<?= $this->section("content")?>
<?php
    if (session()->getFlashdata('success')){
        ?>
        <div class="alert alert-succes alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success')?>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">Close</button>
    </div>
    <?php
    }
    ?>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addUser">Tambah User</button>
    <table class="table table-stripped table-hover">
    <thead>
        <th>no</th> 
        <th>nama</th> 
        <th>username</th>  
        <th>jenis_kelamin</th> 
        <th>jenis</th>
    
    </thead>
    <tbody>
        <?php
        $no =1;
        foreach($data as $row):
        
        ?>
        <tr>
            <th><?=$no?></th>
            <th><?=$row['nama']?></th>
            <th><?=$row['username']?></th>
            <th><?=$row['jenis_kelamin']?></th>
            <th><?=$row['jenis']?></th>
            
            <td>
                <button class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editUser-<?=$row['id']?>">Edit</a>
                <a href="<?= base_url ('user/delete/'.$row['id'])?>" onclick="return confirm('yakin mau hapus')"class="btn btn-danger btn-sm btn-delete">delete</a>
            </td>            
        </tr>
<div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" aria-labelledby="example" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-tittle" id="example">Edit User</h3>
                <button class="close" data-dismiss="modal" aria-label="close"></button>
            </div>
            <form action="<?=base_url('user/edit/'.$row['id'])?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" id="nama" placeholder="inputkan nama" value="<?=$row['nama']?>">
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" id="username" placeholder="inputkan username" value="<?=$row['username']?>">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="number" name="password" id="password" class="form-control" id="password" placeholder="inputkan password" value="<?=$row['password']?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="<?=$row['jenis_kelamin']?>">
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis User</label>
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="manajer">Manager</option>
                        <option value="kasir">Kasir</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">delete</button>
                    <button type="submit" class="btn btn-primary">Save</buttton>
                </div>
              </form>
        </div>
    </div>
</div>
        <?php
        $no++;
        endforeach;
        ?>
        </tbody>
    </table>
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="example" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example">Tambah User</h5>
                <button class="close" data-dismiss="modal" aria-label="close"></button>
            </div>
            <form action="<?= base_url('user')?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="inputkan nama">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="inputkan username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control"  id="password" placeholder="inputkan password">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" >
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis User</label>
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="manajer">Manager</option>
                        <option value="kasir">Kasir</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-primary">Save</buttton>
                </div>
              </form>
        </div>
    </div>
</div>
<?=$this->endSection()?>
