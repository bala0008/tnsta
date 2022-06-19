<?php
class ErrorController extends Controller
{
  public function __construct()
  {
 
  }

  // public function index(){
  //   $this->view('home/index');
  // }
  public function index()
  {
    $this->view('menu/index');
  }
}
