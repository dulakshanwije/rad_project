<?php
require "../config/config.php";

if (!isset($_SESSION["current_student_id"])) {
    header("Location:../login/login.php?result=Please Login First");
}

$current_student_id = $_SESSION['current_student_id'];
$get_student_details_query = "SELECT student_index_number, student_nic_number, student_initials_name FROM student_table WHERE student_id = $current_student_id";

$student_details;

if ($q_return = mysqli_query($conn, $get_student_details_query)) {
    $student_details = mysqli_fetch_assoc($q_return);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="rf-body">
    <!-- <div class="subcontainer">
        <div class="profilepic"></div>
        <div class="details">
            <h1><?php echo $student_details['student_initials_name'] ?></h1>
            <h1><?php echo $student_details['student_index_number'] ?></h1>
            <form action="../logout/logout.php" method="POST">
                <input class="logoutbtn" type="submit" value="Logout">
            </form>
        </div>
    </div> -->
    <!-- <div> -->
        <p><?php
            if (isset($_GET['result'])) {
                echo $_GET['result'];
            }
            ?></p>
        <!-- <form action="students_details_adder.php" method="POST" style="display:flex; flex-direction:column; width: 400px;" enctype="multipart/form-data">
            <label for="st_full_name">Full Name: </label>
            <input type="text" name="st_full_name" id="st_full_name" required>

            <label for="st_telephone">Telephone: </label>
            <input type="tel" name="st_telephone" id="st_telephone" required>

            <label for="st_email">Email: </label>
            <input type="email" name="st_email" id="st_email" required>

            <label for="st_image">Image: </label>
            <input type="file" accept=".jpg, .png, .jpeg" name="st_image" id="st_image" onchange="imgPreview(this)" required>

            <img src="../assets/images/180.png" id="st_image_preview" style="max-width:180px;" />

            <label for="st_password">New Password: </label>
            <input type="password" name="st_password" id="st_password" required>

            <label for="st_password_confirm">Confirm Password: </label>
            <input type="password" name="st_password_confirm" id="st_password_confirm" required>

            <input type="submit" name="" id="" value="Submit">

        </form> -->
        <div class="rf-container">
        <header class="rf-header">Registration Form</header>
        <form class="rf-form" action="students_details_adder.php" method="POST" enctype="multipart/form-data">

            <div class="rf-input-box">
                <label class="rf-lable">Full Name</label>
                <input class="rf-input" type="text" placeholder="Enter Your Full Name" name="st_full_name" required>
            </div>

            <div class="rf-input-box">
                <label class="rf-lable">Telephone</label>
                <input class="rf-input" type="tel" placeholder="Enter Your Telephone Number" name="st_telephone"
                    required>
            </div>

            <div class="rf-input-box">
                <label class="rf-lable">Email Address</label>
                <input class="rf-input" type="email" placeholder="Enter Your Email Address" name="st_email" required>
            </div>

            <!-- <div class="rf-column">
                <div class="rf-input-box">
                    <label class="rf-lable">Phone Number</label>
                    <input class="rf-input" type="number" placeholder="Enter phone number" required>
                </div>
    
                <div class="rf-input-box">
                    <label class="rf-lable">Birth Date</label>
                    <input class="rf-input" type="date" placeholder="Enter birth date" required>
                </div> 
            </div> -->

            <!-- <div class="rf-genderbox">
                <h3>Gender</h3>
                <div class="rf-gender-option">
                    <div class="rf-gender">
                        <input type="radio" id="check-male" class="check-male">
                        <label for="check-male">Male</label>
                    </div>

                    <div class="rf-gender">
                        <input type="radio" id="check-female" class="check-female">
                        <label for="check-female">Female</label>
                    </div>
                </div>
            </div> -->
            <div class="wrapper">
                <div class="image">
                    <!-- <img src="profile.jpg"> -->
                </div>
                <div class="content">
                    <div class="icon"><img class="upload-img" src="upload.png" id="st_image_preview"></div>
                    <!-- <div class="text">No file chosen, yet!</div> -->
                </div>

                <!-- <div><img class="cancel-btn" src="cancel.png"></div> -->
                <div class="filename">File name here</div>
            </div>

            <input class="default-btn" id="default-btn" type="file" accept=".jpg, .png, .jpeg"
                onchange="imgPreview(this)" name="st_image" hidden>

            <button onclick="defaultbtnactive()" class="custom-btn" id="custom-btn">Choose a file</button>

            <div class="rf-input-box">
                <label class="rf-lable">New Password</label>
                <input class="rf-input" type="password" placeholder="Enter Your New Password" name="st_password" required>
            </div>

            <div class="rf-input-box">
                <label class="rf-lable">Confirm Password:</label>
                <input class="rf-input" type="password" placeholder="Confirm Your New Password" name="st_password_confirm" required>
            </div>

            <button type="submit">SUBMIT</button>
        </form>
    </div>

    <script>
        const defaultBtn = document.querySelector("#default-btn");
        const customBtn = document.querySelector("#custom-btn");

        function defaultbtnactive() {
            defaultBtn.click();
        }
    </script>
    </div>

    <script src="../assets/script.js"></script>
</body>

</html>