<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MembersModel;

class ForgetPassword extends BaseController
{
    public function index()
    {

      $verify_email = $this->request->getPost('verify_email');

      $member = new MembersModel();
      $email_exist = $member->where('email', $verify_email)->first();

      if ($email_exist !='') {
          $to = $email_exist['email'];
          $subject = "Password Rest Link";
          $message = '<a href="'.base_url().'/ForgetPassword/reset/'.$email_exist['id'].'">Click here to reset your Password</a>';

          $email = \Config\Services::email();
          $email->setTo($to);
          $email->setFrom('pawarsai74@gmail.com', 'Fitness Club');
          $email->setSubject($subject);
          $email->setMessage($message);
          if($email->send()){
            $response = [
              'success' => true,
              'msg' => 'Verification link sent'
            ];
            return $this->response->setJSON($response);
        }
      }else{

          $response = [
            'error' => false,
            'msg' => 'Email Not Registered'
          ];
          return $this->response->setJSON($response);
      }

        return view('frontend/members_login');
    }
    public function reset($id)
    {
      $member = new MembersModel();
      $email_exist['member'] = $member->where('id', $id)->first();

      $new_password = md5($this->request->getPost('conf_pass'));

      $value = [
        'password' => $new_password,
      ];

      $member->update($id, $value);

      return view('frontend/reset_password', $email_exist);
    }
  }
