<?php
include("config.php");
//date_default_timezone_set('Africa/Lagos');
date_default_timezone_set('Asia/Calcutta'); 



if(isset($_POST['but_upload'])){

 $name = $_FILES['file']['name'];
 $name1 =  $_FILES['file1']['name'];
 $name2 =  $_FILES['file2']['name'];
 $name3 =  $_FILES['file3']['name'];
 $file_tmp = $_FILES['file']['tmp_name'];
 $file_tmp1 = $_FILES['file1']['tmp_name'];
 $file_tmp2 = $_FILES['file2']['tmp_name'];
 $file_tmp3= $_FILES['file3']['tmp_name'];

 $cname=$_POST['company_name'];
 $pname=$_POST['project_name'];
 $synopsis=$_POST['synopsis'];
 $ipcompany=$_POST['ipcompany_name'];
 $ipproject=$_POST['IPproject_name'];
 $placement=$_POST['percent'];
 $package=$_POST['best_placement'];





  $target_dir =  $_SERVER["DOCUMENT_ROOT"]."/animation_form/files/";
 // echo  $target_dir;
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $target_file1 = $target_dir . basename($_FILES["file1"]["name"]);
  $target_file2 = $target_dir . basename($_FILES["file2"]["name"]);
  $target_file3 = $target_dir . basename($_FILES["file3"]["name"]);



  


$temp = explode(".", $_FILES["file"]["name"]);
$newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["file"]["name"]));
//echo $newfilename;

$temp1 = explode(".", $_FILES["file1"]["name"]);
$newfilename1= date('dmYHis').str_replace(" ", "", basename($_FILES["file1"]["name"]));

$temp2 = explode(".", $_FILES["file2"]["name"]);
$newfilename2= date('dmYHis').str_replace(" ", "", basename($_FILES["file2"]["name"]));

$temp3 = explode(".", $_FILES["file3"]["name"]);
$newfilename3= date('dmYHis').str_replace(" ", "", basename($_FILES["file3"]["name"]));



 // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
  $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));


 // Valid file extensions
     $extensions_arr = array("pdf","mp4");

if ($_FILES["file"]["size"] > 2000000 || $_FILES["file1"]["size"] > 2000000 || $_FILES["file2"]["size"] > 2000000 || $_FILES["file3"]["size"] > 2000000) {
     echo "<script>alert('file size greater than 2mb');</script>";

     exit(0);
   
}
else{
 // Check extension


if( in_array($imageFileType,$extensions_arr) || in_array($imageFileType1,$extensions_arr) || in_array($imageFileType2,$extensions_arr) || in_array($imageFileType3,$extensions_arr)  ){

     move_uploaded_file($_FILES["file"]["tmp_name"],  "files/" . $newfilename);
     move_uploaded_file($_FILES["file1"]["tmp_name"], "files/" . $newfilename1);
     move_uploaded_file($_FILES["file2"]["tmp_name"], "files/" . $newfilename2);
     move_uploaded_file($_FILES["file3"]["tmp_name"], "files/" . $newfilename3);

  // Insert record
 // $query = "insert into imagess(name,name1,image,image1,fname,job,mob,email,location) values('$name','$name1','$target_file','$target_file1','$fname','$job','$mob','$email','$location')";

       $query = "insert into placements(appoint_letter,company_name,intern_project,best3_project,video,synopsis,ip_appointment,ip_company,international_project,placement,package)
                  values ('$newfilename','$cname','$pname','$newfilename1','$newfilename2','$synopsis','$newfilename3','$ipcompany','$ipproject','$placement','$package')";
      echo $query;
        mysqli_query($con,$query);
           if ($con->query($query) === true)
            {
                $successMSG="thank you";
         
            }


  // Upload file
      move_uploaded_file($_FILES['file']['name'],$target_dir.$name);
      move_uploaded_file($_FILES['file1']['name'],$target_dir.$name1);
      move_uploaded_file($_FILES['file2']['name'],$target_dir.$name2);
      move_uploaded_file($_FILES['file3']['name'],$target_dir.$name3);

      //echo "<script>alert('Thank you ');</script>";

      //echo"<script>document.getElementById('demos').innerHTML = 'thank you';</script>";
      //echo"<script>return false;</script>";


}
else
{   
  //echo "<script>alert('Please attach minimum one document');</script>";
 
}

}

}


