<?php
// Initialize session
session_start();

// Check if the user is not logged in, redirect to login page
if(!isset($_SESSION['eid'])){
    header('location:../login.php?msg=please_login');
    exit; // Ensure script execution stops after redirection
}

// Include configuration file
include_once('../config.php');
?>
<!DOCTYPE HTML>
<html>
    <head> 
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/employer.css" rel="stylesheet">
        <title> Post Jobs </title>
         <script>
             function checkForm() {
// Fetching values from all input fields and storing them in variables.
var desig = document.getElementById("deser").innerHTML;
var vacancy = document.getElementById("vacer").innerHTML;
var desc = document.getElementById("jober").innerHTML;
var fnarea = document.getElementById("fner").innerHTML;
var profile = document.getElementById("proer").innerHTML;
var pay = document.getElementById("payer").innerHTML;
//Check input Fields Should not be blanks.

if(desig == '' && vacancy == '' && desc == '' &&  fnarea =='' && profile=='' && pay=='') {
   return true;

}
else {
alert("Fill in with correct information");
    return false;

}
        }
 </script>
    </head>
    <body>

    <div id="nav">
        <nav>
            <div class="navbar" id="insidenav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Job Portal</a>
                </div>

                <ul class="nav navbar-nav">
                    <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                    <li class="active"><a href="#">Job Posting</a></li>
                
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="post_jobs.php">Post Jobs</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="managejobs.php">Manage Jobs</a></li>

                        </ul>
                    </li>
                
                <form class="navbar-form navbar-left" role="search">
                    
                </form>
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div><!-- /.container-fluid -->


        <div class="container">
        <br/>
        <center><h2>Post Jobs </h2></center>
        <div class="page-header" style="background: #f4511e"></div>
        <h3> Job Details: </h3>
          <div class="page-header" />
        <form id="job_post" role="form" onsubmit="return checkForm();" method="post" class="form-horizontal" action="process_postjob.php">
           
            <div class="form-group">
                <label for="desig" class="control-label col-sm-2">Job Title/ Designation:</label>
                 <div class="col-sm-4"> 
                      <input type="text" class="form-control" name="desig" id="desig" required onblur="validate('text','deser', this.value);">
                 </div>
                 <label id="deser" class="error"></label>
            </div>
            
             <div class="form-group">
                  <label for="vac_no" class="control-label col-sm-2">Number of vacancies:</label>
                  <div class="col-sm-2">  <input type="text" name="vacno" class="form-control" id="vac_no"  required onblur="validate('digit','vacer', this.value)" > </div>
                  <label id="vacer" class="error"></label>
            </div>
            
             <div class="form-group">
                <label for="job_desc" class="control-label col-sm-2">Job Description:</label>
                  <div class="col-sm-5">  <textarea class="form-control" rows="5" id="job_desc" name="jobdesc" required onblur="validate('longtext','jober',this.value)"></textarea> </div>
                <label class="error" id="jober"></label>
            </div>
            
             <div class="form-inline form-group">
                <label for="exp" class="control-label col-sm-2">Work Experiecne:</label>
                  <div class="col-sm-4">
                       <select class="form-control" name="exp" required name="exp" id="exp">
                           <option value=""> -Select- </option>
                            <option value="1">1 </option>
                             <option value="2">2 </option>
                              <option value="3">3 </option>
                               <option value="4">4 </option>
                                <option value="5"> 5</option>
                                 <option value="6">6 </option>
                                  <option value="7">7 </option>
                                   <option value="7 above"> above 7</option>
                       </select> <span> Minimum Years </span>
                   </div>
             </div>
             
            <div class="form-inline form-group">
                <label for="pay-div" class="control-label col-sm-2">Basic Pay:</label>
                  <div class="col-sm-4" id="pay-div">
                         <select class="form-control" id="money" name="money"> 
                           <option value="Rs"> Rs </option>
                           <option value="USD"> USD </option>
                           </select>
                        <input type="text" class="form-control" id="pay" name="pay" required onblur="validate('digit','payer',this.value)">
                   </div>
                   <label class="error" id="payer"></label>
            </div>
            
            <div class="form-group">
                <label for="fnarea" class="control-label col-sm-2">Functional Area:</label>
                 <div class="col-sm-4">  <input type="text" class="form-control" id="fnarea" required name="fnarea"> </div>
                 <label class="error" id="fner"></label>
               
            </div>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdowns</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="form-group form-inline">
        <label for="location" class="control-label col-sm-2">Location:</label>
        <div class="col-sm-6">   
            <select name="country" class="form-control countries" id="countryId" required>
                 <option value="">Select Country</option>
            </select>
            <select name="state" class="form-control states" id="stateId" required>
                <option value="">Select State</option>
            </select> 
            <select name="city" class="form-control cities" id="cityId" required>
                <option value="">Select City</option> 
            </select>
        </div>
    </div>

    <script>
        // Example static data
        var countriesData = {
            "USA": {
                "states": {
                    "New York": ["New York City", "Albany"],
                    "California": ["Los Angeles", "San Francisco"]
                }
            },
            "UK": {
                "states": {
                    "England": ["London", "Manchester"],
                    "Scotland": ["Edinburgh", "Glasgow"]
                }
            }
            // Add more countries, states, and cities as needed
        };

        $(document).ready(function() {
            // Populate countries dropdown
            var $countriesDropdown = $('#countryId');
            $.each(countriesData, function(country) {
                $countriesDropdown.append('<option value="' + country + '">' + country + '</option>');
            });

            // Update states dropdown based on selected country
            $countriesDropdown.change(function() {
                var selectedCountry = $(this).val();
                var $statesDropdown = $('#stateId');
                $statesDropdown.empty().append('<option value="">Select State</option>');
                if (selectedCountry !== '') {
                    $.each(countriesData[selectedCountry].states, function(state) {
                        $statesDropdown.append('<option value="' + state + '">' + state + '</option>');
                    });
                }
            });

            // Update cities dropdown based on selected state
            $('#stateId').change(function() {
                var selectedCountry = $('#countryId').val();
                var selectedState = $(this).val();
                var $citiesDropdown = $('#cityId');
                $citiesDropdown.empty().append('<option value="">Select City</option>');
                if (selectedCountry !== '' && selectedState !== '') {
                    $.each(countriesData[selectedCountry].states[selectedState], function(index, city) {
                        $citiesDropdown.append('<option value="' + city + '">' + city + '</option>');
                    });
                }
            });
        });
    </script>
