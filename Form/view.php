<!-- NAME:DAXIL PATEL -->
<!-- STUDENT ID:200520270 -->

<?php
// adding database file to make connection b/t 3 files
include 'database.php';
$customerObj = new database();

// adding delete to delete the record that were inserted
if(isset($_GET['deletedID']) && !empty($_GET['deletedID'])){
  $deletedID = $_GET['deletedID'];
  $customerObj->deleteRecord($deletedID);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">

  </head>
  <body class="b1">
    <!-- adding global header  -->
    <?php require ('./header.php'); ?>

<div class="p-5 text-center1 bg-light" style="margin-top: 58px;background: -webkit-linear-gradient(left, #3931af, #00c6ff);">
  <h1 class="mb-3">Your Details</h1>
<h2>
    <a href="index.php" style="float:right;"><button><i class="fas fa-plus"></i></button></a>
</h2>
    <main>
      <?php
      // adding msg statement to give infromation about the update,inserted and deleted data.
      if(isset($_GET['msg1']) == "insert"){
        echo "<div class='alert alert-success alert-dismissible'>
             <button type='button' class='close' data-dismiss='alert'>X</button>
             Your profile has been added!
             </div>";
      }

      if(isset($_GET['msg2']) == "update"){
        echo "<div class='alert alert-success alert-dismissible'>
             <button type='button' class='close' data-dismiss='alert'>X</button>
             Your profile has been updated!
             </div>";
      }

      if(isset($_GET['msg3']) == "delete"){
        echo "<div class='alert alert-success alert-dismissible'>
             <button type='button' class='close' data-dismiss='alert'>X</button>
             Your profile has been deleted!
             </div>";
      }
       ?>

       <?php
       $customers = $customerObj->displayData();
       foreach ($customers as $customer) {
           ?>


<section class="section-11">


      <div class="container emp-profile">
        <!-- to display data from sql -->

                <div class="row">

                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                      <?php echo $customer['FirstName']; ?> <?php echo $customer['LastName']; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $customer['Profession']; ?>
                                    </h6>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                      <a href="edit.php?updateID=<?php echo $customer['ID'];?>">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"></a>
                    </div>

                    <div class="col-md-2">
                        <a href="view.php?deletedID=<?php echo $customer['ID'];?>">
                          <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Remove"></a>
                    </div>
                </div>
                <div class="row">

                    </div>
                    <div class="h-col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <label>First Name</label>
                                            </div>
                                            <div class="col-md-6">
                                              <!-- adding php statement to insert the data at that specific Location -->
                                                <?php echo $customer['FirstName']; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                              <!-- adding php statement to insert the data at that specific Location -->
                                                <label>Last Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $customer['LastName']; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                              <!-- adding php statement to insert the data at that specific Location -->
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $customer['Email']; ?>
                                            </div>
                                        </div>
                                        </div>
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                              <!-- adding php statement to insert the data at that specific Location -->
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $customer['Passwrd']; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                              <!-- adding php statement to insert the data at that specific Location -->
                                                <?php echo $customer['Profession']; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Bio</label>
                                            </div>
                                            <div class="col-md-6">
                                              <!-- adding php statement to insert the data at that specific Location -->
                                                <?php echo $customer['Bio']; ?>
                                            </div>
                                        </div>


                            </div>


                            </div>
                        </div>

                        <?php
                      }
                        ?>
                    </div>

</section>
        </div>
    </main>
    <!-- adding global footer -->
    <?php require ('./footer.php'); ?>

  </body>
  <html>
  <!-- end of code -->
