<?php

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Jharkhand Coronavirus update with statistics and graphs: total and new cases, deaths per day, mortality and recovery rates, current active cases, recoveries, trends and timeline">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">-->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/loader.css">
    <link href="images/novirus.png" rel="icon" type="image/png"/>
    <title>Jharkhand COVID-19 tracker</title>
  </head>
  <body>
  <div id="preloader-container">
    <div id="preloader"></div>
  </div>
      <?php include("nav.html"); ?>
      <div class="container bg-dark text-light p-5 mb-3 shadow">
        <div class="row">
          <div class="col-sm-4 d-none d-sm-block">
            
            <h3>Quick links</h3>
            <p>Some important links</p>
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a class="nav-link btn btn-outline-info mb-1" href="#District">Districts wise view</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-info mb-1" href="#ConfirmedCases">Confirmed cases</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-info mb-1" href="#Recovered">Recovered</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-info mb-1" href="#Death">Death</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-info mb-1" href="#newConfirmedCases">COVID-19 increase rate</a>
              </li>
            </ul>
            <hr class="d-sm-none" id="dividingHR">
          </div>

          <div class="col-sm-8" text-center>
            <h3 class="text-center">Jharkhand COVID-19 tracker</h3>
            <h5 class="h5 text-muted text-center">Last updated : <span id="lastUpdateDate">lastupdated()</span></h5>
          <br>
          <div class="p-2 text-center"><h4>Confirmed : <span class="dynamicText" id="cnf">0 </span> <span style="display: none" id="newCnf" class="text-primary"><i class="fas fa-arrow-up"></i>)</span></h4></div>
          <div class="p-2 text-center"><h4>Deaths : <span class="dynamicText" id="ded">0</span> <span style="display: none" id="newDed" class="text-danger"><i class="fas fa-arrow-up"></i>)</span></h4></div>
          <div class="p-2 text-center"><h4>Recovered : <span class="dynamicText" id="rec">0</span> <span style="display: none" id="newRec" class="text-success"><i class="fas fa-arrow-up"></i>)</span></h4></div>
          <div class="p-2 text-center"><h4>Active : <span class="dynamicText" id="act">0</span><span id="newAct"></span></h4></div>
        </div>
      </div>
      </div>

      <div class="container bg-dark text-light p-3 mb-3 shadow"  id="District">
        <p><h3>Districts of Jharkhand with COVID-19 cases <button class="btn btn-info" id="HideUnhide"><i class="fas fa-ellipsis-v"></i></button></h3></p>
        <div class="table-responsive mt-5 p-2" id="table">
        <table id="example" class="display table table-hover" style="width:100%">
          <thead>
              <tr class="text-center text-light">
                <th>District</th>
                <th>Active</th>
                <th>Confirmed</th>
                <th>Cured</th>
                <th>Death</th>
              </tr>
          </thead>
          <tbody>
              <tr id="Bokaro" class="text-center">
                <td class="text-center">Bokaro</td>
                <td class="text-center" id="Bokaro_Act">0</td>
                <td class="text-center"><span id="Bokaro_Cnf">0</span><span id="Bokaro_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Bokaro_Rec">0</span><span id="Bokaro_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Bokaro_Ded">0</span><span id="Bokaro_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Deoghar" class="text-center">
                <td class="text-center">Deoghar</td>
                <td class="text-center" id="Deoghar_Act">0</td>
                <td class="text-center"><span id="Deoghar_Cnf">0</span><span id="Deoghar_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Deoghar_Rec">0</span><span id="Deoghar_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Deoghar_Ded">0</span><span id="Deoghar_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Dhanbad" class="text-center">
                <td class="text-center">Dhanbad</td>
                <td class="text-center" id="Dhanbad_Act">0</td>
                <td class="text-center"><span id="Dhanbad_Cnf">0</span><span id="Dhanbad_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Dhanbad_Rec">0</span><span id="Dhanbad_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Dhanbad_Ded">0</span><span id="Dhanbad_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Giridih" class="text-center">
                <td class="text-center">Giridih</td>
                <td class="text-center" id="Giridih_Act">0</td>
                <td class="text-center"><span id="Giridih_Cnf">0</span><span id="Giridih_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Giridih_Rec">0</span><span id="Giridih_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Giridih_Ded">0</span><span id="Giridih_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Hazaribagh" class="text-center">
                <td class="text-center">Hazaribagh</td>
                <td class="text-center" id="Hazaribagh_Act">0</td>
                <td class="text-center"><span id="Hazaribagh_Cnf">0</span><span id="Hazaribagh_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Hazaribagh_Rec">0</span><span id="Hazaribagh_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Hazaribagh_Ded">0</span><span id="Hazaribagh_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Koderma" class="text-center">
                <td class="text-center">Koderma</td>
                <td class="text-center" id="Koderma_Act">0</td>
                <td class="text-center"><span id="Koderma_Cnf">0</span><span id="Koderma_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Koderma_Rec">0</span><span id="Koderma_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Koderma_Ded">0</span><span id="Koderma_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Ranchi" class="text-center">
                <td class="text-center">Ranchi</td>
                <td class="text-center" id="Ranchi_Act">0</td>
                <td class="text-center"><span id="Ranchi_Cnf">0</span><span id="Ranchi_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Ranchi_Rec">0</span><span id="Ranchi_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Ranchi_Ded">0</span><span id="Ranchi_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Simdega" class="text-center">
                <td class="text-center">Simdega</td>
                <td class="text-center" id="Simdega_Act">0</td>
                <td class="text-center"><span id="Simdega_Cnf">0</span><span id="Simdega_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Simdega_Rec">0</span><span id="Simdega_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Simdega_Ded">0</span><span id="Simdega_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Palamu" class="text-center">
                <td class="text-center">Palamu</td>
                <td class="text-center" id="Palamu_Act">0</td>
                <td class="text-center"><span id="Palamu_Cnf">0</span><span id="Palamu_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Palamu_Rec">0</span><span id="Palamu_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Palamu_Ded">0</span><span id="Palamu_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Garhwa" class="text-center">
                <td class="text-center">Garhwa</td>
                <td class="text-center" id="Garhwa_Act">0</td>
                <td class="text-center"><span id="Garhwa_Cnf">0</span><span id="Garhwa_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Garhwa_Rec">0</span><span id="Garhwa_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Garhwa_Ded">0</span><span id="Garhwa_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Jamtara" class="text-center">
                <td class="text-center">Jamtara</td>
                <td class="text-center" id="Jamtara_Act">0</td>
                <td class="text-center"><span id="Jamtara_Cnf">0</span><span id="Jamtara_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Jamtara_Rec">0</span><span id="Jamtara_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Jamtara_Ded">0</span><span id="Jamtara_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Godda" class="text-center">
                <td class="text-center">Godda</td>
                <td class="text-center" id="Godda_Act">0</td>
                <td class="text-center"><span id="Godda_Cnf">0</span><span id="Godda_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Godda_Rec">0</span><span id="Godda_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Godda_Ded">0</span><span id="Godda_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Dumka" class="text-center">
                <td class="text-center">Dumka</td>
                <td class="text-center" id="Dumka_Act">0</td>
                <td class="text-center"><span id="Dumka_Cnf">0</span><span id="Dumka_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Dumka_Rec">0</span><span id="Dumka_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Dumka_Ded">0</span><span id="Dumka_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Chatra" class="text-center">
                <td class="text-center">Chatra</td>
                <td class="text-center" id="Chatra_Act">0</td>
                <td class="text-center"><span id="Chatra_Cnf">0</span><span id="Chatra_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Chatra_Rec">0</span><span id="Chatra_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Chatra_Ded">0</span><span id="Chatra_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="East_Singhbhum" class="text-center">
                <td class="text-center">East Singhbhum</td>
                <td class="text-center" id="East_Singhbhum_Act">0</td>
                <td class="text-center"><span id="East_Singhbhum_Cnf">0</span><span id="East_Singhbhum_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="East_Singhbhum_Rec">0</span><span id="East_Singhbhum_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="East_Singhbhum_Ded">0</span><span id="East_Singhbhum_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Gumla" class="text-center">
                <td class="text-center">Gumla</td>
                <td class="text-center" id="Gumla_Act">0</td>
                <td class="text-center"><span id="Gumla_Cnf">0</span><span id="Gumla_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Gumla_Rec">0</span><span id="Gumla_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Gumla_Ded">0</span><span id="Gumla_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Khunti" class="text-center">
                <td class="text-center">Khunti</td>
                <td class="text-center" id="Khunti_Act">0</td>
                <td class="text-center"><span id="Khunti_Cnf">0</span><span id="Khunti_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Khunti_Rec">0</span><span id="Khunti_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Khunti_Ded">0</span><span id="Khunti_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Latehar" class="text-center">
                <td class="text-center">Latehar</td>
                <td class="text-center" id="Latehar_Act">0</td>
                <td class="text-center"><span id="Latehar_Cnf">0</span><span id="Latehar_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Latehar_Rec">0</span><span id="Latehar_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Latehar_Ded">0</span><span id="Latehar_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Lohardaga" class="text-center">
                <td class="text-center">Lohardaga</td>
                <td class="text-center" id="Lohardaga_Act">0</td>
                <td class="text-center"><span id="Lohardaga_Cnf">0</span><span id="Lohardaga_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Lohardaga_Rec">0</span><span id="Lohardaga_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Lohardaga_Ded">0</span><span id="Lohardaga_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Pakur" class="text-center">
                <td class="text-center">Pakur</td>
                <td class="text-center" id="Pakur_Act">0</td>
                <td class="text-center"><span id="Pakur_Cnf">0</span><span id="Pakur_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Pakur_Rec">0</span><span id="Pakur_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Pakur_Ded">0</span><span id="Pakur_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Ramgarh" class="text-center">
                <td class="text-center">Ramgarh</td>
                <td class="text-center" id="Ramgarh_Act">0</td>
                <td class="text-center"><span id="Ramgarh_Cnf">0</span><span id="Ramgarh_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Ramgarh_Rec">0</span><span id="Ramgarh_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Ramgarh_Ded">0</span><span id="Ramgarh_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Sahibganj" class="text-center">
                <td class="text-center">Sahibganj</td>
                <td class="text-center" id="Sahibganj_Act">0</td>
                <td class="text-center"><span id="Sahibganj_Cnf">0</span><span id="Sahibganj_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Sahibganj_Rec">0</span><span id="Sahibganj_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Sahibganj_Ded">0</span><span id="Sahibganj_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="Saraikela-Kharsawan" class="text-center">
                <td class="text-center">Saraikela-Kharsawan</td>
                <td class="text-center" id="Saraikela-Kharsawan_Act">0</td>
                <td class="text-center"><span id="Saraikela-Kharsawan_Cnf">0</span><span id="Saraikela-Kharsawan_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="Saraikela-Kharsawan_Rec">0</span><span id="Saraikela-Kharsawan_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="Saraikela-Kharsawan_Ded">0</span><span id="Saraikela-Kharsawan_Ded_New"><!--0--></span></td>
              </tr>
              <tr id="West_Singhbhum" class="text-center">
                <td class="text-center">West Singhbhum</td>
                <td id="West_Singhbhum_Act" class="text-center">0</td>
                <td class="text-center"><span id="West_Singhbhum_Cnf">0</span><span id="West_Singhbhum_Cnf_New"><!--0--></span></td>
                <td class="text-center"><span id="West_Singhbhum_Rec">0</span><span id="West_Singhbhum_Rec_New"><!--0--></span></td>
                <td class="text-center"><span id="West_Singhbhum_Ded">0</span><span id="West_Singhbhum_Ded_New"><!--0--></span></td>
              </tr>
          </tbody>
          <tfoot>
              <tr class="text-light text-center">
                  <th>Total</th>
                  <th><span id="totAct"></span></th>
                  <th><span id="totCnf"></span><span id="totCnfNew"></span></th>
                  <th><span id="totRec"></span><span id="totRecNew"></span></th>
                  <th><span id="totDed"></span><span id="totDedNew"></span></th>
              </tr>
          </tfoot>
      </table>
        </div>

      </div>


      
      <center><div class="container bg-dark px-0 mx-0 py-2 my-3 shadow">

          <div class="graph mb-3 px-0  mx-0 my-2 bg-light">
            <h4 class="p-1 pb-0">Cases reported yet</h4>
            <canvas id="ConfirmedCases"></canvas>
          </div>

          <div class="graph mb-3 px-0  mx-0 my-2 bg-light">
            <h4 class="p-1">Date V/S New case reported</h4>
            <canvas id="newConfirmedCases"></canvas>
          </div>
            
          <div class="graph mb-3 px-0  mx-0 bg-light">
            <h4 class="p-1">Total Recoveries</h4>
            <canvas id="Recovered"></canvas>
          </div>

          <div class="graph mb-3 px-0  mx-0 bg-light">
            <h4 class="p-1">Date V/S New Recovery</h4>
            <canvas id="newRecovered"></canvas>
          </div>

          <div class="graph mb-3 px-0  mx-0 bg-light">
            <h4 class="p-1">Total Death</h4>
            <canvas id="Death"></canvas>
          </div>

          <div class="graph mb-3 px-0  mx-0 bg-light">
            <h4 class="p-1">Date V/S New Death</h4>
            <canvas id="newDeath"></canvas>
          </div>
        
      </div></center>

      <br><br>

      <?php include("footer.html"); ?>

      <!--Scripts-->
    <script src="https://kit.fontawesome.com/51de394d09.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <!--<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>-->
    <script src="script/script.js"></script>
    <script src="script/api.js"></script>
    <script src="script/history.js"></script>
    <script src="script/district.js"></script>
    <script src="script/districtWisenew.js"></script>

    <script>
          $(document).ready( function () {
              $('#example')
                .addClass( 'nowrap' )
                .dataTable( {
                  "paging":   false,
                  responsive: false,
                  "info":     false,
                  columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-right' }
                  ]
                });

                console.log("API -> https://api.covid19india.org/");

                $("#preloader-container").fadeOut(1000);
            });
    </script>
</body>
</html>