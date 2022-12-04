<!-- NAME:DAXIL PATEL -->
<!-- STUDENT ID:200520270 -->
<?php
include 'database.php';
$customerObj = new database();
if (isset($_POST['submit'])) {
$customerObj->insertData($_POST);
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Kanit:wght@500&family=Sigmar+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">


  </head>




    <body class="text-center">

      <!-- adding global header -->
    <?php require ('./header.php'); ?>

<!-- adding main tag for webpage -->
<main class="form-signin w-100 m-auto">
  <div class="p-5 text-center bg-light" style="margin-top: 58px;">
    <h1 class="mb-3-cs1">Welcome</h1>
  </div>
  <!-- adding PHP -->
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // creating our variables
      $FirstName = trim($_POST['FirstName']);
      $LastName = trim($_POST['LastName']);
      $Email = trim($_POST['Email']);
      $Passwrd = trim($_POST['Passwrd']);
      $Profession = trim($_POST['Profession']);

      $Bio = trim($_POST['Bio']);

      // Make a variable whenever error is thrown
      $error = "";
      if (empty($FirstName)) {  // First Name
          $error = "First name is required";
      } else if (empty($LastName)) { // Last Name
          $error = "Last name is required";
      } else if (empty($Email)) { // Email
          $error = "An email is required";
      } else if (!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $Email)) {
          $error = "please use the correct email format";
      } else if (empty($Passwrd)) {//password
          $error = "Please create a password";
      } else if (strlen($Passwrd) < 8) {
          $error = "password must be atleast 8 characters long ";
      }  else if (empty($Profession)) {//Profession
          $error = "Please enter our Profession";
      }  else if (empty($Bio)) {//bio
          $error = "Please enter our Bio";
      }else {
          ?>
          <!-- for telling user that your details are submitted -->
          <script>
              alert('Your details have been submitted');
          </script>


          <?php
      }
  }

  ?>
<!-- adding form tag to make form for our profil -->
<form class="form1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

  <h2 class="h3 mb-3 fw-normal">INSERT DATA</h2>

  <div class="form-floating">
    <!-- adding input for FirstName -->
    <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="Firstname">
    <label for="FirstName">Firstname</label>
  </div>
  <div class="form-floating">
    <!-- adding input for LastName -->
    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Lastname">
    <label for="LastName">Lastname</label>
  </div>
<!-- adding input for Email -->
  <div class="form-floating">
    <input type="text" class="form-control" id="Email" name="Email" placeholder="name@example.com">
    <label for="Email">Email</label>
  </div>
  <div class="form-floating">
    <!-- adding input for Password -->
    <input type="password" class="form-control" id="Passwrd" name="Passwrd"  placeholder="Password">
    <label for="Passwrd">Password</label>
  </div>
  <div class="form-floating">
    <!-- adding input for Profession -->
    <input type="text" class="form-control" id="Profession" name="Profession" placeholder="Profession">
    <label for="Profession">Profession</label>
  </div>
  <div class="form-floating">
    <!-- adding input for Bio -->
    <input type="text" class="form-control" id="Bio" name="Bio" placeholder="text">
    <label for="Bio">Add your Bio</label>
  </div>


    <!-- adding input button for submit to add the deatils in database SQl -->
  <input class="w-100 btn btn-lg btn-primary" name="submit" value="Submit" type="submit">
<!-- adding error if something went wrong -->
  <?php
  echo "<p class ='error'>$error</p>";
  ?>


</form>
<!-- form end -->
</main>
<!-- main tag end -->


<!-- adding global footer -->
<?php require ('./footer.php'); ?>
</body>
<!-- closing body tag -->
</html>
<!-- closing html tag -->
<!-- end of file -->