if(isset($_POST['innovation_submit'])){

      $name4 = $_FILES['file4']['name'];
      $file_tmp4 = $_FILES['file4']['tmp_name'];
      $target_dir =  $_SERVER["DOCUMENT_ROOT"]."/animation_form/files/";
      $target_file4 = $target_dir . basename($_FILES["file4"]["name"]);

      $temp4 = explode(".", $_FILES["file4"]["name"]);
      $newfilename4= date('dmYHis').str_replace(" ", "", basename($_FILES["file4"]["name"]));

 
      $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));

       // Valid file extensions

      $extensions_arr = array("pdf");


      if ($_FILES["file4"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        
        //echo "<script>alert('file size greater than 2mb');</script>";
     //echo "<script>return false;</script>";    
    
    
   
}

        if( in_array($imageFileType4,$extensions_arr) || in_array($imageFileType4,$extensions_arr) == " " ){


          move_uploaded_file($_FILES["file4"]["tmp_name"], "files/" . $newfilename4);
 


       $query1 = "insert into innovation_initiative(name) values ('$newfilename4')";
       //echo $query1;
       mysqli_query($con,$query1);

       if ($con->query($query1) === true) {
        $successMSG1="thank you";
         
}
      // Upload file
       move_uploaded_file($_FILES['file4']['name'],$target_dir.$name4);
        
       

       //echo "<script>alert('Thank you ');</script>";
       //$msg = "Thank You";
      // echo "<script>document.getElementById('demo1').innerHTML = 'thank you';</script>";

 }
 else
 {
   // echo "<script>alert('Please attach minimum one document');</script>";
 }


}


if (isset($_POST['infra_submit'])) {
  
  $educate = $_POST['Education'];
  $softwares=$_POST['max_no'];
  $specifications=$_POST['specification'];
  $storage=$_POST['storage'];



  $query2 = "insert into infra_tech(education_facility, certified_softwares, machine_specs, storage_device) values ('$educate','$softwares','$specifications','$storage')";

    //echo $query2;
  mysqli_query($con,$query2);
  echo "<script>alert('Thank you ');</script>";
     if ($con->query($query2) === true) {
        $successMSG2="thank you";
         
}

  //echo $storage;
}

if (isset($_POST['trainer_submit'])) {
  
  $name5 = $_FILES['file5']['name'];
  $name16 = $_FILES['file16']['name'];
  $name6 = $_FILES['file6']['name'];
  $name17 = $_FILES['file17']['name'];
  $name7 = $_FILES['file7']['name'];
  $name8 = $_FILES['file8']['name'];
  $workshop = $_POST['workshop'];
  $lecture = $_POST['guest_lec'];
  $trainer = $_POST['trainer_cmp'];


  $file_tmp5 = $_FILES['file5']['tmp_name'];
  $file_tmp16 = $_FILES['file16']['tmp_name'];
  $file_tmp6 = $_FILES['file6']['tmp_name'];
  $file_tmp17 = $_FILES['file17']['tmp_name'];
  $file_tmp7 = $_FILES['file7']['tmp_name'];
  $file_tmp8 = $_FILES['file8']['tmp_name'];

  $target_dir =  $_SERVER["DOCUMENT_ROOT"]."/animation_form/files/";


  $target_file5 = $target_dir . basename($_FILES["file5"]["name"]);
  $target_file6 = $target_dir . basename($_FILES["file6"]["name"]);
  $target_file7 = $target_dir . basename($_FILES["file7"]["name"]);
  $target_file8 = $target_dir . basename($_FILES["file8"]["name"]);
  $target_file16 = $target_dir . basename($_FILES["file16"]["name"]);
  $target_file17 = $target_dir . basename($_FILES["file17"]["name"]);

  $temp5 = explode(".", $_FILES["file5"]["name"]);
  $newfilename5= date('dmYHis').str_replace(" ", "", basename($_FILES["file5"]["name"]));
  
  $temp6 = explode(".", $_FILES["file6"]["name"]);
  $newfilename6= date('dmYHis').str_replace(" ", "", basename($_FILES["file6"]["name"]));
  
  $temp7 = explode(".", $_FILES["file7"]["name"]);
  $newfilename7= date('dmYHis').str_replace(" ", "", basename($_FILES["file7"]["name"]));
  
  $temp8 = explode(".", $_FILES["file8"]["name"]);
  $newfilename8= date('dmYHis').str_replace(" ", "", basename($_FILES["file8"]["name"]));
  

  $temp16 = explode(".", $_FILES["file16"]["name"]);
  $newfilename16= date('dmYHis').str_replace(" ", "", basename($_FILES["file16"]["name"]));

  $temp17 = explode(".", $_FILES["file17"]["name"]);
  $newfilename17= date('dmYHis').str_replace(" ", "", basename($_FILES["file17"]["name"]));

  $imageFileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));
  $imageFileType6 = strtolower(pathinfo($target_file6,PATHINFO_EXTENSION));
  $imageFileType7 = strtolower(pathinfo($target_file7,PATHINFO_EXTENSION));
  $imageFileType8 = strtolower(pathinfo($target_file8,PATHINFO_EXTENSION));
  $imageFileType16 = strtolower(pathinfo($target_file16,PATHINFO_EXTENSION));
  $imageFileType17 = strtolower(pathinfo($target_file17,PATHINFO_EXTENSION));


 // Valid file extensions
  $extensions_arr = array("pdf");

  if ($_FILES["file5"]["size"] > 2000000 || $_FILES["file6"]["size"] > 2000000 || $_FILES["file7"]["size"] > 2000000 || $_FILES["file8"]["size"] > 2000000 || $_FILES["file16"]["size"] > 2000000 
            || $_FILES["file17"]["size"] > 2000000) {
     echo "<script>alert('file size greater than 2mb');</script>";
     //exit(0);
   
}

