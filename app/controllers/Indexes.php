<?php
class Indexes extends Controller
{
  private $db;
  public function __construct()
  {
    $this->whatsnew_model = $this->model('WhatsNew_Model');
    $this->tender_model = $this->model('Tender_Model');
    $this->notification_model = $this->model('Notification_Model');
    $this->menu_model = $this->model('Menu_Model');
    $this->page_model = $this->model('Page_Model');
    $this->profile_model = $this->model('Profile_Model');
    $this->about_level_model = $this->model('About_level_Model');
    $this->mst_contactus_model = $this->model('Mst_Contactus_Model');
    $this->role_honour_model = $this->model('Role_Honour_Model');
    $this->db = new Database;
  }

  // public function index(){
  //   $this->view('home/index');
  // }
  public function index()
  {
    $status = '1';
    $position = 'mt';
    $Mst_Aboutusmt = $this->profile_model->getProfile_view($status,$position);
    $data['Mst_Aboutusmt'] = $Mst_Aboutusmt;
    $status = '1';
    $position = 'cmt';
    $Mst_About =  $this->profile_model->getProfile_view($status,$position);

    $data['Mst_Aboutus'] = $Mst_About;
    $status = '1';
    $parent_menu_id = '0';
    $whatsnew = $this->whatsnew_model->getWhatsNewPublished($status);
    $data['current_whatsnew'] = $whatsnew;
    $tender = $this->tender_model->getTenderPublished($status);
    $data['current_tender'] = $tender;
    $notification = $this->notification_model->getNotificationPublished($status);
    $data['current_notification'] = $notification;

    $this->view('home/index', $data);
  }
  public function lang()
  {
    if (isset($_POST['lang'])) {
      echo $_SESSION['lang'] = $_POST['lang'];
    }
  }
  public function page($id)
  {
    $page_id = base64_decode($id);
    $page = $this->page_model->DisplayPage($page_id);
    // echo "<pre>";
    // print_r($page);
    // die;
    $data['page'] = $page;
    $this->view('home/page', $data);
  }
  public function vision_mission()
  {
    $this->view('home/about_vision_mission');
  }
  public function about_chief_minister()
  {
    $status = '1';
    $position = 'cmt';
    $Mst_About = $this->profile_model->getProfile_view($status,$position);


    $data['Mst_Aboutus'] = $Mst_About;
    $this->view('home/about_vision_mission_cm', $data);
  }
  public function about_transport_minister()
  {
    $status = '1';
    $position = 'mt';
    $Mst_About = $this->profile_model->getProfile_view($status,$position);
    $data['Mst_Aboutus'] = $Mst_About;
    $this->view('home/about_vision_mission_mt', $data);
  }
  public function about_home_secretary()
  {
    $status = '1';
    $position = 'hts';
    $Mst_About = $this->profile_model->getProfile_view($status,$position);
    $data['Mst_Aboutus'] = $Mst_About;
    $this->view('home/about_vision_mission_hts', $data);
  }
  public function about_transport_commissioner()
  {
    $status = '1';
    $position = 'tc';
    $Mst_About = $this->profile_model->getProfile_view($status,$position);
    $data['Mst_Aboutus'] = $Mst_About;
    $this->view('home/about_vision_mission_tc', $data);
  }
  public function about_function_dept()
  {
    $this->view('home/about_function_dept');
  }
  public function about_citizencharter()
  {
    $Result = $this->about_level_model->getAllAbout_level();
    $data['Result'] = $Result;
    $this->view('home/about_citizencharter', $data);
  }
  public function ajax_level_1()
  {
    if (!empty($_POST["level_id_1"])) {
      $level_id_1 = $_POST["level_id_1"];
      $Result = $this->about_level_model->getAbout_level_id($level_id_1);

      echo ' <option value disabled selected>Select </option>';
      foreach ($Result as $state) {
        echo '<option value="' . $state["level_2_id"] . '">' . $state["level_2_menu_name"] . '</option>';
      }
    }
  }
  public function ajax_level_2()
  {
    if ((!empty($_POST["level_id_1"])) and (!empty($_POST["level_id_2"]))) {
      $level_id_2 = $_POST["level_id_2"];
      $level_id_1 = $_POST["level_id_1"];
      if (($level_id_1 == 1) and ($level_id_2 == 1)) {
        echo '<div class="container">
        <div class="table-responsive">
            <table class="table table-bordered about-level table-striped" style="margin-top:20px">
                <thead class="table__head">
                    <tr class="winner__table">
                        <th colspan="3">Description of Service</th>
                        <th colspan="3"><i class="fa fa-user" aria-hidden="true"></i>
                            Learners Driving Licence</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Eligibility of applicant</td>
                        <td colspan="3">
                            <p>
                            <ul type="i" id="level_11">
                                <li>Completion of age of 16 years for Motor Cycle Without Gear Not Exceeding 50 CC.</li>
                                <li>Completion of age of 18 years for Motor Cycle with gear & Light Motor Vehicle.</li>
                                <li>Completion of age of 20 years for Transport Vehicle.</li>
                                <li>Allicant should appear in person for fresh L.L.R</li>
                            </ul>
                            </p>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Forms prescribed</td>
                        <td colspan="3">
                            <ul type="1" id="form">
                                <li><a href="about_us/form1.pdf" target="_blank">Form No.1</a></li>
                                <li><a href="about_us/form2.pdf" target="_blank">Form No.2</a></li>
                                <li><a href="about_us/form3.pdf" target="_blank">Form No.3</a></li>
                                <li><a href="about_us/form14.pdf" target="_blank">Form No.14</a>
                                    <br>
                                    <p>(Form 14 only for those who studied through Driving School) </p>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Documents to be enclosed</td>
                        <td colspan="3">
                            <div class="row" valign="center">
                                <div class="col-6">
                                    <p class="fw-bolder">1.Address Proof:- (any one of the following to be produced)</p>
                                    <ul type="i" id="level_11">
                                        <li>Ration Card</li>
                                        <li>Electoral Roll</li>
                                        <li>LIC Policy</li>
                                        <li>Passport</li>
                                        <li>E.B.or Telephone bill</li>
                                        <li>Pay slip issued by Govt. Office or a local body.</li>
                                        <li>House tax Receipt</li>
                                        <li>School Certificate</li>
                                        <li>Birth Certificate</li>
                                        <li>Aaddhaar card</li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <p class="fw-bolder">2.Age Proof:-</p>
    
                                    <ul type="i" id="level_11">
                                        <li>Birth Certificate</li>
                                        <li>School Certificate</li>
                                        <li>Passport</li>
                                        <li>LIC Policy</li>
                                        <li>Aaddhaar card</li>
                                        <li>Certificate given by Civil Surgeon</li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <p class="fw-bolder">3. Passport Size Photo 2 Nos.</p>
                                </div>
                            </div>
                        </td>
                    <tr class="winner__table">
    
                        <td colspan="3" valign="middle">Fees to be paid</td>
                        <td colspan="3">
                            <p class="fw-normal">Rs.30 * </p>
                        </td>
                    </tr>
                    <tr class="winner__table">
    
                        <td colspan="3" valign="middle">Whom to apply</td>
                        <td colspan="3">
                            <p class="fw-normal">Licensing Authority or Motor Vehicles Inspector </p>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Competent (Sanction/ Grant) Authority</td>
                        <td colspan="3">
                            <p class="fw-normal">Licensing Authority</p>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Duration of Disposal</td>
                        <td colspan="3">
                            <p class="fw-normal">Same Day</p>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Appellate Authority</td>
                        <td colspan="3">
                            <p class="fw-normal">Joint Transport Commissioner, Chennai City for Chennai Zone and Deputy Transport Commissioner for other zones with fees Rs.40</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="">
            <div class="row pt-2">
                <div class="col-12 text-center">
                <a class="pdf_href"><i class="fa fa-hand-o-right text-danger Blink"></i>&nbsp; * Applicable Service Charges Extra </a>
            </div>
            </div>
        </div>
    </div>';
      } else  if (($level_id_1 == 1) and ($level_id_2 == 2)) {
        echo '<div class="container">
        <div class="table-responsive">
            <table class="table table-bordered about-level table-striped" style="margin-top:20px">
                <thead class="table__head">
                    <tr class="winner__table">
                        <th colspan="3">Description of Service</th>
                        <th colspan="3"><i class="fa fa-user" aria-hidden="true"></i>
                        Driving License</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Eligibility of applicant</td>
                        <td colspan="3">
                            <p>
                            <ul type="1" id="level_11">
                                <li>Completion of age of 16 years for Motor Cycle Without Gear Not exceeding 50 CC.</li>
                                <li>Completion of age of 18 years for Motor Cycle with gear & Light Motor Vehicle.</li>
                                <li>Applicant should appear in person.</li>
                            </ul>
                            </p>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Forms prescribed</td>
                        <td colspan="3">
                            <ul type="1" id="form">
                                <li><a href="about_us/form4.pdf" target="_blank">Form 4</a></li>
                                <li><a href="about_us/form5.pdf" target="_blank">Form 5</a>
                                    <br>
                                    <p>(form 5 only for those who trained through Driving School)</p>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Documents to be enclosed</td>
                        <td colspan="3">
                                    <ul type="1" id="level_11">
                                        <li>Learner\'s License </li>
                                        <li>Vehicle with records.</li>
                                        <li> Consent letter from vehicle owner, to conduct driving test in his vehicle, if the vehicle is not owned by the applicant.</li>
                                        <li>Passport size photo 1 for laminated type & 3 for book type</li>
                                    </ul>
                        </td>
                    <tr class="winner__table">
    
                        <td colspan="3" valign="middle">Fees to be paid</td>
                        <td colspan="3">
                            <p class="fw-normal">Rs.250 for laminated type licence* </p>
                        </td>
                    </tr>
                    <tr class="winner__table">
    
                        <td colspan="3" valign="middle">Whom to apply</td>
                        <td colspan="3">
                            <p class="fw-normal"> Licensing Authority or Motor Vehicles Inspector</p>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Competent (Sanction/ Grant) Authority</td>
                        <td colspan="3">
                            <p class="fw-normal">Licensing Authority</p>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Duration of Disposal</td>
                        <td colspan="3">
                            <p class="fw-normal">Same Day</p>
                        </td>
                    </tr>
                    <tr class="winner__table">
                        <td colspan="3" valign="middle">Appellate Authority</td>
                        <td colspan="3">
                            <p class="fw-normal">Joint Transport Commissioner, Chennai City for Chennai Zone and Deputy Transport Commissioner for other zones with fees Rs.40</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="">
            <div class="row pt-2">
                <div class="col-12 text-center">
                <a class="pdf_href"><i class="fa fa-hand-o-right text-danger Blink"></i>&nbsp; * Applicable Service Charges Extra </a>
            </div>
            </div>
        </div>
    </div>';
      } else {
      }
    }
  }
  public function about_role_honor()
  {
    $status = '1';
    $contactus_home = $this->role_honour_model->publishcontactus_view($status);
    $data['current_about_role_honor'] = $contactus_home;
    $this->view('home/about_role_honor', $data);
  }
  public function about_awards()
  {
    $this->view('home/about_awards');
  }
  public function service_licenseservices()
  {
    $this->view('home/service_licenseservices');
  }
  public function service_vehicleservice()
  {
    $this->view('home/service_vehicleservice');
  }
  public function service_vehicle_permit()
  {
    $this->view('home/service_vehicle_permit');
  }
  public function service_pollution()
  {
    $this->view('home/service_pollution');
  }
  public function service_misc()
  {
    $this->view('home/service_misc');
  }
  public function contactless_services()
  {
    $this->view('home/contactless_services');
  }
  public function faq_learning()
  {
    $this->view('home/faq_learning');
  }

