<?php

namespace App\Core;

use App\Core\BaseController;
use App\Models\CategoryModel;
use App\Models\Sitefunction;
use App\Models\UserActivityNotificationsModel;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use DateTime;
use Exception;


class MyController extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->utc_time = date('Y-m-d H:i:s');
        $this->utc_date = date('Y-m-d');

        $this->statuscodes = array(
            404 => 'Invalid Api Call',
            300 => "Invalid Credentials",
            301 => "Account Deactivated",
            302 => "Authorization Failed",
            303 => "Data Missing",
            304 => "Already Available",
            305 => "User Not Registered",
            306 => "Invalid URL Format",

        );

        $this->dataModule = array();


    }

    public function getDateFormat($date)
    {
        $date1 = new DateTime($date);
        $date2 = new DateTime("now");

        $interval = $date1->diff($date2);

        $finaldate = "";
        if ($interval->y != 0) {
            $finaldate = $interval->y . " years ago";
        } else if ($interval->m != 0) {
            $finaldate = $interval->m . " months ago";
        } else if ($interval->d != 0) {
            $finaldate = $interval->d . " days ago";
        } else if ($interval->h != 0) {
            $finaldate = $interval->h . " hours ago";
        } else if ($interval->i != 0) {
            $finaldate = $interval->i . " minutes ago";
        } else if ($interval->s != 0) {
            $finaldate = $interval->s . " seconds ago";
        }

        return $finaldate;
    }

    public function getKey()
    {
        return "my_application_secret";
    }


    function success($json)
    {
        $jsonData = array(
            "success" => true,
            "payload" => $json,
            "error" => array(
                "code" => 0,
                "message" => "",
            ),
        );

        return $jsonData;
    }

    function failure($error_code, $message = "")
    {
        $jsonData = array(
            "success" => false,
            "payload" => (object) array(),
            "error" => array(
                "code" => $error_code,
                "message" => $message == "" ? $this->statuscodes[$error_code] : $message,
            ),
        );

        return $jsonData;
    }

    function verify($request)
    {
        $key = $this->getKey();

        if ($request->header("Authorization") == null) {
            $userId = -1;
        } else {
            $authHeader = $request->header("Authorization");
            $authHeader = $authHeader->getValue();
            $token = $authHeader;
            $userId = -1;
            try {
                $decoded = JWT::decode($token, $key, array("HS256"));

                if ($decoded) {
                    $userId = $decoded->data;
                }
            } catch (Exception $e) {
                $userId = -1;
            }
        }

        return $userId;
    }

    public function sendMail($to, $subject, $message)
    {
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('mail_id', 'Project_name');

        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            return 1;
        } else {

            return 0;
        }
    }

    public function sendTestMail($to, $subject, $message)
    {
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('mail_id', 'Project_name');

        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            return "IF : " . $email->printDebugger(['headers']);
        } else {
            return "Else : " . $email->printDebugger(['headers']);
        }
    }

    public function generateOTP()
    {

        $generator = "1357902468";
        $n = 4;
        $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        return $result;
    }

    public function generateOTPSixDigit()
    {

        $generator = "1357902468";
        $n = 6;
        $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        return $result;
    }
    public function addlog($message)
    {

        $log_data = array(
            
            
            "status" => 1,
            "msg" => $message,
            "date" => $this->utc_date,
            "created" => $this->utc_time,
            "email" => $this->session->get('email'),
            
            
        );

        $model = new Sitefunction();
        $model->protect(false);
        $model->insert_data('logtable', $log_data);


    }
    public function checkLogsStatus()
    {
        $model = new Sitefunction();
        $model->protect(false);
        $log = $model->get_single_row('users', 'logs', array('email' => $this->session->get('email')));

        if ($log == true) if ($log['logs'] == true)
            return '1';

        return '0';
    }
    public function checkbookStatus()
    {
        $model = new Sitefunction();
        $model->protect(false);
        $log = $model->get_single_row('users', 'Addbook', array('email' => $this->session->get('email')));

        if ($log == true) if ($log['Addbook'] == true)
            return '1';

        return '0';
    }
    public function checkeditbookStatus()
    {
        $model = new Sitefunction();
        $model->protect(false);
        $log = $model->get_single_row('users', 'EditBook', array('email' => $this->session->get('email')));

        if ($log == true) if ($log['EditBook'] == true)
            return '1';

        return '0';
    }
    public function checkdeletebookStatus()
    {
        $model = new Sitefunction();
        $model->protect(false);
        $log = $model->get_single_row('users', 'DeleteBook', array('email' => $this->session->get('email')));

        if ($log == true) if ($log['DeleteBook'] == true)
            return '1';

        return '0';
    }


}