if( in_array($imageFileType5,$extensions_arr) || in_array($imageFileType6,$extensions_arr) || in_array($imageFileType7,$extensions_arr) || in_array($imageFileType8,$extensions_arr)
    || in_array($imageFileType16,$extensions_arr) || in_array($imageFileType17,$extensions_arr) ){

   move_uploaded_file($_FILES["file5"]["tmp_name"], "files/" . $newfilename5);
   move_uploaded_file($_FILES["file6"]["tmp_name"], "files/" . $newfilename6);
   move_uploaded_file($_FILES["file7"]["tmp_name"], "files/" . $newfilename7);
   move_uploaded_file($_FILES["file8"]["tmp_name"], "files/" . $newfilename8);
   move_uploaded_file($_FILES["file16"]["tmp_name"], "files/" . $newfilename16);
   move_uploaded_file($_FILES["file17"]["tmp_name"], "files/" . $newfilename17);

       // Insert record

       $query = "insert into trainers(indian_faculty,indian_faculty1,international_faculty,international_faculty1,workshop,guest_lecture,top_guest,trainers_company,profile)
                  values ('$newfilename5','$newfilename16','$newfilename6','$newfilename17','$workshop','$lecture','$newfilename7','$trainer','$newfilename8')";
      //echo $query;
      mysqli_query($con,$query);

         if ($con->query($query) === true) {
        $successMSG3="thank you";
         
}

      // Upload file
      move_uploaded_file($_FILES['file5']['name'],$target_dir.$name5);
      move_uploaded_file($_FILES['file6']['name'],$target_dir.$name6);
      move_uploaded_file($_FILES['file7']['name'],$target_dir.$name7);
      move_uploaded_file($_FILES['file8']['name'],$target_dir.$name8);
      move_uploaded_file($_FILES['file16']['name'],$target_dir.$name8);
      move_uploaded_file($_FILES['file17']['name'],$target_dir.$name8);

      //echo "<script>alert('Thank you ');</script>";


}
 else
 {
    //echo "<script>alert('Please attach minimum one document');</script>";

 }



}

if (isset($_POST['bst_ciri'])) {


      $name9 = $_FILES['file9']['name'];
      $name10 = $_FILES['file10']['name'];
      $name11 = $_FILES['file11']['name'];



      $file_tmp9 = $_FILES['file9']['tmp_name'];
      $file_tmp10 = $_FILES['file10']['tmp_name'];
      $file_tmp11 = $_FILES['file11']['tmp_name'];


      $target_dir =  $_SERVER["DOCUMENT_ROOT"]."/animation_form/files/";

      $target_file9 = $target_dir . basename($_FILES["file9"]["name"]);
      $target_file10 = $target_dir . basename($_FILES["file10"]["name"]);
      $target_file11 = $target_dir . basename($_FILES["file11"]["name"]);



      $temp9 = explode(".", $_FILES["file9"]["name"]);
      $newfilename9= date('dmYHis').str_replace(" ", "", basename($_FILES["file9"]["name"]));

      $temp10 = explode(".", $_FILES["file10"]["name"]);
      $newfilename10= date('dmYHis').str_replace(" ", "", basename($_FILES["file10"]["name"]));

      $temp11 = explode(".", $_FILES["file11"]["name"]);
      $newfilename11= date('dmYHis').str_replace(" ", "", basename($_FILES["file11"]["name"]));


 
      $extensions_arr = array("pdf");


      $imageFileType9 = strtolower(pathinfo($target_file9,PATHINFO_EXTENSION));
      $imageFileType10 = strtolower(pathinfo($target_file10,PATHINFO_EXTENSION));
      $imageFileType11 = strtolower(pathinfo($target_file11,PATHINFO_EXTENSION));


if ($_FILES["file9"]["size"] > 2000000 || $_FILES["file10"]["size"] > 2000000 || $_FILES["file11"]["size"] > 2000000 ) {
     echo "<script>alert('file size greater than 2mb');</script>";
     //exit(0);
   
}

      if( in_array($imageFileType9,$extensions_arr) || in_array($imageFileType10,$extensions_arr) || in_array($imageFileType11,$extensions_arr) ){

      move_uploaded_file($_FILES["file9"]["tmp_name"], "files/" . $newfilename9);
      move_uploaded_file($_FILES["file10"]["tmp_name"], "files/" . $newfilename10);
      move_uploaded_file($_FILES["file11"]["tmp_name"], "files/" . $newfilename11);



      $query = "insert into best_ciricullum(short,mid,longg) values ('$newfilename9','$newfilename10','$newfilename11')";

     // echo $query;

      mysqli_query($con,$query);
         if ($con->query($query) === true) {
        $successMSG4="thank you";
         
}


      move_uploaded_file($_FILES['file9']['name'],$target_dir.$name9);
      move_uploaded_file($_FILES['file10']['name'],$target_dir.$name10);
      move_uploaded_file($_FILES['file11']['name'],$target_dir.$name11);
      //echo "<script>alert('Thank you ');</script>";
    }
     else
     {
       //echo "<script>alert('Please attach minimum one document');</script>";

      }

  }



