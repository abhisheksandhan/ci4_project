<?php
namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;

class User extends MyController
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->utc_time = date('Y-m-d H:i:s');
        $this->utc_date = date('Y-m-d');
        $this->dataModule = array();
        $this->dataModule['controller'] = $this;
    }

    public function index()
    {

        echo view('user/index', $this->dataModule);
    }
    public function register()
    {

        echo view('user/Register', $this->dataModule);
    }

    public function addUser()
    {
        $requestData = $this->request->getJson();

        $username_conntroller = $requestData->username;
        $email_controller = $requestData->email;
        $password_controller = $requestData->password;
        $admin_controller = $requestData->admin;
        $logs_controller = $requestData->logs;

        $model = new Sitefunction();
        $model->protect(false);
        $dataArray = array(

            'username' => $username_conntroller,
            'email' => $email_controller,
            'password' => $password_controller,
            'admin' => $admin_controller,
            'logs' => $logs_controller,
        );

        $resultdata = $model->insert_data('users', $dataArray);

        if ($resultdata) {
            $data = array(
                'message' => 'added Successfully'
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    //calling the form
    public function create()
    {
        echo view("user/insert");
    }


    //saving the data
    public function save()
    {
        $userModel = new Sitefunction();





        $data = [

            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),

        ];

        echo "<pre>";




        print_r($data);

        // $userModel->save($data);

        // return redirect()->to('user/index');    
    }
    public function verifyUser()
    {
        $requestData = $this->request->getJson();

        $email_conntroller = $requestData->email;
        $password_conntroller = $requestData->password;

        $model = new Sitefunction();
        $model->protect(false);
        $data['user'] = $model->get_single_row('users', '*', array('email' => $email_conntroller));

        if (!$data['user']) {
            $data = array(
                'message' => 'invalid'
            );

            $this->dataModule = $this->failure(300, 'invalid user');
            return $this->respond($this->dataModule);
        }
        
        if ($data['user']['password'] == $password_conntroller) {
            $data = array(
                'message' => 'valid',
                'user' => $this->session->get('email'),
            );
            $this->session->set('email', $email_conntroller);

            $this->dataModule = $this->success($data);


            $msg = $this->session->get('email') . "' logged in";

            $model = new Sitefunction();
            $model->protect(false);

            // $_SESSION['username'] = $username_conntroller;

            $this->addLog($msg);
            return $this->respond($this->dataModule);
        } else {
            $data = array(
                'message' => 'invalid'
            );

            $this->dataModule = $this->failure(300, 'invalid user');
        }

        return $this->respond($this->dataModule);
    }
    public function logout()
    {
        session_destroy();

        $data = array(
            'message' => 'logout successfully'
        );
        $this->dataModule = $this->success($data);
        $msg = "" . $this->session->get('email') . "logout";
        $this->addlog($msg);

        return $this->respond($this->dataModule);
    }
    public function permission()
    {
        $model = new Sitefunction();
        $model->protect(false);

        $data['employee'] = $model->get_all_rows('users', '*');
        $this->dataModule['employee_edit'] = $data['employee'];
        echo view('user/permission', $this->dataModule);
    }


}