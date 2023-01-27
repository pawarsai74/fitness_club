<?php

namespace App\Controllers;
use App\Models\AmenitiesModel;
use App\Models\ContactModel;


class Amenities extends BaseController
{
  public function __construct()
  {
    helper('form', 'url');
  }
  public function add_amenities()
  {
    $validation = $this->validate([

      'title' =>[
        'rules' => 'required|is_unique[tbl_amenities.heading]',
        'errors' =>[
          'required' => 'Please add heading',
          'is_unique' => 'Amenitie already available'
        ]
      ],
      // 'img' =>[
      //   'rules' => 'required',
      //   'errors' =>[
      //     'required' => 'Please select image to display'
      //   ]
      // ],
      'description' =>[
        'rules' => 'required',
        'errors' =>[
          'required' => 'Please add an description'
        ]
      ]
    ]);
    if ($this->request->getMethod() == 'post') {
      if ($validation) {
        $amenities = new AmenitiesModel();
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $img = $this->request->getFile('img');

        if ($img->isValid() && !$img->hasMoved()) {
          $newName = $img->getRandomName();
          $img->move('assets/backend/images', $newName);

          $value = [
            'heading' => $title,
            'img' => $newName,
            'description' => $description
          ];
          $amenities->insert($value);
          session()->setTempdata('added', 'Amenities added successfully', 1);
        }
      }else{
        $data['form_error'] = $this->validator;
      }

    }

    $session = session();
    $contact = new ContactModel();
    $data['contact'] = $contact->findAll();
    $data['user_data'] = $session->get();
    echo view('backend/header', $data);
    echo view('backend/sidebar');
    echo view('backend/add_aminities', $data);
    echo view('backend/footer');
  }
  public function display_amenities()
  {
    $amenities = new AmenitiesModel();
    $pager = \Config\Services::pager();
    $data = [
          'details' => $amenities->paginate(2),
          'pager' => $amenities->pager,
      ];

    $contact = new ContactModel();
    $data['contact'] = $contact->findAll();

    $data['user_data'] = session()->get();
    echo view('backend/header', $data);
    echo view('backend/sidebar');
    echo view('backend/view_aminities', $data);
    echo view('backend/footer');
  }
  public function ajax_display()
  {
    $value = $this->request->getPost('search');

    if(!empty($value)){
      $db = \Config\Database::connect();
      $builder = $db->table('tbl_amenities');
      $builder->select('*');
      $builder->like('heading', $value, 'after');
      $amenities_data = $builder->get()->getResult();

      if(!empty($amenities_data)){
        $result ='';
        foreach($amenities_data as $data){

          $result.=
          '<tr>
            <td>'.$data->id.'</td>
            <td>'.$data->heading.'</td>
            <td><img src="'.base_url('assets/backend/images/'.$data->img).'" style="width:100px;height:100px"></td>
            <td><a href="'.base_url('amenities/edit/'.$data->id).'"><button type="button" class="btn btn-success mb-3 px-4">Edit</button></a></td>
            <td><a href="'.base_url('amenities/edit/'.$data->id).'"><button type="button" value="'.$data->id.'"  class="btn btn-danger delete-member px-3">Delete</button></a></td>

          </tr>';
        }
        return $result;
      }else{
        return '<tr><td colspan="12" class="text-center text-light">No result found</td></tr>';
      }
    }

  }
  public function edit($id)
  {
    $amenities = new AmenitiesModel();
    $data['details'] = $amenities->where('id', $id)->first();
    $contact = new ContactModel();
    $data['contact'] = $contact->findAll();

    $data['user_data'] = session()->get();
    echo view('backend/header', $data);
    echo view('backend/sidebar');
    echo view('backend/edit_aminities', $data);
    echo view('backend/footer');
  }
  public function update()
  {
    $error = [];
    $validation = $this->validate([
      'title' =>[
        'rules' => 'required',
        'errors' =>[
          'required' => 'Please add heading'
        ]
      ],
      'description' =>[
        'rules' => 'required',
        'errors' =>[
          'required' => 'Please add description'
        ]
      ],
    ]);
    if ($validation) {
     $amenities = new AmenitiesModel();
     $id = $this->request->getPost('id');
     $title = $this->request->getPost('title');
     $description = $this->request->getPost('description');
     $file = $this->request->getFile('img');

     $value = [
      'heading' => $title,
      'description' => $description
     ];
     if( $file->getBasename() )
    {
      $newName = $file->getRandomName();
      $file->move('assets/backend/images', $newName);

      $value['img'] = $newName;
    }

     $amenities->update($id, $value);
     return redirect()->to('Amenities/display_amenities');
    }else {
      $error['form_error'] = $this->validator;
    }
  }
  public function delete($id)
  {
    $amenities = new AmenitiesModel();
    $amenities->where('id', $id)->delete();
    return redirect()->to('Amenities/display_amenities');
  }
}