if (isset($_POST['digital_submit'])) {


      $name12 = $_FILES['file12']['name'];

      $file_tmp12 = $_FILES['file12']['tmp_name'];

      $target_dir =  $_SERVER["DOCUMENT_ROOT"]."/animation_form/files/";

      $target_file12 = $target_dir . basename($_FILES["file12"]["name"]);


      $temp12 = explode(".", $_FILES["file12"]["name"]);
      $newfilename12= date('dmYHis').str_replace(" ", "", basename($_FILES["file12"]["name"]));


      $imageFileType12 = strtolower(pathinfo($target_file12,PATHINFO_EXTENSION));
        
      $extensions_arr = array("pdf");


if ($_FILES["file12"]["size"] > 2000000 ) {
     echo "<script>alert('file size greater than 2mb');</script>";
     //exit(0);
   
}
        if( in_array($imageFileType12,$extensions_arr) || in_array($imageFileType12,$extensions_arr) == " " ){



                  move_uploaded_file($_FILES["file12"]["tmp_name"], "files/" . $newfilename12);


                  $query = "insert into digital(educate) values ('$newfilename12')";
                  

      //echo $query;

                  mysqli_query($con,$query);

                     if ($con->query($query) === true) {
        $successMSG5="thank you";
         
}


                 move_uploaded_file($_FILES['file12']['name'],$target_dir.$name12);
                 //echo "<script>alert('Thank you ');</script>";
    }
    else
    {
      echo "<script>alert('Please attach minimum one document');</script>";
    }


}


if (isset($_POST['leadership_submit'])) {

     $branch =$_POST['max_branch'];
     $vision = $_POST['vision'];
     $partnership = $_POST['partnership'];
     $gov_partner = $_POST['gov_partnership'];
     $industry = $_POST['industry'];
     $scholarship = $_POST['scholarship'];
     $exchange = $_POST['exchange_prgm'];
     $name13 = $_FILES['file13']['name'];

     $file_tmp13 = $_FILES['file13']['tmp_name'];

     $target_dir =  $_SERVER["DOCUMENT_ROOT"]."/animation_form/files/";

     $target_file13 = $target_dir . basename($_FILES["file13"]["name"]);


     $temp13 = explode(".", $_FILES["file13"]["name"]);
     $newfilename13= date('dmYHis').str_replace(" ", "", basename($_FILES["file13"]["name"]));

     $imageFileType = strtolower(pathinfo($target_file13,PATHINFO_EXTENSION));
        
     $extensions_arr = array("pdf");

if ($_FILES["file13"]["size"] > 2000000 ) {
     echo "<script>alert('file size greater than 2mb');</script>";
     //exit(0);
   
}
        if( in_array($imageFileType,$extensions_arr) || in_array($imageFileType,$extensions_arr) == " " ){

             move_uploaded_file($_FILES["file13"]["tmp_name"], "files/" . $newfilename13);


              $query = "insert into edu_leadership(branch,franchise,vision,in_partnership,gov_partnership,industry,scholarship,exchange_program)
                        values ('$branch','$newfilename13','$vision','$partnership','$gov_partner','$industry','$scholarship','$exchange')";

            // echo $query;

              mysqli_query($con,$query);

                 if ($con->query($query) === true) {
        $successMSG6="thank you";
         
}


               move_uploaded_file($_FILES['file13']['name'],$target_dir.$name13);
              // echo "<script>alert('Thank you ');</script>";
    }
     else
    {
      //echo "<script>alert('Please attach minimum one document');</script>";
    }

}

