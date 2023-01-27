<?php

namespace App\Controllers;
use App\Models\TrainerModel;
use App\Models\ContactModel;

class Trainer extends BaseController
{
  public function add()
  {

    $error = [];
    $validation = $this->validate([
      'fullname' =>[
        'rules' => 'required|min_length[3]',
        'errors' =>[
          'required' => 'Trainer name is required',
          'min_length' => 'Min 3 characters required'
        ]

      ],
      // 'img' =>[
      //   'rules' => 'required',
      //   'errors' =>[
      //     'required' => 'Trainer photo is required'
      //   ]
      //
      // ],
      'email' =>[
        'rules' => 'required|valid_email|is_unique[tbl_trainers.email]',
        'errors' =>[
          'required' => 'Email is required to log-in',
          'valid_email' => 'This Email id is not valid',
          'is_unique' => 'Email id is already Registered'
        ]

      ],
      'specialty' =>[
        'rules' => 'required',
        'errors' =>[
          'required' => 'specialty is required'
        ]

      ],
      'gender' =>[
        'rules' => 'required',
        'errors' =>[
          'required' => 'Please Select your Gender'
        ]

      ],
      'experience' =>[
        'rules' => 'required|alpha_numeric_space',
        'errors' =>[
          'required' => 'Please Enter your Total Experience',
          'alpha_numeric_space' => 'Special Charc. not allowed'
        ]

      ],
      'age' =>[
        'rules' => 'required|alpha_numeric_space',
        'errors' =>[
          'required' => 'Please Enter your Total age',
          'alpha_numeric_space' => 'Special Charc. not allowed'
        ]
      ]
    ]);

    if ($this->request->getMethod() == 'post') {
      $values = [];
      if ($validation) {
        $trainermodel = new TrainerModel();
        $fullname = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $gender = $this->request->getPost('gender');
        $specialty = $this->request->getPost('specialty');
        $experience = $this->request->getPost('experience');
        $age = $this->request->getPost('age');
        $file = $this->request->getFile('img');

        $newFileName = $file->getRandomName();
        if($file->isValid() && !$file->hasMoved()){
        $file->move('assets/backend/images/', $newFileName);
      }

             $values = [
               'fullname' => $fullname,
               'email' => $email,
               'gender' => $gender,
               'specialty' => $specialty,
               'experience' => $experience,
               'age' => $age,
               'img' => $newFileName
             ];

             $trainermodel->insert($values);
             session()->setTempdata('added', 'Trainer added Succefully', 1);
             return redirect()->to('Trainer/add');
      }else{
        $data['form_error'] = $this->validator;
      }
    }

    $data['user_data'] = session()->get();
    $contact = new ContactModel();
    $data['contact'] = $contact->findAll();


    echo view('backend/header', $data);
    echo view('backend/sidebar');
    echo view('backend/add_trainer', $error);
    echo view('backend/footer');
  }

  public function show()
  {
    $pager = \Config\Services::pager();

    $trainermodel = new TrainerModel();
    $trainer_data = [
          'trainer' => $trainermodel->paginate(2),
          'pager' => $trainermodel->pager,
      ];

    $data['user_data'] = session()->get();
    $contact = new ContactModel();
    $data['contact']  = $contact->findAll();

    echo view('backend/header', $data);
    echo view('backend/sidebar');
    echo view('backend/all_trainers', $trainer_data);
    echo view('backend/footer');
  }
  public function ajax_search()
  {
    $value = $this->request->getPost('search');
    if(!empty($value)){
    $db = \Config\Database::connect();
    $builder = $db->table('tbl_trainers');
    $builder->select('*');
    $builder->like('fullname', $value, 'after');
    $trainers = $builder->get()->getResult();

    if(!empty($trainers)){
      $result = '';
    foreach($trainers as $data){
      $result.=
      '<tr>
        <td>'.$data->trainer_id.'</td>
        <td>'.$data->fullname.'</td>
        <td><img src="'.base_url('assets/backend/images/'.$data->img).'" style="width:100px; height:100px;" alt="image"></td>
        <td>'.$data->gender.'</td>
        <td>'.$data->specialty.'</td>
        <td>'.$data->experience.'</td>
        <td>'.$data->age.'</td>
        <td><a href="'.site_url('trainer/delete/').$data->trainer_id.'"><button type="button" value="'.$data->trainer_id.'"  class="btn btn-danger mb-3 delete-trainer px-3">Delete</button></a><br><a href="'.site_url('trainer/edit/').$data->trainer_id.'"><button type="button" class="btn btn-success px-4">Edit</button></a></td>
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
    $trainermodel = new TrainerModel();
    $trainer_details['details'] = $trainermodel->where('trainer_id', $id)->first();

    $data['user_data'] = session()->get();
    $contact = new ContactModel();
    $data['contact']  = $contact->findAll();

    echo view('backend/header', $data);
    echo view('backend/sidebar');
    echo view('backend/update_trainer', $trainer_details);
    echo view('backend/footer');
  }
  public function update()
  {

      $id = $this->request->getPost('trainer_id');
      $fullname = $this->request->getPost('fullname');
      $email = $this->request->getPost('email');
      $gender = $this->request->getPost('gender');
      $specialty = $this->request->getPost('specialty');
      $experience = $this->request->getPost('experience');
      $age = $this->request->getPost('age');
      $file = $this->request->getFile('img');

           $values = [
             'fullname' => $fullname,
             'email' => $email,
             'gender' => $gender,
             'specialty' => $specialty,
             'experience' => $experience,
             'age' => $age
           ];

           if( $file->getBasename() )
          {
            $newName = $file->getRandomName();
            $file->move('assets/backend/images', $newName);

            $values['img'] = $newName;
          }

           $trainermodel = new TrainerModel();
           $trainermodel->update($id, $values);
           return redirect()->to('Trainer/show');

  }
  public function delete($id)
  {
    $trainermodel = new TrainerModel();
    $trainermodel->where('trainer_id', $id)->delete();
    return redirect()->to('Trainer/show');
  }
}

?>
