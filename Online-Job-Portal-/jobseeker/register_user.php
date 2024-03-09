<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title> JOB SEEKER REGISTRATION</title>

 <script type="text/javascript" src="/job_portal/js/validate.js"></script>
         <script>
             function checkForm() {
// Fetching values from all input fields and storing them in variables.
var email = document.getElementById("emailerror").innerHTML;
var pass1 = document.getElementById("pass1error").innerHTML;
var pass2 = document.getElementById("pass2error").innerHTML;
var name = document.getElementById("nameerror").innerHTML;
var phone = document.getElementById("phoneerror").innerHTML;
var skills = document.getElementById("skillserror").innerHTML;

               

var p1=document.getElementById("pass1").value;
var p2=document.getElementById("pass2").value;
    if (p1 != p2) {
        document.getElementById("pass2error").innerHTML="Password Donot Match" ;
    }
    else
    {
        document.getElementById("pass2error").innerHTML="" ;

    }

if(email == "" && pass1 == "" && pass2 == "" &&  name == "" && phone == "" && skills == "") {

   //document.getElementById("regcomp").submit();
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

<!-- navigation bar starts here -->
<nav class="navbar" id="insidenav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">Job Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Job Seeker Registration</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<!-- navigation bar ends here -->

<!-- container div for page contents -->
<div class="container">
    <div class="jumbotron">
       <h1>Register & find Jobs</h1>
        <div id="insidejumb">
            <p>
                Helps passive and active jobseekers find better jobs. Get connected with over 45000 recruiters.<br/>
                Apply to jobs in just one click. Apply to thousands of jobs posted daily.
            </p>
        </div>
    </div>
<form role="form" id="reguser" onsubmit="return checkForm()" class="form-horizontal" method="post" action="process_user.php">
<h3 class="h3style"> Your Login details </h3>
<div class="page-header"> </div>
    
<div class="form-group">
    <label for="email" class="control-label col-sm-2">Enter your E-mail:</label>
    <div class="col-sm-4">
       <input type="email" required placeholder="Enter your email" class="form-control" name="email" id="email"
          onblur="validate('email','emailerror',this.value)">
    </div>
    <label class="error" id="emailerror"></label>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="pass1">Create Password:</label>
    <div class="col-sm-4">  
        <input type ="password"  placeholder="Enter your password" name="pass1" id="pass1" class="form-control"
               required onblur="validate('password','pass1error',this.value)">
    </div>
    <label class="error" id="pass1error"></label>
</div>

<div class="form-group">
    <label for="pass2" class="control-label col-sm-2"> Confrim Password: </label>
    <div class="col-sm-4">
        <input type ="password"  placeholder="Confirm your password" name="pass2" id="pass2" class="form-control" required>
    </div>
    <label class="error" id="pass2error"></label>
</div>

<div class="page-header"></div>
<h3 class="h3style"> Your Contact Details</h3>
<div class="page-header"></div>

<div class="form-group">
  <label class="control-label col-sm-2"> Your Full Name:</label>
    <div class="col-sm-5"> 
      <input type ="text" class="form-control" name="name" id="name" placeholder="Enter Your Name"
             required onblur="validate('username','nameerror',this.value)">
   </div>
    <label class="error" id="nameerror"></label>
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
    <div class="form-group">
        <label class="control-label col-sm-2"> Where are you currently located? </label>
        <div class="form-inline"> 
            <select name="country" class="form-control countries" id="countryId" style="width:145px;" required>
                <option value="">Select Country</option>
            </select>
            <select name="state" class="form-control states" id="stateId" style="width:145px;" required>
                <option value="">Select State</option>
            </select> 
            <select name="city" class="form-control cities" id="cityId" style="width:145px;">
                <option value="">Select City</option> 
            </select>
        </div>
    </div>

    <script>
        // Example static data
        var countries = [
            { name: "USA", states: [{ name: "New York", cities: ["New York City", "Albany"] }, { name: "California", cities: ["Los Angeles", "San Francisco"] }] },
            { name: "UK", states: [{ name: "England", cities: ["London", "Manchester"] }, { name: "Scotland", cities: ["Edinburgh", "Glasgow"] }] }
            // Add more countries, states, and cities as needed
        ];

        $(document).ready(function() {
            // Populate countries dropdown
            var $countriesDropdown = $('#countryId');
            countries.forEach(function(country) {
                $countriesDropdown.append('<option value="' + country.name + '">' + country.name + '</option>');
            });

            // Update states dropdown based on selected country
            $countriesDropdown.change(function() {
                var selectedCountry = $(this).val();
                var $statesDropdown = $('#stateId');
                var country = countries.find(c => c.name === selectedCountry);
                $statesDropdown.empty().append('<option value="">Select State</option>');
                if (country) {
                    country.states.forEach(function(state) {
                        $statesDropdown.append('<option value="' + state.name + '">' + state.name + '</option>');
                    });
                }
            });

            // Update cities dropdown based on selected state
            $('#stateId').change(function() {
                var selectedCountry = $('#countryId').val();
                var selectedState = $(this).val();
                var country = countries.find(c => c.name === selectedCountry);
                if (country) {
                    var state = country.states.find(s => s.name === selectedState);
                    var $citiesDropdown = $('#cityId');
                    $citiesDropdown.empty().append('<option value="">Select City</option>');
                    if (state) {
                        state.cities.forEach(function(city) {
                            $citiesDropdown.append('<option value="' + city + '">' + city + '</option>');
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>

<div class="form-group">
    <label for="phone" class="control-label col-sm-3">Enter your phone no:</label>
      <div class="col-sm-5"><input type="text" id="phone" name="phone" class="form-control" required 
          onblur="validate('phone','phonererror',this.value)">
    </div>
      <label class="error" id="phoneerror"></label>
</div>

<div class="page-header"></div>    
<h3 class="h3style"> Your Current Employment Details </h3> 


 <div class="form-group">
                <label for="experience" class="control-label col-sm-2">Work Experience:</label>
                <div class="col-sm-4"> 
                    <select name="experience" id="experience" class="form-control"  required>
                        <option value="">select </option>
                        <option value="1">1 year </option>
                        <option value="2">2 year </option>
                        <option value="3">3 year </option>
                        <option value="4">4 year </option>
                        <option value="5">5 year </option>
                        <option value="6">6 year </option>
                        <option value="7">7 year </option>
                        <option value="8">8 year </option>
                        <option value="9+">9+ year </option>
                    </select>
                </div>
</div>

<div class="form-group">
    <label for="skills" class="control-label col-sm-4">Skills:</label>
      <div class="col-sm-4"><input type="text" id="skills" name="skills" class="form-control" required 
          onblur="validate('text','skillserror',this.value)">
    </div>
      <label class="error" id="skillserror"></label>
</div>

<div class="page-header"></div>    
<h3 class="h3style">Educational Qualification Details </h3> 


 <div class="form-group">
                <label for="ugcourse" class="control-label col-sm-2">Basic Education:</label>
                <div class="col-sm-4"> 
                    <select name="ugcourse" id="ugcourse" class="form-control"  required>
                        <option value="" label="Select">Select</option>
                        <option value="Not Pursuing Graduation"> Not Pursuing Graduation</option>
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
                <label for="pgcourse" class="control-label col-sm-2">Masters:</label>
                <div class="col-sm-4"> 
                    <select name="pgcourse" id="pgcourse" class="form-control"  required>
                                <option value="">Select</option>
                                <option value="Not Pursuing Post Graduation"> Not Pursuing Post Graduation</option>
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

<div class="page-header"> </div>
<div class="form-group form-inline col-sm-10">
  
    <button class="btn btn-success" type="submit"  id="reg">Register</button>
    <label class="col-sm-2"> </label>
     <button class="btn btn-danger" type="reset" id="reset"> Reset </button>
</div>
</form>
</div>
<div class="page-header"> </div>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../location/location.js"></script>
</body>
</html>