if (isset($_POST['student_submit'])) {
  

      $name14 = $_FILES['file14']['name'];
      $name15 = $_FILES['file15']['name'];


      $file_tmp14 = $_FILES['file14']['tmp_name'];
      $file_tmp15 = $_FILES['file15']['tmp_name'];


      $target_dir =  $_SERVER["DOCUMENT_ROOT"]."/animation_form/files/";

      $target_file14 = $target_dir . basename($_FILES["file14"]["name"]);
      $target_file15 = $target_dir . basename($_FILES["file15"]["name"]);

      $temp14 = explode(".", $_FILES["file14"]["name"]);
      $newfilename14 = date('dmYHis').str_replace(" ", "", basename($_FILES["file14"]["name"]));

      $temp15 = explode(".", $_FILES["file15"]["name"]);
      $newfilename15= date('dmYHis').str_replace(" ", "", basename($_FILES["file15"]["name"]));


      $imageFileType14 = strtolower(pathinfo($target_file14,PATHINFO_EXTENSION));
        $imageFileType15 = strtolower(pathinfo($target_file15,PATHINFO_EXTENSION));
      $extensions_arr = array("pdf");


if ($_FILES["file14"]["size"] > 2000000 || $_FILES["file15"]["size"] > 2000000 ) {
     echo "<script>alert('file size greater than 2mb');</script>";
     //exit(0);
   
}

        if( in_array($imageFileType14,$extensions_arr) || in_array($imageFileType15,$extensions_arr)  ){


                move_uploaded_file($_FILES["file14"]["tmp_name"], "files/" . $newfilename14);
                move_uploaded_file($_FILES["file15"]["tmp_name"], "files/" . $newfilename15);


                $query = "insert into student_zone(animation,graphic)
                         values ('$newfilename14','$newfilename15')";

                //echo $query;

                mysqli_query($con,$query);

   if ($con->query($query) === true) {
        $successMSG7="thank you";
         
}

                move_uploaded_file($_FILES['file14']['name'],$target_dir.$name14);
                move_uploaded_file($_FILES['file15']['name'],$target_dir.$name15);
               // echo "<script>alert('Thank you ');</script>";

    }
     else
    {
      //echo "<script>alert('Sorry, only pdf & doc files are allowed.');</script>";
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Edu Spark</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-32x32.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
  #demo,#demo1,#demo2,#demo3,#demo4,#demo5,#demo6,#demo7{
    color: red;
        margin-left: 42%;
  }
</style>
<body>

	<!--HOME:STARTS-->
	<div id="home">
		<!--HEADER:STARTS-->
		<header>		
			<img src="images/banner.jpg" class="img-fluid">
		</header>
		<!--HEADER:ENDS-->
		<nav class="navbar navbar-expand-lg main-nav">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mx-auto">
      <a class="nav-item nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="index.html#about">About Us</a>
      <a class="nav-item nav-link" href="index.html#venue">Venue</a>
      <a class="nav-item nav-link active" href="#submit">Submit Entries</a>
      <a class="nav-item nav-link" href="index.html#partners">Partners</a>
      <a class="nav-item nav-link" href="index.html#contact">Contact Us</a>
    </div>
  </div>
</nav>
	</div>
  
	<!--HOME:ENDS-->

<section class="form-container" id="form-container" name="myform">

<div class="container">

<div class="inner">
<button class="accordion" aria-expanded="true">Placements</button>
<div class="panel" style="display: block;">
  <?php if(isset($successMSG)){?> <p class="alert alert-success"> <?php echo $successMSG; }?></p>
  <div class="container">
  <form method="post" action="" enctype='multipart/form-data' class="form-horizontal" role="form" name="myForm" onsubmit="return validateForm()">
       <span id="demo"></span>
          <div class="row">
 
     

      <div class="col-md-12">    
          <h3>- Internship</h3>

    <div class="form-row">

    <div class="form-group col-md-6">
      <label for="Appointment_letter" class="mb-2 mr-sm-2" >Appointment letter</label>
        <input type="file" name="file" id="file"  class="form-control mb-2 mr-sm-2" >
        <span>files size should not greater than 2MB</span>
    </div>
    <div class="form-group col-md-6">
       <label for="company_name" class="mb-2 mr-sm-2" >Company name</label>
        <input type="text" name="company_name" id="company_name" class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isString(event)">
    </div>

       
<div class="form-group col-md-6">
        <label for="project_name" class="mb-2 mr-sm-2" >Project Name</label>
        <input type="text" name="project_name"  class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isString(event)">
</div>

</div> 
</div>
<hr>
     <div class="col-md-12">    
      <h3> -Work based assignment</h3>
        <div class="form-row">
		<div class="form-group col-md-6">
		        <label for="best_three_project" class="mb-2 mr-sm-2" >Best Three Project</label>
		        <input type="file" name="file1" class="form-control mb-2 mr-sm-2">
           <span>files size should not greater than 2MB</span>
		</div>

		<div class="form-group col-md-6">
		         <label for="Video " class="mb-2 mr-sm-2" >Video </label>
		        <input type="file" name="file2" class="form-control mb-2 mr-sm-2">
            <span>files size should not greater than 2MB</span>
		</div>
      <div class="form-group col-md-6">    
        <label for="synopsis" class="mb-2 mr-sm-2" >Synopsis</label>
        <input type="text" name="synopsis" class="form-control mb-2 mr-sm-2" >
      </div>
</div>
</div>

<hr>


     <div class="col-md-12">   

      <h3>- International Placement</h3>
       <div class="form-row">
        <div class="form-group col-md-6">
        <label for="IPAppointment letter" class="mb-2 mr-sm-2" >Appointment letter :-</label>
        <input type="file" name="file3" class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>
<div class="form-group col-md-6">
        <label for="IPcompany_name" class="mb-2 mr-sm-2" >Company name :-</label>
        <input type="text" name="ipcompany_name" class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isString(event)">
</div>
<div class="form-group col-md-6">

        <label for="IPproject_name" class="mb-2 mr-sm-2" >Project Name :-</label>
        <input type="text" name="IPproject_name"  class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isString(event)" >
      </div>
      </div>
</div>
<hr>
   <div class="form-group col-md-6"> 
      <h3> <span>-</span> % of placement </h3> 

        <input type="text" name="percent"  class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isNumber(event)">
</div>
 <div class="form-group col-md-6">
      <h3>- Best placement  package</h3>

      <input type="text" name="best_placement" class="form-control mb-2 mr-sm-2">

      
</div>
<div class="form-group col-md-12">
	<input type="submit" name="but_upload" value="submit" class="btn btn-primary" >
	</div>
</div>
</div> 
  </form>
  
</div>

<button class="accordion">Innovation Initiative</button>
<div class="panel">
  <?php if(isset($successMSG1)){?> <p class="alert alert-success"> <?php echo $successMSG1; }?></p>
  <div class="container">

  <form method="post" action="" enctype='multipart/form-data' class="form-horizontal" role="form" name="myForm1" onsubmit="return validateForm1()">

    <span id="demo1"></span>
     <div class="form-row">

      
      <div class="col-md-12">   
         <h3>- Case study</h3>
  
    <div class="form-group col-md-6">
        <input type="file" name="file4" class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>

    <input type="submit" value="submit" name="innovation_submit" class="btn btn-primary">
   </div>

 </div>
 </div>
  </form>
 </div>
</div>

<button class="accordion">Infra & Tech</button>
<div class="panel">
 <?php if(isset($successMSG2)){?> <p class="alert alert-success"> <?php echo $successMSG2; }?></p>


    <form method="post" action="" enctype='multipart/form-data' class="form-horizontal" role="form" name="myForm2"  onsubmit="return validateForm2()"> 
      <span id="demo2"></span>
    <div class="form-row">
      
        <div class="form-group col-md-6">
        <label for="education_facility" class="mb-2 mr-sm-2" >Education Facility :-</label>
        <input type="text" name="Education"  class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isString(event)">
</div>
 <div class="form-group col-md-6">
        <label for="max_no" class="mb-2 mr-sm-2" >Max. no of certified softwares :-</label>
        <input type="text" name="max_no"  class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isNumber(event)">
</div>
<div class="form-group col-md-12">
	<h3>- Type of Hardware machine</h3>
	</div>
 <div class="form-group col-md-6">
        
        <label for="specification" class="mb-2 mr-sm-2" >Machine specifications</label>
        <input type="text" name="specification" class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isString(event)">

    </div>
     <div class="form-group col-md-6">
         <label for="storage" class="mb-2 mr-sm-2">Storage Device</label>
        <input type="text" name="storage"  class="form-control mb-2 mr-sm-2" >

</div>
  <div class="form-group col-md-12">
        <input type="submit" value="submit" name="infra_submit"   class="btn btn-primary" >
</div>
  </div>
  </form>


</div>

<button class="accordion">Trainers</button>

<div class="panel">
 <?php if(isset($successMSG3)){?> <p class="alert alert-success"> <?php echo $successMSG3; }?></p>
    <form method="post" action="" enctype='multipart/form-data' class="form-horizontal" role="form" name="myForm3" onsubmit="return validateForm3()">
      <span id="demo3"></span>
       <div class="form-row">

        <div class="form-group col-md-6">
        <label for="indian_faculty" class="mb-2 mr-sm-2" >Best Indian Faculty </label>
        <input type="file" name="file5"  class="form-control mb-2 mr-sm-2">
       <span>files size should not greater than 2MB</span>
        <input type="file" name="file16"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>
 <div class="form-group col-md-6">
        <label for="international_faculty" class="mb-2 mr-sm-2" >International Faculties </label>
        <input type="file" name="file6"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
        <input type="file" name="file17"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>
 <div class="form-group col-md-6">

        <label for="workshop" class="mb-2 mr-sm-2" >Workshops</label>
        <input type="text" name="workshop" class="form-control mb-2 mr-sm-2" >
</div>
<div class="form-group col-md-12">
        <h3>- Guest Lectures</h3>
</div>
 <div class="form-group col-md-6">


        <label for="guest_lec" class="mb-2 mr-sm-2" >No.of guset lec in a year</label>
        <input type="text" name="guest_lec"  class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isNumber(event)">
</div>
 <div class="form-group col-md-6">

          <label for="top_guest" class="mb-2 mr-sm-2" >Top Three Guest</label>
        <input type="file" name="file7"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>
 <div class="form-group col-md-6">
         <label for="trainer_company" class="mb-2 mr-sm-2" >Company name</label>
        <input type="text" name="trainer_cmp" class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isString(event)">
</div>
 <div class="form-group col-md-6">
        <label for="profile" class="mb-2 mr-sm-2" >Profile</label>
        <input type="file" name="file8"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>
 <div class="form-group col-md-12">
        <input type="submit" value="submit" name="trainer_submit"   class="btn btn-primary">
  </div> 

  </div> 
  </form>

</div>

<button class="accordion">Best Curriculum</button>
<div class="panel">
      <?php if(isset($successMSG4)){?> <p class="alert alert-success"> <?php echo $successMSG4; }?></p>
    <form method="post" action="" enctype='multipart/form-data' class="form-horizontal" role="form" name="myForm4" onsubmit="return validateForm4()">
      <span id="demo4"></span>
     <div class="form-row">
        <div class="form-group col-md-6">
        <label for="short" class="mb-2 mr-sm-2" >Short </label>
        <input type="file" name="file9"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>
 <div class="form-group col-md-6">
        <label for="mid" class="mb-2 mr-sm-2" >Mid </label>
        <input type="file" name="file10"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>
 <div class="form-group col-md-6">
        <label for="long" class="mb-2 mr-sm-2" >Long </label>
        <input type="file" name="file11"  class="form-control mb-2 mr-sm-2">
       <span>files size should not greater than 2MB</span>
</div>
       <div class="form-group col-md-12">
        <input type="submit" value="submit" name="bst_ciri"   class="btn btn-primary">
      </div>
    </div>
  </form>

</div>
<button class="accordion">Digital</button>
<div class="panel">
<?php if(isset($successMSG5)){?> <p class="alert alert-success"> <?php echo $successMSG5; }?></p>
    <form method="post" action="" enctype='multipart/form-data' class="form-horizontal" role="form"  name="myForm5" onsubmit="return validateForm5()">
    <span id="demo5"></span>
         <div class="form-row">
        <div class="form-group col-md-6">

        <label for="medium" class="mb-2 mr-sm-2" >Best online medium to educate</label>
        <input type="file" name="file12"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>
 <div class="form-group col-md-12">
       

        <input type="submit" value="submit" name="digital_submit"   class="btn btn-primary">
      </div>
    </div>
 
  </form>

  
</div>
<button class="accordion">Edu Leadership</button>
<div class="panel">
  <?php if(isset($successMSG6)){?> <p class="alert alert-success"> <?php echo $successMSG6; }?></p>
    <div class="container">
    <form method="post" action="" enctype='multipart/form-data' class="form-horizontal" role="form" name="myForm6" onsubmit="return validateForm6()">
    
       <span id="demo6"></span>
 <div class="form-row">
        <div class="form-group col-md-6">
        <label for="max_branch" class="mb-2 mr-sm-2" >Maximum no of Branches :-</label>
        <input type="text" name="max_branch"  class="form-control mb-2 mr-sm-2" onkeypress="javascript:return isNumber(event)">
</div>
 <div class="form-group col-md-6">
         <label for="franchise" class="mb-2 mr-sm-2" >Best Franchise Model :-</label>
        <input type="file" name="file13"  class="form-control mb-2 mr-sm-2" >
        <span>files size should not greater than 2MB</span>
</div>
 <div class="form-group col-md-6">
        <label for="vision" class="mb-2 mr-sm-2" >Vision Statement  :-</label>
        <input type="text" name="vision"  class="form-control mb-2 mr-sm-2">
</div>
 <div class="form-group col-md-6">
        <label for="partnership" class="mb-2 mr-sm-2" >International Partnership :-</label>
        <input type="text" name="partnership"  class="form-control mb-2 mr-sm-2">
</div>
 <div class="form-group col-md-6">
        <label for="gov_partnership" class="mb-2 mr-sm-2" >Governemnt Recoginition & Partnerships :-</label>
        <input type="text" name="gov_partnership"  class="form-control mb-2 mr-sm-2">
</div>
 <div class="form-group col-md-6">
        <label for="industry" class="mb-2 mr-sm-2" >Outstanding Contribution to the Animation/ VFX Industry:-</label>
        <input type="text" name="industry"  class="form-control mb-2 mr-sm-2">
</div>
 <div class="form-group col-md-6">
        <label for="scholarship" class="mb-2 mr-sm-2" >Best Scholarship program :-</label>
        <input type="text" name="scholarship"  class="form-control mb-2 mr-sm-2">
</div>
 <div class="form-group col-md-6">
        <label for="exchange_prgm" class="mb-2 mr-sm-2" >Best Students Exchange program :-</label>
        <input type="text" name="exchange_prgm"  class="form-control mb-2 mr-sm-2">

       </div>
        <div class="form-group col-md-12">

        <input type="submit" value="submit" name="leadership_submit"   class="btn btn-primary">
    </div>
  </div>
  </form>
</div>
</div>
<button class="accordion">Student Zone</button>
<div class="panel">
  <?php if(isset($successMSG7)){?> <p class="alert alert-success"> <?php echo $successMSG7; }?></p>
 <div class="container">
    <form method="post" action="" enctype='multipart/form-data' class="form-horizontal" role="form" name="myForm7" onsubmit="return validateForm7()">
      <span id="demo7"></span>
     <div class="form-row">
        
      <div class="form-group col-md-12"><h3>- Best Short Film</h3></div>
<div class="form-group col-md-6">
        <label for="film" class="mb-2 mr-sm-2" >Animation :-</label>
        <input type="file" name="file14"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
</div>

       
      <div class="form-group col-md-12"><h3>Graphic designing</h3></div>
<div class="form-group col-md-6">
        <input type="file" name="file15"  class="form-control mb-2 mr-sm-2">
        <span>files size should not greater than 2MB</span>
      </div>
</div>
        <input type="submit" value="submit" name="student_submit"   class="btn btn-primary">

    </div>
  </form>
</div>
</div>

</div>
</div>
</div>
</div>
</section>


<footer class="footer">
	<div class="container">
		
		<div class="row">
			<div class="col-md-6">
				<div class="copyright">
			<p>Copyright © 2019 AnimationXpress. All rights reserved.</p>
	    </div>
			</div>

			<div class="col-md-6">
				<div class="social-icons">
					<ul>
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("show");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
     
    }
  });

}
</script>

