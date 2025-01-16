
<?php
// Include the database connection file
include('db.php');

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $height = $_POST['height'];  
    $weight = $_POST['weight']; 
    
    

    // Insert user data into the database
    $sql = "INSERT INTO bmi (full_name,height,weight)
            VALUES ('$full_name', '$height', '$weight')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Data pass successful!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection after all operations are finished
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>bmi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Style the success and error messages */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            font-size: 18px;
            z-index: 1000;
        }

        .popup-error {
            background-color: #dc3545;
        }

        .popup-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #333;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
      
   
    <div class="container">

       <div class="image-container"><div class="button-container">

        <button class="btn" onclick="location.href='index.php'">Back</button>
    </div>
            <img src="body-mass-index-illustration-vector.jpg" alt="BMI bg">
        </div>


        <div class="form-container">
            <h1>BMI</h1>
            <h2>Calculator</h2>
            <div class="form">
                <!-- Form that sends POST request to the same page -->
                <form action="index b.php" method="POST">
                    <input type="text" class="Name" name="full_name" placeholder="Full Name" required>
                    <input type="number" class="height" name="height" placeholder="Enter height in CM" required>
                    <input type="number" class="weight" name="weight" placeholder="Enter weight in KG" required>
                    <input type="submit" value="Calculate">
                </form>
            </div>
        </div>
        <div class="popup">
            <div class="bmi-score"></div>
            <div class="bmi-text"></div>
            <button class="close-btn">Close</button>
            
        </div>
    </div>



    <?php if ($success_message): ?>
        <div id="popup-success" class="popup"><?php echo $success_message; ?>
            <button class="popup-button" onclick="closePopup('popup-success')">Close</button>
        </div>
    <?php endif; ?>

    <?php if ($error_message): ?>
        <div id="popup-error" class="popup popup-error"><?php echo $error_message; ?>
            <button class="popup-button" onclick="closePopup('popup-error')">Close</button>
        </div>
    <?php endif; ?>

    <script>
    var dd_main = document.querySelector(".dd_main");

    dd_main.addEventListener("click", function(){
        this.classList.toggle("active");
    })
</script>

    <script>
        // Show popup based on the PHP message
        window.onload = function() {
            <?php if ($success_message): ?>
                document.getElementById('popup-success').style.display = 'block';
            <?php endif; ?>

            <?php if ($error_message): ?>
                document.getElementById('popup-error').style.display = 'block';
            <?php endif; ?>
        };

        // Close the popup
        function closePopup(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>

</body>
</html>
