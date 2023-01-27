<?php

namespace App\Controllers;
use App\Models\BlogsModel;
use App\Models\ContactModel;
use App\Models\SettingModel;
use App\Models\UserModel;

class Blogs extends BaseController
{
  public function index()
  {
    $error = [];
    $validation = $this->validate([
      'title' => 'required',
      'date' => 'required',
      'description' => 'required',
      'details' => 'required'
    ]);
    if ($this->request->getMethod() =='post') {
      if ($validation) {
        $blogs = new BlogsModel();
        $bloger_name = session()->fullname;
        $title = $this->request->getPost('title');
        $img = $this->request->getFile('img');
        $date = $this->request->getPost('date');
        $date = date('Y-m-d H:i:s',strtotime($date));
        $description = $this->request->getPost('description');
        $detail = $this->request->getPost('details');

        $newName = $img->getRandomName();
        $img->move('assets/backend/images', $newName);

        $value = [
          'bloger_name' => $bloger_name,
          'title' => $title,
          'img' => $newName,
          'date' => $date,
          'description' => $description,
          'details' => $detail
        ];

        $blogs->insert($value);
        session()->setTempdata('added', "New Blog has been added Succesfully", 3);
        session()->markAsTempdata('added', 3);

      }else{
        $error['form_error'] = $this->validator;
      }
    }
    $data['user_data'] = session()->get();
    $contact = new ContactModel();
    $data['contact'] = $contact->findAll();
    echo view('backend/header', $data);
    echo view('backend/sidebar', $data);
    echo view('backend/add_blogs', $error);
    echo view('backend/footer');
  }
  public function read($id)
  {
    $blogs = new BlogsModel();
    $blog_data['blog'] = $blogs->where('id', $id)->first();
    $data['user_data'] = session()->get();
    $setting = new SettingModel();
    $data['detail'] = $setting->where('id', 11)->first();

    if(session()->has('fees')) {

      echo view('frontend/header1', $data);
      echo view('frontend/read_blog', $blog_data);
      echo view('frontend/footer', $data);
  }else{
    echo view('frontend/header', $data);
    echo view('frontend/read_blog', $blog_data);
    echo view('frontend/footer', $data);
  }
}
  public function view_blog()
  {
    $blogs = new BlogsModel();
    $pager = \Config\Services::pager();

    $view = [
          'blog' => $blogs->paginate(2),
          'pager' => $blogs->pager,
      ];

    $data['user_data'] = session()->get();

    $contact = new ContactModel();
    $data['contact'] = $contact->findAll();

    echo view('backend/header', $data);
    echo view('backend/sidebar', $data);
    echo view('backend/view_blogs', $view);
    echo view('backend/footer');
  }
  public function ajax_view()
  {
    $value = $this->request->getPost('search');

    if(!empty($value)){

      $db = \Config\Database::connect();
      $builder = $db->table('tbl_blogs');
      $builder->select('*');
      $builder->like('title', $value); $builder->orLike('bloger_name', $value);
      $blogs_data = $builder->get()->getResult();

      if(!empty($blogs_data)){
        $result ='';
        foreach($blogs_data as $value){
          $result.=
          '<tr>
            <td>'.$value->id.'</td>
            <td>'.$value->bloger_name.'</td>
            <td>'.$value->title.'</td>
            <td><a href="'.base_url('blogs/edit_blog/'.$value->id).'"><button type="button" class="btn btn-success mb-3 px-4">Edit</button></a></td>
            <td><a href="'.base_url('blogs/edit_blog/'.$value->id).'"><button type="button" value="'.$value->id.'"  class="btn btn-danger delete-member px-3">Delete</button></a></td>

          </tr>';
        }
        return $result;
      }else{
        return '<tr><td colspan="12" class="text-center text-light">No result found</td></tr>';
      }
    }
  }
  public function edit_blog($id)
  {
    $blogs = new BlogsModel();
    $blog['data'] = $blogs->where('id', $id)->first();

    $admin = new UserModel();
    $blog['admin_name'] = $admin->findAll();

    $data['user_data'] = session()->get();
    $contact = new ContactModel();
    $data['contact'] = $contact->findAll();
    echo view('backend/header', $data);
    echo view('backend/sidebar', $data);
    echo view('backend/update_blog', $blog);
    echo view('backend/footer');
  }
  public function update_blog()
  {

    $blogs = new BlogsModel();
    $bloger_name = $this->request->getPost('bloger_name');
    $id = $this->request->getPost('id');
    $title = $this->request->getPost('title');
    $file = $this->request->getFile('img');
    $date = $this->request->getPost('date');
    $date = date('Y-m-d H:i:s',strtotime($date));
    $description = $this->request->getPost('description');
    $detail = $this->request->getPost('details');

    $value = [
      'bloger_name' => $bloger_name,
      'id' => $id,
      'title' => $title,
      'date' => $date,
      'description' => $description,
      'details' => $detail
    ];
    if( $file->getBasename() )
   {
     $newName = $file->getRandomName();
     $file->move('assets/backend/images', $newName);

     $value['img'] = $newName;
   }

      $blogs = new BlogsModel();
      $blogs->update($id, $value);
      return redirect()->to('Blogs/view_blog');
  }
  public function delete_blog($id)
  {
    $blogs = new BlogsModel();
    $blogs->where('id', $id)->delete();
    return redirect()->to('Blogs/view_blog');

  }

}


?>