  public function faq_driving()
  {
    $this->view('home/faq_driving');
  }
  public function faq_conductor()
  {
    $this->view('home/faq_conductor');
  }
  public function faq_fitness()
  {
    $this->view('home/faq_fitness');
  }
  public function faq_permit()
  {
    $this->view('home/faq_permit');
  }
  public function contactus_home()
  {
    $data = [
      'status' => '1',
      'ch' => '1'
    ];
    $Mst_Contactus = $this->mst_contactus_model->getMst_ContactusPublished($data);
    // echo"<pre>";
    // print_r($Mst_Contactus);
    // die;
    $data['Mst_Contactus'] = $Mst_Contactus;
    $this->view('home/contactus_home', $data);
  }

  public function contactus_staoffice()
  {
    $data = [
      'status' => '1',
      'ch' => '2'
    ];

    $Mst_Contactus = $this->mst_contactus_model->getMst_ContactusPublished($data);
    $data['Mst_Contactus'] = $Mst_Contactus;
    $this->view('home/contactus_staoffice', $data);
  }

  public function contactus_zonaloffice()
  {
    $data = [
      'status' => '1',
      'ch' => '3'
    ];
    $Mst_Contactus = $this->mst_contactus_model->getMst_ContactusPublished($data);
    $data['Mst_Contactus'] = $Mst_Contactus;
    $this->view('home/contactus_zonaloffice', $data);
  }

  public function contactus_rtooffice()
  {

    $this->view('home/contactus_rtooffice');
  }

  public function contactus_mvioffice()
  {
    $this->view('home/contactus_mvioffice');
  }

  public function contactus_checkpost()
  {

    $this->view('home/contactus_checkpost');
  }
  public function contactus_staoffice_trans()
  {

    $this->view('home/contactus_staoffice_trans');
  }
  public function vehicleservices_Learner()
  {
    $this->view('home/vehicle_learnerlicence');
  }
}
