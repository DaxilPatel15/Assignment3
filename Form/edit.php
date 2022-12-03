<!-- NAME:DAXIL PATEL -->
<!-- STUDENT ID:200520270 -->

<?php
//adding the database file
include "database.php";
$customerObj = new database();
// adding if statement for update
if (isset($_GET['updateID']) && !empty($_GET['updateID'])) {
$updateID = $_GET['updateID'];
$customer = $customerObj->displayRecordByID($updateID);
}
if(isset($_POST['Update'])){
  $customerObj->updateRecord($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link rel="stylesheet" href="./css/style.css">


  </head>




    <body class="text-center">

      <?php require ('./header.php'); ?>



<main class="form-signin w-100 m-auto">
  <?php
  $customers = $customerObj->displayData();
  foreach ($customers as $customer) {
  ?>
<!-- adding form  -->
<form class="form1" action="edit.php" method="POST">


  <h2 class="h3 mb-3 fw-normal">UPDATE DATA</h2>

  <div class="form-floating">
      <!-- adding input for FirstName -->
    <input type="text" class="form-control" name="uFirstName" value="<?php echo $customer['FirstName'];?>">
    <label for="FirstName">Firstname</label>
  </div>
  <div class="form-floating">
      <!-- adding input for LastName -->
    <input type="text" class="form-control"  name="uLastName" value="<?php echo $customer['LastName'];?>">
    <label for="LastName">Lastname</label>
  </div>

  <div class="form-floating">
      <!-- adding input for Email -->
    <input type="text" class="form-control"  name="uEmail" value="<?php echo $customer['Email'];?>">
    <label for="Email">Email</label>
  </div>
  <div class="form-floating">
      <!-- adding input for Password -->
    <input type="password" class="form-control" name="uPasswrd"  value="<?php echo $customer['Passwrd'];?>">
    <label for="Passwrd">Password</label>
  </div>
  <div class="form-floating">
      <!-- adding input for Profession -->
    <input type="text" class="form-control"  name="uProfession" value="<?php echo $customer['Profession'];?>">
    <label for="Profession">Profession</label>
  </div>
  <div class="form-floating">
      <!-- adding input for Bio -->
    <input type="textarea" class="form-control"  name="uBio" value="<?php echo $customer['Bio'];?>">
    <label for="Bio">Add your Bio</label>
  </div>
<!--adding submit button to submit the the changes and display in  the view page  -->
<input type="hidden" name="ID" value="<?php echo $customer['ID']; ?>">
  <input class="w-100 btn btn-lg btn-primary" name="Update" value="Update Profile" type="submit">
  <?php
  echo "<p class ='error'>$error</p>";
  ?>


</form>
<?php
}
?>
</main>
<!-- adding global footer -->
<?php require ('./footer.php'); ?>


</body>

</html>
<!-- end of code -->
