 <?php
    $title = 'View Records'; 
    require_once 'includes/header.php'; 
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 
    // Get all attendees
    $results = $crud->getAttendees();
?>
    
    <caption></caption>
    <table class="table table-striped">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Cons #</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Date of Birth</th>
	  <th scope="col"> Email Address</th>
	  <th scope="col">Contact Number</th>
      <th scope="col">Specialization</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
           <tr>
                <td><?php echo $r['Attendee_id'] ?></td>
                <td><?php echo $r['FirstName'] ?></td>
                <td><?php echo $r['LastName'] ?></td>
                <td><?php echo $r['DateofBirth'] ?></td>
                <td><?php echo $r['Email'] ?></td>
                <td><?php echo $r['Contact'] ?></td>
                <td><?php echo $r['specialty'] ?></td>
               
                
                <td><a href="view.php?id=<?php echo $r['Attendee_id']?>" class="btn btn-success">View</a></td>
                <td><a href="edit.php?id=<?php echo $r['Attendee_id'] ?>" class="btn btn-warning">Edit</a></td>
                <td><a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['Attendee_id'] ?>" class="btn btn-danger">Delete</a></td>
                
           </tr> 
        <?php }?>
    </table>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>