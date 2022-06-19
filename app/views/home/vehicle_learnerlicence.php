<?php require APPROOT . '/views/_inc/header.php'; ?>
<?php require APPROOT . '/views/_inc/nav.php'; ?>
<style>
    label,
    input,
    textarea {
        display: block;
        width: 100%;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    li {
        padding: 0.3em;
    }

    span {
        font-weight: 700;
        color: #102a43;
        line-height: 35px;
        line-height: 2.5rem;
        font-size: 12px;
        font-size: 0.8rem;
        text-transform: uppercase;
    }


    .container.form {
        width: 90%;
        margin: 2em auto;
    }

    form {
        background-color: #ffffff;
        padding-top: 40px;
        padding-right: 40px;
        padding-bottom: 40px;
        padding-left: 40px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        border-radius: 3px;
        overflow: hidden;
    }
</style>
<div class="container form">
    <form method="POST" name="loginform" id="loginform" autocomplete="off">
        <section class="">
            <div class="">
                <div class="container pb-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Learner Licence (LLR)</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="breadcrumb-content pt-2">
                        <h3 class="text-center">Learner Licence (LLR)</h3>
                        <p> Before applying for DL, one should get learner licence (LLR commonly called). One who completed 18 years, can apply for LLR through online in https://sarathi.parivahan.gov.in/ You can select your RTO/MVI office with the help of Pincode. You can apply for LLR either directly or through recognised driving schools. Online portal is self-guided and fill up all information required. You have to upload all the necessary documents such as address proof, age proof and medical certificate if applicant age is more than 40 years etc.
                            <br>
                            <br>
                            You can make fees either by online or through nearest SBI branch by offline. Once payment done you can fix the appointment in online itself to take photographs at the RTO/MVI office to avoid unnecessary waiting time. At the end of the process, you will get barcode/QR code acknowledgement slip. Take print out of the acknowledgement slip and visit to the RTO/MVI office on the appointment day and time (you can reach just half an hour before the appointment time). After scrutinizing your application by the Motor Vehicles Inspector, photographs will be taken and you can get LLR print out from portal. This LLR is valid for six months and you can apply for DL of your choice within one month of LLR issue date.
                            <br>
                            <br>

                            If applicant failed in Learner Licence test, he/she can reappear for test on the next day onwards after paying necessary fees. If LLR is expired the applicant has to apply fresh.
                        </p>
                        <br>
                        <h3>Syllabus for LLR Test</h3>
                        <p>
                        <ul class="pal-4">
                            <li>&nbsp;&nbsp;Traffic signs & signals, rules of the road regulations made. </li>
                            <li>&nbsp;&nbsp;Duties of driver during involvement in accident. </li>
                            <li>&nbsp;&nbsp;Precautions to be taken while passing un-manned railway crossing. </li>
                            <li>&nbsp;&nbsp;The Documents he/she should carry with him while driving a vehicle. </li>
                        </ul>
                        </p>
                        <br>
                        <h3>Age Limit</h3>
                        <p class="pal-4">
                            Any person who has completed 16 years of age may get a license for driving a Motor Cycle without Gear - Not exceeding 50 cc.(with parental consent ) Any person who has completed 18 years of age may get a license for driving a Motor Cycle with Gear and Light Motor Vehicle.Any person who has completed 20 years of age.
                        </p>
                        <br>
                        <h3>Educational qualification</h3>
                        <p class="pal-4">
                            There is no minimum educational qualification for driving non transport vehicle such as Car, Motor cycle, Tractor etc.
                        </p>
                        <br>
                        <h3>Documents required</h3>
                        <p>
                        <ul class="pal-4">
                            <li>&nbsp;&nbsp;Application in Form-2 generated through Online</li>
                            <!-- <li>&nbsp;&nbsp;Age proof &nbsp;&nbsp; <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    (Click here)
                                </button></li> -->
                            <li>&nbsp;&nbsp;Age proof &nbsp;&nbsp; <a href="#age-proof" data-bs-toggle="modal" data-bs-target="#age-proof">(Click here)</a></li>
                            <li>&nbsp;&nbsp;Address proof&nbsp;&nbsp; <a href="#address-proof" data-bs-toggle="modal" data-bs-target="#address-proof">(Click here)</a></li>
                            <li>&nbsp;&nbsp;Medical Certificate in <a href="tnweb/images/service_page/form1a.pdf" target="_blank"> Form No.1-A.</a> (in case of Transport vehicle and the age of the applicant is more than 40 years old).</li>
                            <li>&nbsp;&nbsp;Application cum Declaration as to the Physical Fitness <a href="tnweb/images/service_page/form1.pdf" target="_blank"> Form-1. </a> </li>
                        </ul>
                        </p>
                        <br>
                        <h3>Fees</h3>
                        <p>
                        <ul class="pal-4">
                            <li>&nbsp;&nbsp;Fee for LLR for single class of vehicle Rs.230/-. </li>
                            <li>&nbsp;&nbsp;Fee for LLR for double class of vehicle Rs.380/-. </li>
                        </ul>
                        </p>
                        <br>
                        <p class="text-center">Click Here to Learner's License Online Application :
                            <a href="https://sarathi.parivahan.gov.in/sarathiservice/stateSelection.do" class="pdf_href" target="_blank"><i class="fa fa-hand-o-right text-danger Blink"></i>&nbsp; https://sarathi.parivahan.gov.in/ </a>
                        </p>

                    </div>
                </div>

            </div>

        </section>
    </form>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="age-proof" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="age-proof" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="age-proof" class="modal-proof">Any One Of The Following To Be Produced For Age Proof:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="pal-4">
                    <li>&nbsp;&nbsp;1. Aadhar Card</li>
                    <li>&nbsp;&nbsp;2. Birth Certificate</li>
                    <li>&nbsp;&nbsp;3. School Certificate</li>
                    <li>&nbsp;&nbsp;4. Passport </li>
                    <li>&nbsp;&nbsp;5. Electoral Roll</li>
                    <li>&nbsp;&nbsp;6. LIC Policy</li>
                    <li>&nbsp;&nbsp;7. Pay slip issued - Govt. Office (or) a Local Body</li>
                    <li>&nbsp;&nbsp;8. Affidavit Sworn by the applicant before an Executive (or) a First Class Judicial Magistrate (or) Notary Public
                    </li>
                </ul>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> -->
        </div>
    </div>
</div>
<div class="modal fade" id="address-proof" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="address-proof" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="address-proof" class="modal-proof">Any One Of The Following To Be Produced For Address Proof:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="pal-4">
                    <li>&nbsp;&nbsp;1. Aadhar Card</li>
                    <li>&nbsp;&nbsp;2. Passport </li>
                    <li>&nbsp;&nbsp;3. Electoral Roll</li>
                    <li>&nbsp;&nbsp;4. LIC Policy</li>
                    <li>&nbsp;&nbsp;5. Pay slip issued - Govt. Office (or) a Local Body</li>
                    <li>&nbsp;&nbsp;6. Ration Card</li>
                    <li>&nbsp;&nbsp;7. Affidavit Sworn by the applicant before an Executive (or) a First Class Judicial Magistrate (or) Notary Public
                    </li>
                </ul>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> -->
        </div>
    </div>
</div>
<?php require APPROOT . '/views/_inc/logo_slide.php';
?>
<?php require APPROOT . '/views/_inc/footer.php'; ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->