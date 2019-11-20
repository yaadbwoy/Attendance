<?php 
    $title = 'Success';
    require_once 'includes/header.php'; 
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    //require 'sendemail.php';
    if(isset($_POST["submit"])){
        //extract values from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact,$specialty);
        $specialtyName = $crud->getSpecialtyById($specialty);
        
        if($isSuccess){
            //SendEmail::SendMail($email, 'Welcome to IT Conference 2019', 'You have successfully registerted for this year\'s IT Conference');
           echo  'Welcome to IT Conference 2019',    'You have successfully registerted for this year\'s IT Conference';
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }
    }

?>

<!-- <h1 class="text-center text-success">You Have Been Registered!</h1> -->

<!-- Method using GET -->

<!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php //echo $_GET['firstname'] .' '. $_GET['lastname']?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['specialty']?></h6>
            <p class="card-text">Date Of Birth: <?php //echo $_GET['dob']?></p>
            <p class="card-text">Email: <?php //echo $_GET['email']?></p>
            <p class="card-text">Contact: <?php //echo $_GET['phone']?></p>
        </div>
</div> -->

<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'] .' '. $_POST['lastname']?></h5>
            <h6 class="card-subtitle mb-2 text-muted"> <?php echo $specialtyName['specialty'];  ?>      
            <p class="card-text">Date Of Birth: <?php echo $_POST['dob']?></p>
            <p class="card-text">Email: <?php echo $_POST['email']?></p>
            <p class="card-text">Contact: <?php echo $_POST['phone']?></p>

        </div>

        <?php 
        // echo $_GET['firstname'];
        // echo $_GET['lastname'];
        // echo $_GET['dob'];
        // echo $_GET['specialty'];
        // echo $_GET['email'];
        // echo $_GET['phone'];
        
        
        ?>

</div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <?php require_once 'includes/footer.php'; ?>