</body>
</html>

            </div>
            <div class="form-group">
                <label for="indtype" class="control-label col-sm-2">Industry:</label>
                <div class="col-sm-5">
                <select name="indtype" id="indtype" class="form-control"  required>
                    <option selected="selected" value="">- Select an Industry -</option>
                    <option value="Accessories/Apparel/Fashion Design">Accessories/Apparel/Fashion Design</option>
                    <option value="Accounting/Consulting/Taxation">Accounting/Consulting/Taxation</option>
                    <option value="Advertising/Event Management/PR">Advertising/Event Management/PR</option>
                    <option value="Agriculture/Dairy Technology">Agriculture/Dairy Technology</option>
                    <option value="Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants">Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants</option>
                    <option value="Animation / Gaming">Animation / Gaming</option>
                    <option value="Architectural Services/ Interior Designing">Architectural Services/ Interior Designing</option>
                    <option value="Auto Ancillary/Automobiles/Components">Auto Ancillary/Automobiles/Components</option>
                    <option value="Banking/Financial Services/Stockbroking/Securities">Banking/Financial Services/Stockbroking/Securities</option>
                    <option value="Banking/FinancialServices/Broking">Banking/FinancialServices/Broking</option>
                    <option value="Biotechnology/Pharmaceutical/Clinical Research">Biotechnology/Pharmaceutical/Clinical Research</option>
                    <option value="Brewery/Distillery">Brewery/Distillery</option>
                    <option value="Cement/Construction/Engineering/Metals/Steel/Iron">Cement/Construction/Engineering/Metals/Steel/Iron</option>
                    <option value="Ceramics/Sanitaryware">Ceramics/Sanitaryware</option>
                    <option value="Chemicals/Petro Chemicals/Plastics">Chemicals/Petro Chemicals/Plastics</option>
                    <option value="Computer Hardware/Networking">Computer Hardware/Networking</option>
                    <option value="Consumer FMCG/Foods/Beverages">Consumer FMCG/Foods/Beverages</option>
                    <option value="Consumer Goods - Durables">Consumer Goods - Durables</option>
                    <option value="Courier/Freight/Transportation/Warehousing">Courier/Freight/Transportation/Warehousing</option>
                    <option value="CRM/ IT Enabled Services/BPO">CRM/ IT Enabled Services/BPO</option>
                    <option value="Education/Training/Teaching">Education/Training/Teaching</option>
                    <option value="Electricals/Switchgears">Electricals/Switchgears</option>
                    <option value="Employment Firms/Recruitment Services Firms">Employment Firms/Recruitment Services Firms</option>
                    <option value="Entertainment/Media/Publishing/Dotcom">Entertainment/Media/Publishing/Dotcom</option>
                    <option value="Export Houses/Textiles/Merchandise">Export Houses/Textiles/Merchandise</option>
                    <option value="FacilityManagement">FacilityManagement</option>
                    <option value="Fertilizers/Pesticides">Fertilizers/Pesticides</option>
                    <option value="FoodProcessing">FoodProcessing</option>
                    <option value="Gems and Jewellery">Gems and Jewellery</option>
                    <option value="Glass">Glass</option>
                    <option value="Government/Defence">Government/Defence</option>
                    <option value="Healthcare/Medicine">Healthcare/Medicine</option>
                    <option value="HeatVentilation/AirConditioning">HeatVentilation/AirConditioning</option>
                    <option value="Insurance">Insurance</option>
                    <option value="KPO/Research/Analytics">KPO/Research/Analytics</option>
                    <option value="Law/Legal Firms">Law/Legal Firms</option>
                    <option value="Machinery/Equipment Manufacturing/Industrial Products">Machinery/Equipment Manufacturing/Industrial Products</option>
                    <option value=">Mining">Mining</option>
                    <option value="NGO/Social Services">NGO/Social Services</option>
                    <option value="Office Automation">Office Automation</option>
                    <option value="Others/Engg. Services/Service Providers">Others/Engg. Services/Service Providers</option>
                    <option value="Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy">Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy</option>
                    <option value="Printing/Packaging">Printing/Packaging</option>
                    <option value="Publishing">Publishing</option>
                    <option value="Real Estate">Real Estate</option>
                    <option value="Retailing">Retailing</option>
                    <option value="Security/Law Enforcement">Security/Law Enforcement</option>
                    <option value="Shipping/Marine">Shipping/Marine</option>
                    <option value="Software Services">Software Services</option>
                    <option value="Steel">Steel</option>
                    <option value="Strategy/ManagementConsultingFirms">Strategy/ManagementConsultingFirms</option>
                    <option value="Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor">Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor</option>
                    <option value="Telecom/ISP">Telecom/ISP</option>
                    <option value="Tyres">Tyres</option>
                    <option value="WaterTreatment/WasteManagement">WaterTreatment/WasteManagement</option>
                    <option value="Wellness/Fitness/Sports">Wellness/Fitness/Sports</option>
                </select>
                </div>
            </div>
            <h3> Desired Candidate Profile:</h3>
            <div class="page-header" />
                <div class="form-group">
                    <label for="ugcourse" class="control-label col-sm-2">Specify UG Qualification:</label>
                    <div class="col-sm-4 "><select name="ugcourse" id="ugcourse"  name="ugcourse" class=" form-control" required>
               <option value="" label="Select">Select</option>
               <option value="B.A">B.A</option>
               <option value="B.Arch">B.Arch</option>
               <option value="BCA">BCA</option>
               <option value="B.B.A">B.B.A</option>
               <option value="B.Com">B.Com</option>
               <option value="B.Ed">B.Ed</option>
               <option value="BDS">BDS</option>
               <option value="BHM">BHM</option>
               <option value="B.Pharma">B.Pharma</option>
               <option value="B.Sc">B.Sc</option>
               <option value="B.Tech/B.E.">B.Tech/B.E.</option>
               <option value="LLB">LLB</option>
               <option value="MBBS">MBBS</option>
               <option value="Diploma">Diploma</option>
               <option value="BVSC">BVSC</option>
               <option value="Other">Other</option>
               </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pgcourse" class="control-label col-sm-2">Specify PG Qualification:</label>
                    <div class="col-sm-4">
                        <select name="pgcourse" id="pgcourse" name="pgcourse"  class="form-control" required>
                            <option value="">Select</option>
                              <option value="Not Pursuing Post Graduation"> Not Required</option>
                              <option value="CA">CA</option>
                              <option value="CS">CS</option>
                              <option value="ICWA (CMA)">ICWA (CMA)</option>
                              <option value="Integrated PG">Integrated PG</option>
                              <option value="LLM">LLM</option>
                              <option value="M.A">M.A</option>
                              <option value="M.Arch">M.Arch</option>
                              <option value="M.Com">M.Com</option>
                              <option value="M.Ed">M.Ed</option>
                              <option value="M.Pharma">M.Pharma</option>
                              <option value="M.Sc">M.Sc</option>
                              <option value="M.Tech">M.Tech</option>
                              <option value="MBA/PGDM">MBA/PGDM</option>
                              <option value="MCA">MCA</option>
                              <option value="MS">MS</option>
                              <option value="PG Diploma">PG Diploma</option>
                              <option value="MVSC">MVSC</option>
                             <option value="MCM">MCM</option>
                             <option value="Other">Other</option>
                         </select> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="profile" class="control-label col-sm-2">Desired Candidate Profile</label>
                    <div class="col-sm-5"><textarea id="profile" rows="5" name="profile" class="form-control" required onblur="validate('longtext','proer',this.value)"></textarea></div>
                    <label class="error" id="proer"></label>
                </div>
                <div class="page-header" />
                <p> Are you sure to submit the job! Check for errors before submitting the job</p>
                <div class="form-group col-sm-2">
                     <button class="btn btn-lg btn-primary btn-block" type="submit" id="postbtn">Post Job</button>
        </form>
           </div>
    </body>
 <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
 <link href="../css/main.css" rel="stylesheet">
 <link href="../css/employer.css" rel="stylesheet">
 <script type="text/javascript" src="../js/validate.js"></script>
 <script src="../js/jquery-1.12.0.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../location/location.js"></script>
 <script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- Location script -->
<script src="../location/location.js"></script>
</body>
</html>
</html>
