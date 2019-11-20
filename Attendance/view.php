<?php
    $title = 'View Record'; 
    require_once 'includes/header.php'; 
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 
    // Get attendee by id
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        
    } else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
    
    
?>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">
           Name : <?php echo $result['FirstName'] . ' ' . $result['LastName'];  ?>
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            Specialization : <?php echo $result['specialty'];  ?>    
        </h6>
        <p class="card-text">
            Date Of Birth: <?php echo $result['DateofBirth'];  ?>
        </p>
        <p class="card-text">
            Email Adress: <?php echo $result['Email'];  ?>
        </p>
        <p class="card-text">
            Contact Number: <?php echo $result['Contact'];  ?>
        </p>
    </div>
</div>
<br/>
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <td><a href="edit.php?id=<?php echo $result['Attendee_id'] ?>" class="btn btn-warning">Edit</a></td>
        <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
    <?php } ?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>