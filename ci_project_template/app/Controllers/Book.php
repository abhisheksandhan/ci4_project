<?php
namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;

class Book extends MyController
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
        $model = new Sitefunction();
        $model->protect(false);
        $this->dataModule['employee'] = $model->get_all_rows('books', '*');
        $this->dataModule['checkLogsReturn'] = $this->checkLogsStatus();
        // return json_encode($checkLogsReturn['checkLogsReturn']);


        $model = new Sitefunction();
        $model->protect(false);
        $user['type'] = $model->get_single_row('users', '*', array('email' => $this->session->get('email')));

        if ($user['type']['admin']) {
            echo view('books/admin', $this->dataModule);
        } else {
            echo view('books/list', $this->dataModule);
        }

    }
    public function addBook()
    {
        echo view('books/add_book');
    }
    public function logs()
    {
        $model = new Sitefunction();
        $model->protect(false);
        $this->dataModule['employee'] = $model->get_all_rows('logtable', '*');
        echo view('books/logs', $this->dataModule);
    }
    public function loguser()
    {
        $model = new Sitefunction();
        $model->protect(false);
        $this->dataModule['employee'] = $model->get_all_rows('logtable', '*', array('email' => $this->session->get('email')));
        echo view('books/loguser', $this->dataModule);
    }

    public function admin()
    {
        $model = new Sitefunction();
        $model->protect(false);

        $data['employee'] = $model->get_all_rows('books', '*');
        $this->dataModule['employee_edit'] = $data['employee'];
        echo view('books/admin', $this->dataModule);

    }

    public function editBook($id)
    {
        $model = new Sitefunction();
        $model->protect(false);
        $this->dataModule['employee_edit'] = $model->get_single_row('books', '*', array('id' => $id));
        // return json_encode($data['employee_edit']);
        echo view('books/editbook', $this->dataModule);
    }
    public function edit_action($id)
    {
        $requestData = $_POST;
        return json_encode($requestData["Title"]);

        echo view('books/list');
    }

    public function add_book_action()
    {

        $requestData = $_POST;
        $title = $requestData['title'];
        $isbn_no = $requestData['isbn_no'];
        $author = $requestData['author'];
        $status = $requestData['status'];
        $created_at = $this->utc_time;

        $data_array['title'] = $title;
        $data_array['isbn_no'] = $isbn_no;
        $data_array['author'] = $author;
        $data_array['status'] = $status;
        $data_array['created_at'] = $created_at;
        if (isset($_FILES['component_image']) && !empty($_FILES['component_image'])) {

            $randdom = round(microtime(time() * 1000)) . rand(000, 999);

            $file_extension1 = pathinfo($_FILES['component_image']["name"], PATHINFO_EXTENSION);

            $file_name1 = $randdom . '.' . $file_extension1;

            if ($_FILES['component_image']["error"] <= 0) {

                move_uploaded_file($_FILES['component_image']['tmp_name'], IMAGE_UPLOAD_PATH . 'component/' . $file_name1);

                $data_array['img'] = $file_name1;
            }
        } else {

            $data_array['component_image'] = 'NA';
        }

        $model = new Sitefunction();
        $model->protect(false);
        // $data = array(
        //     'title' =>  $requestData->title,
        //     'isbn_no' =>$requestData->isbn_no,
        //     'author' => $requestData->author,
        //     'created_at' => $this->utc_time
        // );
        $model = new Sitefunction();
        $model->protect(false);
        $result = $model->insert_data('books', $data_array);
        $data['employee'] = $result;
        $model = new Sitefunction();
        $model->protect(false);
        $data['employee'] = $model->get_all_rows('books', '*');

        if ($result) {
            $data = array(
                'message' => 'added Successfully'
            );
            $this->dataModule = $this->success($data);
        }
        $msg = "" . $this->session->get('email') . " Added new book";
        $this->addlog($msg);
        return $this->respond($this->dataModule);

    }
    public function deletebook()
    {
        $requestData = $this->request->getJSON();

        $model = new Sitefunction();
        $model->protect(false);
        $model->delete_data('books', array('id' => $requestData->id));
        $data = array(
            'message' => 'added Successfully'
        );
        $this->dataModule = $this->success($data);
        $msg = "" . $this->session->get('email') . " Deleted the Book";
        $this->addlog($msg);
        return $this->respond($this->dataModule);
        // echo view('books/list.php');
        //echo $this->respond(json_encode($data));
        return $this->respond($this->dataModule);
    }
    public function editBookAction()
    {
        //$requestData = $this->request->getJSON();
        $requestData = $_POST;

        $id = $requestData['id'];
        $title = $requestData['title'];
        $isbn_no = $requestData['isbn_no'];
        $author = $requestData['author'];
        $status = $requestData['status'];

        $name = 'na';
        if (isset($_FILES['component_image']) && !empty($_FILES['component_image'])) {

            $randdom = round(microtime(time() * 1000)) . rand(000, 999);

            $file_extension1 = pathinfo($_FILES['component_image']["name"], PATHINFO_EXTENSION);

            $file_name1 = $randdom . '.' . $file_extension1;

            if ($_FILES['component_image']["error"] <= 0) {

                move_uploaded_file($_FILES['component_image']['tmp_name'], IMAGE_UPLOAD_PATH . 'component/' . $file_name1);

                $name = $file_name1;
            }
        } else {

            $name = 'NA';
        }


        $model = new Sitefunction();
        $model->protect(false);
        $model->update_data('books', array('title' => $title, 'isbn_no' => $isbn_no, 'author' => $author, 'status' => $status, 'img' => $name), array('id' => $id));
        $data = array(
            'message' => 'added Successfully',
            'status' => $status
        );
        $this->dataModule = $this->success($data);
        $msg = "" . $this->session->get('email') . " Edited the book";
        $this->addlog($msg);
        return $this->respond($this->dataModule);
    }
    public function signup()
    {
        echo view('user/Register');
    }
    // public function permission()
    // {
    //     echo view('user/permissiom');
    // }
    public function adminAction()
    {
        $requestData = $this->request->getJson();

        $admin_conntroller = $requestData->admin;

        $model = new Sitefunction();
        $model->protect(false);
        $model->update_data('users', array('admin' => $requestData->admin), array('id' => $requestData->id));
        $data = array(
            'message' => 'added Successfully',
            'admin' => $admin_conntroller
        );
        $this->dataModule = $this->success($data);
        $msg = "" . $this->session->get('email') . "admin";
        $this->addlog($msg);
        return $this->respond($this->dataModule);


    }

    public function logsAction()
    {
        $requestData = $this->request->getJson();

        $logs_conntroller = $requestData->logs;

        $model = new Sitefunction();
        $model->protect(false);
        $model->update_data('users', array('logs' => $requestData->logs), array('id' => $requestData->id));
        $data = array(
            'message' => 'added Successfully',
            'logs' => $logs_conntroller
        );
        $this->dataModule = $this->success($data);
        $msg = "" . $this->session->get('email') . "logs";
        $this->addlog($msg);
        return $this->respond($this->dataModule);


    }
    public function bookAction()
    {
        $requestData = $this->request->getJson();

        $Addbook_conntroller = $requestData->Addbook;

        $model = new Sitefunction();
        $model->protect(false);

        $model->update_data('users', array('Addbook' => $requestData->Addbook), array('id' => $requestData->id));
        $data = array(
            'message' => 'added Successfully',
            'Addbook' => $Addbook_conntroller
        );
        $this->dataModule = $this->success($data);
        $msg = "" . $this->session->get('email') . "Addbook";
        $this->addlog($msg);
        return $this->respond($this->dataModule);


    }
    public function EditAction()
    {
        $requestData = $this->request->getJson();

        $EditBook_conntroller = $requestData->EditBook;

        $model = new Sitefunction();
        $model->protect(false);

        $model->update_data('users', array('EditBook' => $requestData->EditBook), array('id' => $requestData->id));
        $data = array(
            'message' => 'added Successfully',
            'EditBook' => $EditBook_conntroller
        );
        $this->dataModule = $this->success($data);
        $msg = "" . $this->session->get('email') . "EditBook";
        $this->addlog($msg);
        return $this->respond($this->dataModule);


    }
    public function DeleteAction()
    {
        $requestData = $this->request->getJson();

        $DeleteBook_conntroller = $requestData->DeleteBook;

        $model = new Sitefunction();
        $model->protect(false);

        $model->update_data('users', array('DeleteBook' => $requestData->DeleteBook), array('id' => $requestData->id));
        $data = array(
            'message' => 'added Successfully',
            'DeleteBook' => $DeleteBook_conntroller
        );
        $this->dataModule = $this->success($data);
        $msg = "" . $this->session->get('email') . "DeleteBook";
        $this->addlog($msg);
        return $this->respond($this->dataModule);


    }

    public function view_users(){
        echo view('books/users');
    }

    public function country(){
        $join = array(
            TBL_COUNTRY . ' as c' => 'c.country_id=s.country_id'
    
        );
        $model = new Sitefunction();
        $this->dataModule['list'] = $model->get_all_rows(TBL_STATE . ' as s', ' s.*,c.country_name ', array('c.country_id' => 1), $join);
        
        echo view('books/join',$this->dataModule);
        // return json_encode($this->dataModule['tools']);
    }


}