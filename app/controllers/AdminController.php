<?php
Class AdminController extends Controller
{
  public function __construct()
  {
   
    //new model instance
    $this->users = $this->model('Users');
    $this->whatsnew_model = $this->model('WhatsNew_Model');
    $this->tender_model = $this->model('Tender_Model');
    $this->notification_model = $this->model('Notification_Model');
    $this->menu_model = $this->model('Menu_Model');
    $this->common_model = $this->model('Common_model');
    $this->page_model = $this->model('Page_Model');
    $this->profile_model = $this->model('Profile_Model');
    $this->role_honour_model = $this->model('Role_Honour_Model');
    $this->mst_contactus_model = $this->model('Mst_Contactus_Model');
  }

  public function index()
  {
    
    $current_whatsnew = $this->menu_model->getMenu_parent_Published();

    $data['current_menu'] = $current_whatsnew;
    $this->view('admin/dashboard', $data);


    $this->view('admin/dashboard', $data);
  }
  public function form()
  {
    $this->view('admin/edit-menu');
  }
  public function adminlogin()
  {
    $this->view('admin/adminlogin');
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // process form
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'user_name' => trim($_POST['user_name']),
        'user_password' => trim($_POST['user_password'])
      ];

      if ($this->users->findUserByUserName($data['user_name'])) {
        //user found..

      } else {
        $response = ' <strong>User Name Not Found !!!</strong>';
        $message = 1;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
        exit;
      }
      $data['user_password'] = md5($data['user_password']);

      $loggedInUser = $this->users->login($data['user_name'], $data['user_password']);
      if ($loggedInUser) {
        //create session
        $this->createUserSession($loggedInUser);
        // echo 0;
        $response = '<strong>Login Success</strong>';
        $message = 0;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
        exit;
      } else {
        $response = ' <strong>Password Is Wrong</strong>
';
        $message = 2;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
        exit;
      }
    }
  }
  public function createUserSession($user)
  {
    $_SESSION['userid'] = $user->userid;
    $_SESSION['username'] = $user->username;
    $_SESSION['useremail'] = $user->useremail;
    $_SESSION['rolename'] = $user->rolename;
    $_SESSION['roleid'] = $user->roleid;

    // redirect('Indexes/index');
  }

  public function logout()
  {
    session_destroy();
    redirect('indexes');
  }
  #######################  WhatsNew Starts #####################
  public function whatsnew()
  {
    $this->view('admin/edit_whatsnew');
  }
  public function whatsnew_edit()
  {
    $id = $_REQUEST['id'];
    $sql = $this->userModel->edit($id);
    $data['sql'] = $sql;
    $this->view('index', $data);
  }
  public function whatsnew_save()
  {
    $en_final_file = null;
    $tn_final_file = null;
    if (isset($_FILES['en_wh_new_pdf']['name'])) {
      $file =  $_FILES['en_wh_new_pdf']['name'];
      $file_loc = $_FILES['en_wh_new_pdf']['tmp_name'];
      $file_size = $_FILES['en_wh_new_pdf']['size'];
      $file_type = $_FILES['en_wh_new_pdf']['type'];
      $folder = 'whatsnew/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $en_final_file = str_replace(' ', '-', $new_file_name);

      // echo "<pre>";
      // print_r($final_file);
      // die();
      if (move_uploaded_file($file_loc, $folder . $en_final_file)) {
      }
    }
    if (isset($_FILES['tn_wh_new_pdf']['name'])) {
      $file =  $_FILES['tn_wh_new_pdf']['name'];
      $file_loc = $_FILES['tn_wh_new_pdf']['tmp_name'];
      $file_size = $_FILES['tn_wh_new_pdf']['size'];
      $file_type = $_FILES['tn_wh_new_pdf']['type'];
      $folder = 'whatsnew/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $tn_final_file = str_replace(' ', '-', $new_file_name);

      // echo "<pre>";
      // print_r($final_file);
      // die();
      if (move_uploaded_file($file_loc, $folder . $tn_final_file)) {
      }
    }
    $wh_new_from_date = date('Y-m-d', strtotime($_POST['wh_new_from_date']));
    $wh_new_to_date =  date('Y-m-d', strtotime($_POST['wh_new_to_date']));
    $data = [
      'en_whatsnew_title' => trim($_POST['en_whatsnew_title']),
      'tn_whatsnew_title' => trim($_POST['tn_whatsnew_title']),
      'wh_new_from_date' => $wh_new_from_date,
      'wh_new_to_date' =>  $wh_new_to_date,
      'whatsnew_id' => $_POST['id'],
      'action' => $_POST['action']
    ];


    if (isset($_POST['tn_wh_new_pdf'])) {
      $data['tn_wh_new_pdf'] = $_POST['tn_wh_new_pdf'];
    } else {
      $data['tn_wh_new_pdf'] = ' ';
    }

    if ($en_final_file) {
      $data['en_wh_new_pdf'] = $en_final_file;
    } else {
      $data['en_wh_new_pdf'] = $_POST['en_old_pdf'];
    }
    if ($tn_final_file) {
      $data['tn_wh_new_pdf'] = $tn_final_file;
    } else {
      $data['tn_wh_new_pdf'] = $_POST['tn_old_pdf'];
    }

    $data['created_by'] = $_SESSION['userid'];
    $data['created_on'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $_SESSION['userid'];
    $data['updated_on'] = date('Y-m-d H:i:s');
    $data['status'] = '0';

    if ($data['action'] == "new") {
      if ($this->whatsnew_model->editdWhatsNew($data)) {
        $message = 1;
        $response = "Saved ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $response = "Error ";
        $message = 0;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    } else {
      if ($this->whatsnew_model->updatedWhatsNew($data)) {
        $message = 1;
        $response = "Updated ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $message = 0;
        $response = "Error ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    }
  }
  public function list_whatsnew()
  {

    $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
    if ($status == null  || $status == 0) {
      $status = '0';
      $whatsnew = $this->whatsnew_model->getWhatsNewUnpublished($status);
    } else {
      $status = '1';
      $whatsnew = $this->whatsnew_model->getWhatsNewPublished($status);
    }

    $data['current_whatsnew'] = $whatsnew;
    $this->view('admin/list-whatsnew', $data);
  }
  public function whatsnew_edit_id()
  {

    $id = $_REQUEST['id'];
    $sql = $this->whatsnew_model->edit($id);
    $data['sql'] = $sql;
    $this->view('admin/edit_whatsnew', $data);
    // $this->view('index', $data);
  }
  public function whatsnew_delete()
  {
    $data = [
      'whatsnew_id' => $_REQUEST['whatsnew_id'],
      'status' => 2
    ];
    $data['deleted_by'] = $_SESSION['userid'];
    $data['deleted_on'] = date('Y-m-d H:i:s');

    if ($this->whatsnew_model->deletedWhatsNew($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  public function whatsnew_publish()
  {
    $data = [
      'whatsnew_id' => $_REQUEST['whatsnew_id'],
      'status' => 1
    ];
    if ($this->whatsnew_model->publishWhatsNew($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  #######################  WhatsNew Ends #####################
  #######################  Tender Starts #####################
  public function tender()
  {
    $this->view('admin/edit-tender');
  }
  public function tender_edit()
  {
    $id = $_REQUEST['id'];
    $sql = $this->userModel->edit($id);
    $data['sql'] = $sql;
    $this->view('index', $data);
  }
  public function tender_save()
  {
    $en_final_file = null;
    $tn_final_file = null;
    if (isset($_FILES['en_tender_pdf']['name'])) {
      $file =  $_FILES['en_tender_pdf']['name'];
      $file_loc = $_FILES['en_tender_pdf']['tmp_name'];
      $file_size = $_FILES['en_tender_pdf']['size'];
      $file_type = $_FILES['en_tender_pdf']['type'];
      $folder = 'tender/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $en_final_file = str_replace(' ', '-', $new_file_name);

      // echo "<pre>";
      // print_r($final_file);
      // die();
      if (move_uploaded_file($file_loc, $folder . $en_final_file)) {
      }
    }

    if (isset($_FILES['tn_tender_pdf']['name'])) {
      $file =  $_FILES['tn_tender_pdf']['name'];
      $file_loc = $_FILES['tn_tender_pdf']['tmp_name'];
      $file_size = $_FILES['tn_tender_pdf']['size'];
      $file_type = $_FILES['tn_tender_pdf']['type'];
      $folder = 'tender/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $tn_final_file = str_replace(' ', '-', $new_file_name);

      // echo "<pre>";
      // print_r($final_file);
      // die();
      if (move_uploaded_file($file_loc, $folder . $tn_final_file)) {
      }
    }
    $tender_from_date = date('Y-m-d', strtotime($_POST['tender_from_date']));
    $tender_to_date =  date('Y-m-d', strtotime($_POST['tender_to_date']));
    $data = [
      'tn_tender_title' => trim($_POST['tn_tender_title']),
      'en_tender_title' => trim($_POST['en_tender_title']),
      'tender_from_date' => $tender_from_date,
      'tender_to_date' =>  $tender_to_date,
      'tender_id' => $_POST['id'],
      'action' => $_POST['action']
    ];

    if (isset($_POST['tn_tender_pdf'])) {
      $data['tn_tender_pdf'] = $_POST['tn_tender_pdf'];
    } else {
      $data['tn_tender_pdf'] = ' ';
    }

    if ($en_final_file) {
      $data['en_tender_pdf'] = $en_final_file;
    } else {
      $data['en_tender_pdf'] = $_POST['en_old_pdf'];
    }
    if ($tn_final_file) {
      $data['tn_tender_pdf'] = $tn_final_file;
    } else {
      $data['tn_tender_pdf'] = $_POST['tn_old_pdf'];
    }

    $data['created_by'] = $_SESSION['userid'];
    $data['created_on'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $_SESSION['userid'];
    $data['updated_on'] = date('Y-m-d H:i:s');
    $data['status'] = '0';

    if ($data['action'] == "new") {
      if ($this->tender_model->edittender($data)) {
        $message = 1;
        $response = "Saved ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $response = "Error ";
        $message = 0;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    } else {
      if ($this->tender_model->updatedTender($data)) {
        $message = 1;
        $response = "Updated ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $message = 0;
        $response = "Error ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    }
  }
  public function list_tender()
  {

    $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
    if ($status == null  || $status == 0) {
      $status = '0';
      $tender = $this->tender_model->getTenderUnpublished($status);
    } else {
      $status = '1';
      $tender = $this->tender_model->getTenderPublished($status);
    }

    $data['current_tender'] = $tender;
    $this->view('admin/list-tender', $data);
  }
  public function tender_edit_id()
  {

    $id = $_REQUEST['id'];
    $sql = $this->tender_model->edit($id);
    $data['sql'] = $sql;
    $this->view('admin/edit-tender', $data);
    // $this->view('index', $data);
  }
  public function tender_delete()
  {
    $data = [
      'tender_id' => $_REQUEST['tender_id'],
      'status' => 2
    ];
    $data['deleted_by'] = $_SESSION['userid'];
    $data['deleted_on'] = date('Y-m-d H:i:s');

    if ($this->tender_model->deletedTender($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  public function tender_publish()
  {
    $data = [
      'tender_id' => $_REQUEST['tender_id'],
      'status' => 1
    ];
    if ($this->tender_model->publishTender($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  #######################  Tender Ends #####################
  #######################  Menu Starts #####################
  public function menu()
  {

    $current_whatsnew = $this->menu_model->getMenu_parent_Published();

    $data['current_menu'] = $current_whatsnew;
    $current_page = $this->menu_model->getPageList();

    $data['current_page'] = $current_page;
    $this->view('admin/edit-menu', $data);
  }
  // public function tender_edit()
  // {
  //   $id = $_REQUEST['id'];
  //   $sql = $this->userModel->edit($id);
  //   $data['sql'] = $sql;
  //   $this->view('index', $data);
  // }
  public function menu_save()
  {
    // echo "<pre>";
    //   print_r($_POST);
    //   die();
    $final_file = null;
    if (isset($_FILES['menu_attachment']['name'])) {
      $file =  $_FILES['menu_attachment']['name'];
      $file_loc = $_FILES['menu_attachment']['tmp_name'];
      $file_size = $_FILES['menu_attachment']['size'];
      $file_type = $_FILES['menu_attachment']['type'];
      $folder = 'upload/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $final_file = str_replace(' ', '-', $new_file_name);


      if (move_uploaded_file($file_loc, $folder . $final_file)) {
      } else {
        echo "File size greater than 300kb!\n\n";
      }
    }
    $data = [
      'tn_menu_name' => trim($_POST['tn_menu_name']),
      'en_menu_name' => trim($_POST['en_menu_name']),
      'level_id' => trim($_POST['level_id']),
      'parent_id' => trim($_POST['parent_id']),
      'menu_link' => trim($_POST['menu_link']),
      'menu_page' => trim($_POST['menu_page']),
      'menu_type' => trim($_POST['menu_type']),
      'menu_id' => $_POST['id'],
      'action' => $_POST['action']
    ];
    $current_whatsnew = $this->menu_model->lastInsertedID();

    $menu_id = json_decode(json_encode($current_whatsnew), true);
    $data['menu_order'] =  $menu_id['menu_id'] + 1;
    $data['is_redirect_popup'] = isset($_POST['is_redirect_popup']) ? $_POST['is_redirect_popup'] : 0;
    // echo "<pre>";
    // print_r($data);
    // die();
    if ($final_file) {
      $data['menu_attachment'] = $final_file;
    } else {
      $data['menu_attachment'] = '';
    }
    $data['created_by'] = $_SESSION['userid'];
    $data['created_on'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $_SESSION['userid'];
    $data['updated_on'] = date('Y-m-d H:i:s');
    $data['status'] = '0';

    if ($data['action'] == "new") {
      if ($this->menu_model->editmenu($data)) {
        $message = 1;
        $response = "Saved ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $response = "Error ";
        $message = 0;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    } else {
      if ($this->menu_model->updatedTender($data)) {
        $message = 1;
        $response = "Updated ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $message = 0;
        $response = "Error ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    }
  }
  // public function list_tender()
  // {

  //   $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
  //   if ($status == null  || $status == 0) {
  //     $status = '0';
  //     $tender = $this->tender_model->getTenderUnpublished($status);
  //   } else {
  //     $status = '1';
  //     $tender = $this->tender_model->getTenderPublished($status);
  //   }

  //   $data['current_tender'] = $tender;
  //   $this->view('admin/list-tender', $data);
  // }
  // public function tender_edit_id()
  // {

  //   $id = $_REQUEST['id'];
  //   $sql = $this->tender_model->edit($id);
  //   $data['sql'] = $sql;
  //   $this->view('admin/edit-tender', $data);
  //   // $this->view('index', $data);
  // }
  // public function tender_delete()
  // {
  //   $data = [
  //     'tender_id' => $_REQUEST['tender_id'],
  //     'status' => 2
  //   ];
  //   $data['deleted_by'] = $_SESSION['userid'];
  //   $data['deleted_on'] = date('Y-m-d H:i:s');

  //   if ($this->tender_model->deletedTender($data)) {
  //     $message = 1;
  //     header('Content-Type: application/json');
  //     echo json_encode(array("message" => $message));
  //   }
  // }
  // public function tender_publish()
  // {
  //   $data = [
  //     'tender_id' => $_REQUEST['tender_id'],
  //     'status' => 1
  //   ];
  //   if ($this->tender_model->publishTender($data)) {
  //     $message = 1;
  //     header('Content-Type: application/json');
  //     echo json_encode(array("message" => $message));
  //   }
  // }
  #######################  Menu Ends #####################
  #######################  Notification Starts #####################
  public function notification()
  {
    $this->view('admin/edit_notification');
  }
  //  public function whatsnew_edit()
  //  {
  //    $id = $_REQUEST['id'];
  //    $sql = $this->userModel->edit($id);
  //    $data['sql'] = $sql;
  //    $this->view('index', $data);
  //  }
  public function notification_save()
  {

    $en_final_file = null;
    $tn_final_file = null;
    if (isset($_FILES['en_notification_pdf']['name'])) {
      $file =  $_FILES['en_notification_pdf']['name'];
      $file_loc = $_FILES['en_notification_pdf']['tmp_name'];
      $file_size = $_FILES['en_notification_pdf']['size'];
      $file_type = $_FILES['en_notification_pdf']['type'];
      $folder = 'notification/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $en_final_file = str_replace(' ', '-', $new_file_name);

      // echo "<pre>";
      // print_r($en_final_file);
      // die();
      if (move_uploaded_file($file_loc, $folder . $en_final_file)) {
      }
    }

    if (isset($_FILES['tn_notification_pdf']['name'])) {
      $file =  $_FILES['tn_notification_pdf']['name'];
      $file_loc = $_FILES['tn_notification_pdf']['tmp_name'];
      $file_size = $_FILES['tn_notification_pdf']['size'];
      $file_type = $_FILES['tn_notification_pdf']['type'];
      $folder = 'notification/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $tn_final_file = str_replace(' ', '-', $new_file_name);

      // echo "<pre>";
      // print_r($tn_final_file);
      // die();
      if (move_uploaded_file($file_loc, $folder . $tn_final_file)) {
      }
    }
    $notification_from_date = date('Y-m-d', strtotime($_POST['notification_from_date']));
    $notification_to_date =  date('Y-m-d', strtotime($_POST['notification_to_date']));
    $data = [
      'en_notification_title' => trim($_POST['en_notification_title']),
      'tn_notification_title' => trim($_POST['tn_notification_title']),
      'notification_from_date' => $notification_from_date,
      'notification_to_date' =>  $notification_to_date,
      'notification_id' => $_POST['id'],
      'action' => $_POST['action']
    ];

    if (isset($_POST['tn_notification_pdf'])) {
      $data['tn_notification_pdf'] = $_POST['tn_notification_pdf'];
    } else {
      $data['tn_notification_pdf'] = ' ';
    }


    if ($en_final_file) {
      $data['en_notification_pdf'] = $en_final_file;
    } else {
      $data['en_notification_pdf'] = $_POST['en_old_pdf'];
    }
    if ($tn_final_file) {
      $data['tn_notification_pdf'] = $tn_final_file;
    } else {
      $data['tn_notification_pdf'] = $_POST['tn_old_pdf'];
    }

    $data['created_by'] = $_SESSION['userid'];
    $data['created_on'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $_SESSION['userid'];
    $data['updated_on'] = date('Y-m-d H:i:s');
    $data['status'] = '0';

    if ($data['action'] == "new") {
      if ($this->notification_model->SaveNotification($data)) {
        $message = 1;
        $response = "Saved ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $response = "Error ";
        $message = 0;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    } else {
      if ($this->notification_model->updatedWhatsNew($data)) {
        $message = 1;
        $response = "Updated ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $message = 0;
        $response = "Error ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    }
  }

  public function list_notification()
  {

    $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
    if ($status == null  || $status == 0) {
      $status = '0';
      $notification = $this->notification_model->getWhatsNewUnpublished($status);
    } else {
      $status = '1';
      $notification = $this->notification_model->getNotificationPublished($status);
    }

    $data['current_notification'] = $notification;
    $this->view('admin/list-notification', $data);
  }
  public function notification_edit_id()
  {

    $id = $_REQUEST['id'];
    $sql = $this->notification_model->edit($id);
    $data['sql'] = $sql;
    $this->view('admin/edit_notification', $data);
    // $this->view('index', $data);
  }
  public function notification_delete()
  {
    $data = [
      'notification_id' => $_REQUEST['notification_id'],
      'status' => 2
    ];
    $data['deleted_by'] = $_SESSION['userid'];
    $data['deleted_on'] = date('Y-m-d H:i:s');

    if ($this->notification_model->deletedNotification($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  public function notification_publish()
  {
    $data = [
      'notification_id' => $_REQUEST['notification_id'],
      'status' => 1
    ];
    if ($this->notification_model->notification_publish($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  #######################  WhatsNew Ends #####################
  #######################  Page Creation Starts #####################
  public function page()
  {
    $this->view('admin/edit-page');
  }
  public function page_edit()
  {
    $id = $_REQUEST['id'];
    $sql = $this->userModel->edit($id);
    $data['sql'] = $sql;
    $this->view('index', $data);
  }
  public function page_save()
  {

    $data = [
      'tn_title' => trim($_POST['tn_title']),
      'en_title' => trim($_POST['en_title']),
      'tn_page_content' => trim($_POST['tn_page_content']),
      'en_page_content' => trim($_POST['en_page_content']),
      'page_id' => $_POST['id'],
      'action' => $_POST['action']
    ];
    $data['created_by'] = $_SESSION['userid'];
    $data['created_on'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $_SESSION['userid'];
    $data['updated_on'] = date('Y-m-d H:i:s');
    $data['status'] = '0';
    // echo"<pre>";
    // print_r($data);
    // die;
    if ($data['action'] == "new") {
      if ($this->page_model->editPage($data)) {
        $message = 1;
        $response = "Saved ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $response = "Error ";
        $message = 0;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    } else {

      if ($this->page_model->updatedPage($data)) {
        $message = 1;
        $response = "Updated ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $message = 0;
        $response = "Error ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    }
  }
  public function list_page()
  {

    $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
    if ($status == null  || $status == 0) {
      $status = '0';
      $page = $this->page_model->getPageUnpublished($status);
    } else {
      $status = '1';
      $page = $this->page_model->getPagePublished($status);
    }

    $data['current_page'] = $page;
    $this->view('admin/list-page', $data);
  }
  public function page_edit_id()
  {

    $id = $_REQUEST['id'];
    $sql = $this->page_model->edit($id);
    $data['sql'] = $sql;
    $this->view('admin/edit-page', $data);
    // $this->view('index', $data);
  }
  public function page_delete()
  {
    $data = [
      'page_id' => $_REQUEST['page_id'],
      'status' => 2
    ];
    $data['deleted_by'] = $_SESSION['userid'];
    $data['deleted_on'] = date('Y-m-d H:i:s');

    if ($this->page_model->deletedPage($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  public function page_publish()
  {
    $data = [
      'page_id' => $_REQUEST['page_id'],
      'status' => 1
    ];
    if ($this->page_model->publishPage($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  #######################  Pages Ends #####################
  #######################  Dashboard Start #####################
  // public function dashboard_whatsnew()
  // {
  //   $status = 0;
  //   $getWhatsNewUnpublishedCount = $this->whatsnew_model->getWhatsNewUnpublishedCount($status);
  //   $status = 1;
  //   $getNotificationPublishedCount = $this->whatsnew_model->getNotificationPublishedCount($status);
  //   $getNotificationAllCount = $this->whatsnew_model->getNotificationAllCount();
  //   $data['getWhatsNewUnpublishedCount'] = $getWhatsNewUnpublishedCount;
  //   $data['getNotificationPublishedCount'] = $getNotificationPublishedCount;
  //   $data['getNotificationAllCount'] = $getNotificationAllCount;
  //   $this->view('admin/dashboard', $data);
  // }
  // public function ajaxresponsefordashboardmenu()
  // {

  //   if (isset($_POST["selectedparent_menu"])) {
  //     $selectedparent_menu = $_POST["selectedparent_menu"];

  //     $submenu = $this->menu_model->getAllSubMenu($selectedparent_menu);
  //     $countmenu = json_decode(json_encode($submenu), true);


  //     echo "<label class='common-label'>Sub menu:</label>";
  //     echo "<select class='sub_menu' id='sub_menu'>";
  //     echo "<option value=''>Select or None </option>";
  //     foreach ($countmenu as $value) {
  //       echo "<option value='" . $value['id'] . "' myTag='" . $value['menu_key'] . "'>" . $value['en_menu_name'] . "</option>";
  //     }
  //     echo "</select>";
  //   }
  // }
  public function ajaxresponsesectiondash()
  {

    $data = $_POST['myTag'];
    $myTag  = strtolower($data);
    $submenu_pub = $this->common_model->getAllSubDashPub($myTag);
    $countmenupub = json_decode(json_encode($submenu_pub), true);
    $submenu = $this->common_model->getAllSubDashUnPub($myTag);
    $countmen_unpub = json_decode(json_encode($submenu), true);

    foreach ($countmenupub as $value) {
      $status = '1';
      echo ' <div class="col-4 offset-md-2">';
      echo ' <a href="AdminController/list_' . $myTag . '?status=' . $status . '">';
      echo ' <div class="card">';
      echo '<div class="card-header allrecord">';
      echo '<p class="business-model">Publish</p>';
      echo '<h2 class="money">' . $value['count'] . '</h2>';
      echo '</div>';
      echo '</div>';
      echo '</a>';
      echo '</div>';
    }

    foreach ($countmen_unpub as $value) {
      $status = '0';
      echo ' <div class="col-4 offset-md-2">';
      echo ' <a href="AdminController/list_' . $myTag . '?status=' . $status . '">';
      echo ' <div class="card">';
      echo '<div class="card-header allpublished">';
      echo '<p class="business-model">UnPublish</p>';
      echo '<h2 class="money">' . $value['count'] . '</h2>';
      echo '</div>';
      echo '</div>';
      echo '</a>';
      echo '</div>';
    }
  }
  #######################  Dashboard Ends #####################
  // }
  #######################  profile Starts #####################
  public function profile()
  {
    $this->view('admin/edit_profile');
  }
  public function profile_save()
  {
    $final_file = null;
    if (isset($_FILES['profile_photo']['name'])) {
      $file =  $_FILES['profile_photo']['name'];
      $file_loc = $_FILES['profile_photo']['tmp_name'];
      $file_size = $_FILES['profile_photo']['size'];
      $file_type = $_FILES['profile_photo']['type'];
      $folder = 'profile/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $final_file = str_replace(' ', '-', $new_file_name);

      if (move_uploaded_file($file_loc, $folder . $final_file)) {
      } else {
        echo "File size greater than 300kb!\n\n";
      }
    }

    $data = [
      'tn_profile_name' => trim($_POST['tn_profile_name']),
      'en_profile_name' => trim($_POST['en_profile_name']),
      'profile_check' => trim($_POST['profile_check']),
      'tn_profile_position' => trim($_POST['tn_profile_position']),
      'en_profile_position' => trim($_POST['en_profile_position']),
      'en_profile_qualification' => trim($_POST['en_profile_qualification']),
      'tn_profile_qualification' => trim($_POST['tn_profile_qualification']),
      'en_profile_constis_name' => trim($_POST['en_profile_constis_name']),
      'tn_profile_constis_name' => trim($_POST['tn_profile_constis_name']),
      'en_profile_party' => trim($_POST['en_profile_party']),
      'tn_profile_party' => trim($_POST['tn_profile_party']),
      'profile_contact' => trim($_POST['profile_contact']),
      'profile_mobile' => trim($_POST['profile_mobile']),

      'profile_fax' => trim($_POST['profile_fax']),
      'profile_email' => trim($_POST['profile_email']),
      'en_profile_address' => trim($_POST['en_profile_address']),
      'tn_profile_address' => trim($_POST['tn_profile_address']),
      'profile_id' => $_POST['id'],
      'action' => $_POST['action']
    ];
    // echo"<pre>";
    // print_r($data);
    // die;
    if ($final_file) {
      $data['profile_photo'] = $final_file;
    } else {
      $data['profile_photo'] = $_POST['old_profile_photo'];
    }
    $data['created_by'] = $_SESSION['userid'];
    $data['created_on'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $_SESSION['userid'];
    $data['updated_on'] = date('Y-m-d H:i:s');
    $data['status'] = '0';

    if ($data['action'] == "new") {
      if ($this->profile_model->editProfile($data)) {
        $message = 1;
        $response = "Saved ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $response = "Error ";
        $message = 0;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    } else {
      if ($this->profile_model->updatedProfile($data)) {
        $message = 1;
        $response = "Updated ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      } else {
        $message = 0;
        $response = "Error ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    }
  }
  public function list_profile()
  {

    $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
    if ($status == null  || $status == 0) {
      $status = '0';
      $profile = $this->profile_model->getProfileUnpublished($status);
    } else {
      $status = '1';
      $profile = $this->profile_model->getProfilePublished($status);
    }

    $data['current_profile'] = $profile;
    $this->view('admin/list-profile', $data);
  }
  public function profile_edit_id()
  {

    $id = $_REQUEST['id'];
    $sql = $this->profile_model->edit($id);
    $data['sql'] = $sql;
    $this->view('admin/edit_profile', $data);
    // $this->view('index', $data);
  }
  public function profile_delete()
  {
    $data = [
      'profile_id' => $_REQUEST['profile_id'],
      'status' => 2
    ];
    $data['deleted_by'] = $_SESSION['userid'];
    $data['deleted_on'] = date('Y-m-d H:i:s');

    if ($this->profile_model->deletedProfile($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  public function profile_publish()
  {

    $data = [
      'profile_id' => $_REQUEST['profile_id'],
      'status' => 1
    ];

    if ($this->profile_model->publishProfile($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  #######################  profile Starts #####################

  #######################  Menu ReOrder Start #####################
  public function list_menureorder()
  {
    $current_menu = $this->menu_model->getMenuPublished();
    $data['current_menu'] = $current_menu;
    // echo"<pre>";
    // print_r($data);
    // die;
    $this->view('admin/list-menureorder', $data);
  }
  public function ajaxresponsemenuorder()
  {

    if (isset($_POST["action"])) {

      if ($_POST["action"] == 'fetch_data') {

        $ret = $this->menu_model->reorderMenus();
        $data  = $ret;
        echo json_encode($data);
      }

      if ($_POST['action'] == 'update') {
        $data = [
          'page_id_array' => $_POST["page_id_array"]
        ];
        if ($this->menu_model->updatereorderMenu($data)) {
          $message = 1;
          $response = "Saved ";
          header('Content-Type: application/json');
          echo json_encode(array("message" => $message, "response" => $response));
        } else {
          $message = 0;
          $response = "Saved ";
          header('Content-Type: application/json');
          echo json_encode(array("message" => $message, "response" => $response));
        }
      }
    }
  }
  #######################  Menu ReOrder Ends #####################
  #######################  WhatsNew Starts #####################
  public function mst_contactus()
  {
    $data = [
      'status' => '0',
    ];
    $mst_contactus = $this->mst_contactus_model->getcon_staoffice_name($data);
    $data['current_mst_contactus'] = $mst_contactus;
    // echo"<pre>";
    // print_r($data['current_mst_contactus']);
    // die;
    $this->view('admin/edit_mst_contactus', $data);
  }

  public function mst_contactus_save()
  {
    //  echo"<pre>";
    //  print_r($_POST);
    //  print_r($_FILES);

    //  die;
    $en_final_file = null;
    $tn_final_file = null;
    if (isset($_FILES['en_pdf']['name'])) {
      $file =  $_FILES['en_pdf']['name'];
      $file_loc = $_FILES['en_pdf']['tmp_name'];
      $file_size = $_FILES['en_pdf']['size'];
      $file_type = $_FILES['en_pdf']['type'];
      $folder = 'contactus/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $en_final_file = str_replace(' ', '-', $new_file_name);

      // echo "<pre>";
      // print_r($final_file);
      // die();
      if (move_uploaded_file($file_loc, $folder . $en_final_file)) {
      }
    }
    if (isset($_FILES['tn_pdf']['name'])) {
      $file =  $_FILES['tn_pdf']['name'];
      $file_loc = $_FILES['tn_pdf']['tmp_name'];
      $file_size = $_FILES['tn_pdf']['size'];
      $file_type = $_FILES['tn_pdf']['type'];
      $folder = 'contactus/';
      $new_size = $file_size / 2000000;
      /* make file name in lower case */
      $new_file_name = strtolower($file);
      /* make file name in lower case */
      $tn_final_file = str_replace(' ', '-', $new_file_name);

      // echo "<pre>";
      // print_r($final_file);
      // die();
      if (move_uploaded_file($file_loc, $folder . $tn_final_file)) {
      }
    }
    $data = [
      'tn_title' => trim($_POST['tn_title']),
      'en_title' => trim($_POST['en_title']),
      'mst_con_dropdown' => trim($_POST['mst_con_dropdown']),
      'mst_contactus_id' => $_POST['id'],
      'action' => $_POST['action']
    ];


    if (isset($_POST['tn_pdf'])) {
      $data['tn_pdf'] = $_POST['tn_pdf'];
    } else {
      $data['tn_pdf'] = ' ';
    }

    if ($en_final_file) {
      $data['en_pdf'] = $en_final_file;
    } else {
      $data['en_pdf'] = $_POST['en_old_pdf'];
    }

    if ($tn_final_file) {
      $data['tn_pdf'] = $tn_final_file;
    } else {
      $data['tn_pdf'] = $_POST['tn_old_pdf'];
    }
    $data['created_by'] = $_SESSION['userid'];
    $data['created_on'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $_SESSION['userid'];
    $data['updated_on'] = date('Y-m-d H:i:s');
    $data['status'] = '0';
    $data['status_office'] = '1';
    // echo "<pre>";
    // print_r($data);
    // die;
    if ($data['action'] == "new") {

      if ($this->mst_contactus_model->editMst_Contactus($data)) {
        if ($this->mst_contactus_model->editMst_Contactus_office_name($data)) {
          $message = 1;
          $response = "Saved ";
          header('Content-Type: application/json');
          echo json_encode(array("message" => $message, "response" => $response));
        } else {
          $response = "Error ";
          $message = 0;
          header('Content-Type: application/json');
          echo json_encode(array("message" => $message, "response" => $response));
        }
      }
    } else {
      if ($this->mst_contactus_model->updateMst_Contactus($data)) {
        $data['status_office'] = '1';
        if ($this->mst_contactus_model->editMst_Contactus_office_name($data)) {
          $message = 1;
          $response = "Updated ";
          header('Content-Type: application/json');
          echo json_encode(array("message" => $message, "response" => $response));
        }
      } else {
        $message = 0;
        $response = "Error ";
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message, "response" => $response));
      }
    }
  }

  public function list_mst_contactus()
  {
    $data = [
      'status' => '0',
      'status1' => '1'
    ];
    $mst_contactus = $this->mst_contactus_model->getcon_staoffice($data);
    $data['current_mst_contactus'] = $mst_contactus;
    $this->view('admin/list-mst_contactus', $data);
  }
  public function mst_contactus_edit_id()
  {
    $mst_contactus = $this->mst_contactus_model->getcon_staoffice_name_publish();
    $data['current_mst_contactus'] = $mst_contactus;
    $id = $_REQUEST['id'];
    $sql = $this->mst_contactus_model->edit($id);
    $data['sql'] = $sql;
    // echo "<pre>";
    // print_r( $data['sql']);
    // die;
    $this->view('admin/edit_mst_contactus', $data);
    // $this->view('index', $data);
  }
  public function mst_contactus_delete()
  {
    $data = [
      'mst_contactus_id' => $_REQUEST['mst_contactus_id'],
      'mst_con_dropdown' => $_REQUEST['mst_con_dropdown'],
      'status' => 2
    ];
    $data['deleted_by'] = $_SESSION['userid'];
    $data['deleted_on'] = date('Y-m-d H:i:s');
    $data['status_office'] = '0';
    // echo"<pre>";
    // print_r($data);
    // die;
    if ($this->mst_contactus_model->deleteMst_Contactus($data)) {
      if ($this->mst_contactus_model->editMst_Contactus_office_name($data)) {
        $message = 1;
        header('Content-Type: application/json');
        echo json_encode(array("message" => $message));
      }
    }
  }
  public function mst_contactus_publish()
  {
    $data = [
      'mst_contactus_id' => $_REQUEST['mst_contactus_id'],
      'status' => 1
    ];
    if ($this->mst_contactus_model->publishMst_Contactus($data)) {
      $message = 1;
      header('Content-Type: application/json');
      echo json_encode(array("message" => $message));
    }
  }
  public function mst_contactus_ajax()
  {
    $data = [
      'mst_con_dropdown' => $_REQUEST['old_mst_contactus'],
      'status_office' => 0,
    ];
    if ($this->mst_contactus_model->editMst_Contactus_office_name($data)) {
    }
  }
  #######################  WhatsNew Ends #####################
}
