<?php require 'database.php'; $id=0; if(!empty($_GET['id'])){ $id=$_REQUEST['id']; } if(!empty($_POST)){ $id= $_POST['id']; $pdo=Database::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "DELETE FROM user  WHERE id = ?";
$q = $pdo->prepare($sql);
$q->execute(array($id));
Database::disconnect();
header("Location: index.php");

}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
<link href="./media/css/basic.css" rel="stylesheet">
  </head>
 
<body>

<br />
<div class="container">
 

<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Delete a user</h3>


</div>


 
<br />
<form class="form-horizontal" action="delete.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id;?>"/>
  
Are you sure to delete ?

<br />
<div class="form-actions">
  <button type="submit" class="btn btn-danger">Yes</button>
  <button class="btn btn-primary" href="index.php">No</button>
</div>


</form>

</div>


 
</div>

<!-- /container -->
  </body>
</html>