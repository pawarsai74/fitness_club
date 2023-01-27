<?php

  namespace App\Models;

  use CodeIgniter\Model;

  class BlogsModel extends Model
  {
    protected $table = 'tbl_blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['bloger_name', 'title', 'img', 'description', 'details', 'date'];
  }

 ?>
