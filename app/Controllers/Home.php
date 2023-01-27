<?php
namespace App\Controllers;
use App\Models\AmenitiesModel;
use App\Models\MembersModel;
use App\Models\LoginModel;
use App\Models\ContactModel;
use App\Models\TrainerModel;
use App\Models\SettingModel;
use App\Models\BlogsModel;
use App\Models\UserModel;
use App\Models\ScheduleModel;

class Home extends BaseController {
    public function __construct() {
        helper('form', 'url');
    }
    public function index() {
        $trainers = new TrainerModel();
        $details['trainers'] = $trainers->findAll();
        $blog = new BlogsModel();
        $details['blogs'] = $blog->findAll();
        $settings = new SettingModel();
        $data['detail'] = $settings->where('id', 11)->first();
        $date1 = strtotime(date('j M Y'));
        $date2 = strtotime(session()->get('expire_date'));
        $schedule = new ScheduleModel();
        $schedules_data = $schedule->findAll();
        $details['schedule'] = [];
        foreach ($schedules_data as $value) {
            $details['schedule'][$value['timing']][$value['day']][$value['exercise']] = $value['trainer'];
        }
        if (session()->get('fees') == 'Paid') {
            echo view('frontend/header1');
            echo view('frontend/index', $details);
            echo view('frontend/footer', $data);
        }else {
            echo view('frontend/header2');
            echo view('frontend/index', $details);
            echo view('frontend/footer', $data);
        }
    }
    public function login() {
        $data = [];
        $validation = $this->validate(['username' => ['rules' => 'required|valid_email|is_not_unique[tbl_membership.email]', 'errors' => ['required' => 'Please Insert your Username', 'valid_email' => 'Unvalid Username', 'is_not_unique' => 'Username not register']], 'pass' => ['rules' => 'required', 'errors' => ['required' => 'Please Insert your Password']]]);
        if ($this->request->getMethod() == 'post') {
            if ($validation) {
                $session = session();
                $membership = new MembersModel();
                $email = $this->request->getPost('username');
                $password = md5($this->request->getPost('pass'));
                $user_details = $membership->where('email', $email)->first();
                // print_r(); die();
                if ($user_details) {
                    $db_password = $user_details['password'];
                    $verify = password_verify($password, $db_password);
                    if ($password == $db_password) {
                        if ($user_details['fees'] == 'Paid') {
                            $date1 = strtotime(date('j M Y'));
                            $date2 = strtotime($user_details['expire_date']);
                            if ($date1 <= $date2) {
                                $sess_data = ['id' => $user_details['id'], 'email' => $user_details['email'], 'fullname' => $user_details['fullname'], 'gender' => $user_details['gender'], 'mobile' => $user_details['mobile'], 'file' => $user_details['file'], 'age' => $user_details['age'], 'current_weight' => $user_details['current_weight'], 'date' => date('j M Y', strtotime($user_details['date'])), 'expire_date' => date('j M Y', strtotime($user_details['expire_date'])), 'batch' => $user_details['batch'], 'fees' => $user_details['fees']];

                                $session->set($sess_data);
                                return redirect()->to('home/index');

                            }else{
                                $session->setTempdata('wrong', 'Membership Expired.....!!!', 3);
                            }
                        }else{
                            $session->setTempdata('wrong', 'Fees Pending, Not allowed to Log-in.....!!!', 3);
                        }
                    }else{
                        $session->setTempdata('wrong', 'Incorrect Password.....!!!', 3);
                    }
                }
            }else{
                $data['form_error'] = $this->validator;
            }
        }

        require_once APPPATH."libraries/vendor/autoload.php";
        $google_client = new \Google_Client();
        $google_client->setClientId('595321329254-84vgen88gcf4acp6u59iksanv7hs8o1j.apps.googleusercontent.com');
        $google_client->setClientSecret('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');
        $google_client->setRedirectUri(base_url().'/home/login');
        $google_client->addScope('email');
        $google_client->addScope('profile');

        $user = new UserModel();

        if ($this->request->getVar('code')){
            $token = $google_client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
            if(!isset($token['error'])){
                $google_client->setAccessToken($token['access_token']);
                $google_service = new \Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                // echo '<pre>';
                //  print_r($data); die();
                $social_login = new LoginModel();
                $exist_email = $social_login->where('email', $data['email'])->first();
                // print_r($exist_email); die();
                if($exist_email ==''){

                    $file = $data['picture'];

                    $userdata = [
                        'oauth_id' => $data['id'],
                        'fullname' => $data['name'],
                        'email' => $data['email'],
                        'profile_pic' => $file,
                        'fees' => 'Paid',
                        'batch' => 'Morning',
                        'trainer' => 'Yes'
                    ];

                    // print_r($userdata); die();

                    if($social_login->insert($userdata)){
                        $email = $data['email'];
                        $user_details = $social_login->where('email', $email)->first();
                        print_r($user_details);
                    }
                    if ($user_details['fees'] == 'Paid') {

                            $sess_data = ['id' => $user_details['id'], 'email' => $user_details['email'], 'fullname' => $user_details['fullname'], 'file' => $user_details['profile_pic'], 'age' => $user_details['age'], 'date' => date('j M Y', strtotime($user_details['created_at'])), 'expire_date' => date('j M Y', strtotime("+6 months", strtotime($user_details['created_at']))), 'batch' => 'Morning', 'fees' => 'Paid'];

                             session()->set($sess_data);
                            return redirect()->to('home/index');
                    }else{
                        session()->setTempdata('wrong', 'Fees Pending, Not allowed to Log-in.....!!!', 3);
                    }
                }else{
                    $userdata = [
                        'oauth_id' => $data['id'],
                        'fullname' => $data['name'],
                        'email' => $data['email'],
                        'profile_pic' => $data['picture'],
                        'fees' => 'Paid',
                        'batch' => 'Morning',
                        'trainer' => 'Yes'
                    ];
                    //  echo ; die();
                    if($social_login->update($data['id'], $userdata)){
                        $email = $data['email'];
                        $user_details = $social_login->where('email', $email)->first();
                    }
                    if ($user_details['fees'] == 'Paid') {
                      // print_r($user_details); die();
                        // $date1 = strtotime(date('j M Y'));
                        // $date2 = strtotime($user_details['expire_date']);
                        // if ($date1 <= $date2) {
                          $sess_data = ['id' => $user_details['id'], 'email' => $user_details['email'], 'fullname' => $user_details['fullname'], 'file' => $user_details['profile_pic'], 'age' => $user_details['age'], 'gender' => $user_details['gender'], 'created_at' => date('j M Y', strtotime($user_details['created_at'])), 'expire_date' => date('j M Y', strtotime("+6 months", strtotime($user_details['created_at']))), 'batch' => 'Morning', 'fees' => 'Paid'];

                            // print_r($sess_data); die();
                             session()->set($sess_data);
                            return redirect()->to('home/index');

                        // }else{
                        //     $session->setTempdata('wrong', 'Membership Expired.....!!!', 3);
                        // }
                    }else{
                        session()->setTempdata('wrong', 'Fees Pending, Not allowed to Log-in.....!!!', 3);
                    }
                }
                return redirect()->to('home/login');
            }
        }

        $data['loginButton'] = $google_client->createAuthUrl();

        echo view('frontend/members_login', $data);
    }
    public function membership() {

              if ($this->request->getMethod() == 'post') {

                  if ($this->request->getPost('fullname') != '') {

                      $name = $this->request->getPost('fullname');
                      $email = $this->request->getPost('email');
                      $password = md5($this->request->getPost('password'));
                      $mobile = $this->request->getPost('mobile');
                      $age = $this->request->getPost('age');
                      $date = $this->request->getPost('date');
                      $date = date('Y/m/d', strtotime($date));
                      $expire_date = date("Y/m/d", strtotime("+6 months", strtotime($date)));
                      $gender = $this->request->getPost('gender');
                      $current_weight = $this->request->getPost('current_weight');
                      $desired_weight = $this->request->getPost('desired_weight');
                      $batch = $this->request->getPost('batch');
                      $trainer = $this->request->getPost('trainer');
                      $rules = [
                  				"file" => [
                  					"rules" => "uploaded[file]|max_size[file,1024]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png]",
                  					"label" => "Profile Image",
                  				]
                  			];
                        if (!$this->validate($rules)) {
                				$response = [
                					'success' => false,
                					'msg' => $this->validator->getErrors()
                				];

            				return $this->response->setJSON($response);
            			}else{

            				$file = $this->request->getFile('file');
            				$profile_image = $file->getName();
            				$temp = explode(".",$profile_image);
            				$newfilename = round(microtime(true)) . '.' . end($temp);

      				if ($file->move('assets/backend/images', $newfilename)) {

      				  $membership = new MembersModel();

                $value = ['fullname' => $name, 'file' => $newfilename, 'email' => $email, 'mobile' => $mobile, 'age' => $age, 'password' => $password, 'date' => $date, 'expire_date' => $expire_date, 'current_weight' => $current_weight, 'desired_weight' => $desired_weight, 'batch' => $batch, 'fees' => 'Pending', 'gender' => $gender, 'trainer' => $trainer];

      					if ($membership->insert($value)) {

      						$response = [
      							'success' => true,
      							'msg' => "Registration Done....!",
                    'update' => "Update Fees status from Admin.....!!!!"
      						];
      					} else {

      						$response = [
      							'success' => false,
      							'msg' => "Failed to Register",
      						];
      					}

      					return $this->response->setJSON($response);
      				} else {

      					$response = [
      						'success' => false,
      						'msg' => "Failed to upload Image",
      					];

      					return $this->response->setJSON($response);
      				}
      			}
          }
        }
        $settings = new SettingModel();
        $data['detail'] = $settings->where('id', 11)->first();
        echo view('frontend/membership_form');
        echo view('frontend/footer', $data);
}
    public function contact() {
        $from = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('admin_replay');
        $email = \Config\Services::email();
        $email->setTo('pawarsai74@gmail.com');
        $email->setFrom($from, 'User Enquiry');
        $email->setSubject($subject);
        $email->setMessage($message);
        if ($email->send()) {
            $data = [];
            $session = session();
            $validation = $this->validate(['fullname' => 'required', 'email' => 'required|valid_email', 'subject' => 'required']);
            if ($this->request->getMethod() == 'post') {
                if ($validation) {
                    $cmodel = new ContactModel();
                    $name = $this->request->getPost('fullname');
                    $email = $this->request->getPost('email');
                    $subject = $this->request->getPost('subject');
                    $message = $this->request->getPost('message');
                    $value = ['fullname' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message];
                    $cmodel->insert($value);
                } else {
                    $data['form_error'] = $this->validator;
                }
            }
        } else {
            session()->setTempdata('invalid', 'No such Mail-Id exist to send Email', 1);
        }
        $settings = new SettingModel();
        $data['detail'] = $settings->where('id', 11)->first();
        if (session()->has('fees')) {
            echo view('frontend/header1');
            echo view('frontend/contact');
            echo view('frontend/footer', $data);
        } else {
            echo view('frontend/header');
            echo view('frontend/contact', $data);
            echo view('frontend/footer', $data);
        }
    }
    public function amenities() {
        $amenities = new AmenitiesModel();
        $details['data'] = $amenities->findAll();
        $settings = new SettingModel();
        $data['detail'] = $settings->where('id', 11)->first();
        if (session()->has('fees')) {
            echo view('frontend/header1');
            echo view('frontend/amenities', $details);
            echo view('frontend/footer', $data);
        } else {
            echo view('frontend/header');
            echo view('frontend/amenities', $details);
            echo view('frontend/footer', $data);
        }
    }
    public function profile() {
        $membership = new MembersModel();
        $log_email = session()->get('email');
        $data['member'] = $membership->where('email', $log_email)->first();
        $settings = new SettingModel();
        $data['detail'] = $settings->where('id', 11)->first();
        echo view('frontend/profile', $data);
        echo view('frontend/footer', $data);
    }
    public function edit_member() {
        $id = session()->get('id');
        $membership = new MembersModel();
        $details['member'] = $membership->where('id', $id)->first();
        $settings = new SettingModel();
        $data['detail'] = $settings->where('id', 11)->first();
        echo view('frontend/edit_member', $details);
        echo view('frontend/footer', $data);
    }
    public function edit_social_login() {
        $email = session()->get('email');
        $login = new LoginModel();
        $details['member'] = $login->where('email', $email)->first();
        // print_r($details['member']); die();
        $settings = new SettingModel();
        $data['detail'] = $settings->where('id', 11)->first();
        echo view('frontend/edit_social', $details);
        echo view('frontend/footer', $data);
    }
    public function update_social_login() {
        $login = new LoginModel();

        // $id = $this->request->getPost('oauth_id');
        $file = $this->request->getFile('profile_pic');
        $name = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $mobile = $this->request->getPost('mobile');
        $age = $this->request->getPost('age');
        $current_weight = $this->request->getPost('current_weight');
        $desired_weight = $this->request->getPost('desired_weight');
        $date = $this->request->getPost('created_at');
        $date = date('Y/m/d', strtotime($date));
        $expire_date = date('Y/m/d', strtotime("+6 months", strtotime($date)));
        $gender = $this->request->getPost('gender');
        $batch = $this->request->getPost('batch');
        $fees = $this->request->getPost('fees');
        $trainer = $this->request->getPost('trainer');
        $value = ['name' => $name, 'email' => $email, 'mobile' => $mobile, 'age' => $age, 'current_weight' => $current_weight, 'desired_weight' => $desired_weight, 'date' => $date, 'expire_date' => $expire_date, 'batch' => $batch, 'fees' => $fees, 'gender' => $gender, 'trainer' => $trainer];
        $sess_data = ['name' => $name, 'email' => $email, 'mobile' => $mobile, 'age' => $age, 'date' => $date, 'expire_date' => $expire_date, 'batch' => $batch, 'fees' => $fees, 'gender' => $gender, 'trainer' => $trainer];
        // echo '<pre>';
        // print_r($value);
        // die();
        $data = $login->where('email', $email)->first();
        $id = $data['id'];
        session()->set($sess_data);
        $login->update($id, $value);
        return redirect()->to('home/profile');
    }
    public function update_member() {
        $id = $this->request->getPost('id');
        $file = $this->request->getFile('file');
        $name = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $mobile = $this->request->getPost('mobile');
        $age = $this->request->getPost('age');
        $date = $this->request->getPost('date');
        $date = date('Y/m/d', strtotime($date));
        $expire_date = date('Y/m/d', strtotime("+6 months", strtotime($date)));
        $gender = $this->request->getPost('gender');
        $current_weight = $this->request->getPost('current_weight');
        $desired_weight = $this->request->getPost('desired_weight');
        $batch = $this->request->getPost('batch');
        $fees = $this->request->getPost('fees');
        $trainer = $this->request->getPost('trainer');
        $value = ['name' => $name, 'email' => $email, 'mobile' => $mobile, 'age' => $age, 'date' => $date, 'expire_date' => $expire_date, 'batch' => $batch, 'fees' => $fees, 'gender' => $gender, 'trainer' => $trainer];
        // echo '<pre>';
        // print_r($value);
        // die();
        if ($file->getBasename()) {
            $newName = $file->getRandomName();
            $file->move('assets/backend/images', $newName);
            $value['file'] = $newName;
        }
        session()->set($value);
        $membership = new MembersModel();
        $membership->update($id, $value);
        return redirect()->to('home/profile');
    }
    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('home/index');
    }
}
