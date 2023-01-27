<?php

  namespace App\Models;

  use CodeIgniter\Model;

  class LoginModel extends Model
  {
    protected $table = 'tbl_sociallogin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullname', 'mobile', 'email', 'profile_pic', 'desired_weight', 'current_weight', 'oauth_id', 'age', 'gender', 'fees', 'batch', 'trainer'];
  }

 ?>
