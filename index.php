<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Screen Divs</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .container {
            display: flex;
            height: 100%;
        }

        .left-div {
            background: #f1dfdf;
            flex: 0.3; /* Adjust this value to control the left div's width */
            background-color: #f1f1f1;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-div h2 {
            color: #7d191e;
            font-size: 24px;
            margin-bottom: 20px;
            color : ;
        }

        .left-div form {
            width: 100%;
            max-width: 250px;
            
        }

        .left-div input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .left-div input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #7d191e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px; /* Add margin to create space between elements */
        }

        .right-div {
            flex: 1;
            background-color: #e1e1e1;
            padding: 20px;
            box-sizing: border-box;
        }

        /* Full-height Google Maps iframe */
        .right-div iframe {
            width: 100%;
            height: 100%;
        }

        .left-div input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #7d191e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px; /* Add margin to create space between elements */
            transition: background-color 0.3s ease; /* Add a transition effect for smooth hover */
        }

        /* Hover effect: Change background color on hover */
        .left-div input[type="submit"]:hover {
            background-color: #a1353b; /* Change this color to your desired hover effect */
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="left-div">
            <h2>Enter Address or Coordinates</h2>
            <!-- Form for Address -->
            <form method="POST">
                <input type="text" name="address" placeholder="Enter address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
                <input type="submit" name="submit_address" value="Show on Map">
            </form>

            <!-- Add some space between the two forms -->
            <div style="margin-top: 20px;"></div>

            <!-- Form for Coordinates -->
            <form method="POST">
                <input type="text" name="latitude" placeholder="Enter latitude" value="<?php echo isset($_POST['latitude']) ? $_POST['latitude'] : ''; ?>">
                <input type="text" name="longitude" placeholder="Enter longitude" value="<?php echo isset($_POST['longitude']) ? $_POST['longitude'] : ''; ?>">
                <input type="submit" name="submit_coordinates" value="Show on Map">
            </form>
        </div>
        <div class="right-div">
            <!-- PHP code for displaying Google Maps based on form submissions -->
            <?php
            if (isset($_POST["submit_coordinates"]))
            {
                $latitude = $_POST["latitude"];
                $longitude = $_POST["longitude"];
                ?>
                <iframe src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>
                <?php
            } elseif (isset($_POST["submit_address"]))
            {
                $address = $_POST["address"];
                $address = str_replace(" ", "+", $address);
                ?>
                <iframe src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
