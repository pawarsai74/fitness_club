<?php
  namespace App\Controllers;
  use App\Models\SettingModel;
  use App\Libraries\Paypal_lib;
  use App\Views\razorpay\Razorpay;
  use Razorpay\Api\Api;

  class Payment extends BaseController
  {

    public function pay_membership()
    {


      echo view('frontend/member_fees');
    }
    public function Check_out()
    {
      $orderData = [
        'receipt' => 'rcptid_11',
        'amount' => 39900, // 39900 rupees in paise
        'currency' => 'INR'
      ];
      $razorpayOrder = $api->order->create($orderData);
    }

  }


 ?>
