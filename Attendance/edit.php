<?php
    $title = 'Edit Record'; 
    require_once 'includes/header.php'; 
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 
    $results = $crud->getSpecialties();
    if(!isset($_GET['id']))
    {
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
    
    
?>
    <h1 class="text-center">Edit Record </h1>
    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['Attendee_id'] ?>" />
        <div class="form-group">
            <label for="FirstName">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['FirstName'] ?>" id="FirstName" name="FirstName">
        </div>
        <div class="form-group">
            <label for="LastName">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['LastName'] ?>" id="LastName" name="LastName">
        </div>
        <div class="form-group">
            <label for="DateofBirth">Date Of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['DateofBirth'] ?>" id="DateofBirth" name="DateofBirth">
        </div>
        <div class="form-group">
            <label for="specialization">Area of Specialization</label>
            <select class="form-control" id="specialization" name="specialization">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
                        <?php echo $r['specialty']; ?>
                   </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="Email">Email address</label>
            <input type="email" class="form-control" id="Email" value="<?php echo $attendee['Email'] ?>" name="Email" aria-describedby="emailHelp" >
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" value="<?php echo $attendee['Contact'] ?>" name="Contact" aria-describedby="phoneHelp" >
            <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        
        <a href="viewrecords.php" class="btn btn-primary">Back To List</a>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
    </form>
<?php } ?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>