<script type="text/javascript">
  function isString(evt)
    {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if ((iKeyCode < 65 || iKeyCode > 96) && (iKeyCode < 97 || iKeyCode > 123)&&
        iKeyCode != 32 && iKeyCode !=8  ) 
        {
          return false;
        }
    }

  function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        
    } 
</script>

<script>

  function validateForm() {
  
    var x =document.forms["myForm"]["file"].value;
    var y =document.forms["myForm"]["file1"].value;
    var z =document.forms["myForm"]["file2"].value;
    var w =document.forms["myForm"]["file3"].value;
    if (x == "" && y == "" && z == "" && w == "") {
    document.getElementById("demo").innerHTML = "Select minimum one document";
    return false;
  }
  else
  {
    document.getElementById("demo").innerHTML = "thank you"; 
    return true;
    
  }
}

 function validateForm1() {
  
    var x =document.forms["myForm1"]["file4"].value;
   
    if (x == "" ) {
    document.getElementById("demo1").innerHTML= "Select  document";
    return false;
  }
  else
  {
     document.getElementById("demo1").innerHTML = "thank you";
    return true;
    
  }

}

 function validateForm2() {
  
    var x =document.forms["myForm2"]["Education"].value;
    var y =document.forms["myForm2"]["max_no"].value;
    var z =document.forms["myForm2"]["specification"].value;
    var a =document.forms["myForm2"]["storage"].value;
   
    if (x == "" && y == "" && z == "" && a == ""  ) {
    document.getElementById("demo2").innerHTML= "fill atleast one textfield";
    return false;
  }
  else
  {
    document.getElementById("demo2").innerHTML = "thank you"; 
    return true;
    
  }

}

  function validateForm3() {
  
    var x =document.forms["myForm3"]["file5"].value;
    var y =document.forms["myForm3"]["file6"].value;
    var z =document.forms["myForm3"]["file16"].value;
    var w =document.forms["myForm3"]["file17"].value;
    var a =document.forms["myForm3"]["file7"].value;
    var b =document.forms["myForm3"]["file8"].value;
    if (x == "" && y == "" && z == "" && w == "" && a == "" && b == "") {
    document.getElementById("demo3").innerHTML = "Select minimum one document";
    return false;
 
 }
 else
  {
    document.getElementById("demo3").innerHTML = "thank you"; 
    return true;
    
  }
}
function validateForm4() {
  
    var x =document.forms["myForm4"]["file9"].value;
    var y =document.forms["myForm4"]["file10"].value;
    var z =document.forms["myForm4"]["file11"].value;
   
    if (x == "" && y == "" && z == "" ) {
    document.getElementById("demo4").innerHTML = "Select minimum one document";
    return false;
 
 }
 else
  {
    document.getElementById("demo4").innerHTML = "thank you"; 
    return true;
    
  }
}

function validateForm5() {
  
    var x =document.forms["myForm5"]["file12"].value;
   
    if (x == "" ) {
    document.getElementById("demo5").innerHTML= "Select  document";
    return false;
  }
  else
  {
     document.getElementById("demo5").innerHTML = "thank you";
    return true;
    
  }

}

 function validateForm6() {
  
    var x =document.forms["myForm6"]["file13"].value;
   
    if (x == "" ) {
    document.getElementById("demo6").innerHTML= "Select  document";
    return false;
  }
  else
  {
     document.getElementById("demo6").innerHTML = "thank you";
    return true;
    
  }

}

 function validateForm7() {
  
    var x =document.forms["myForm7"]["file14"].value;
    var y =document.forms["myForm7"]["file15"].value;
   
    if (x == "" ) {
    document.getElementById("demo7").innerHTML= "Select  document";
    return false;
  }
  else
  {
    document.getElementById("demo7").innerHTML = "thank you"; 
    return true;
    
  }

}
  </script>
</body>
</html>