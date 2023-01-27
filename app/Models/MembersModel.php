<?php

  namespace App\Models;

  use CodeIgniter\Model;

  class MembersModel extends Model
  {

    protected $table = 'tbl_membership';
    protected $primaryKey = 'id';
    protected $allowedFields = ['file', 'fullname', 'email','password','mobile', 'age', 'date', 'expire_date', 'current_weight', 'desired_weight', 'batch', 'fees', 'gender', 'trainer'];

  }

 ?>
