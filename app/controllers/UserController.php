<?php
class UserController extends Controller
{
  public function __construct()
  {
   
    //new model instance
    $this->users = $this->model('Users');
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
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    unset($_SESSION['useremail']);
    unset($_SESSION['rolename']);
    unset($_SESSION['roleid']);
    session_destroy();
    redirect('indexes');
  }
}
