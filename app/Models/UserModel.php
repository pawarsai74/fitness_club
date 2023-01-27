<?php

  namespace App\Models;

  use CodeIgniter\Model;

  class UserModel extends Model
  {
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['fullname', 'email', 'password', 'oauth_id', 'role', 'profile_pic'];    
  }

 ?>
