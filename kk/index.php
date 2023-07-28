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
            flex: 0.3;
            background-color: #e5b4b4;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: background-color 0.3s ease;
        }

        .left-div img {
            width: 360px;
            height: 150px;
            margin-bottom: 20px;
            position: absolute;
            top: 10px;
        }

        .left-div h2 {
            color: #7d191e;
            font-size: 45px;
            margin-bottom: 10px;
        }

        .student-info {
            text-align: center;
            margin-bottom: 60px;
        }

        .student-info p {
            margin: 5px;
            font-size: 25px;
        }

        .left-div form {
            width: 100%;
            max-width: 250px;
        }

        .left-div input[type="text"] {
            width: 92%;
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
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .scroll-menu {
            overflow-y: hidden; /* Modified this line to hide the scroll bar */
            height: auto; /* Set the height to auto so that the content expands as needed */
        }

        .form-control {
            font-size: 25px;
            width: 100%;
        }

        .right-div {
            flex: 1;
            background-color: #e1e1e1;
            padding: 5px;
            box-sizing: border-box;
        }

        .right-div iframe {
            width: 100%;
            height: 100%;
        }

        /* Media Query for Mobile Screens */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-div {
                flex: 1;
            }

            .left-div img {
                width: 200px;
                height: 80px;
                top: 5px;
            }

            .left-div h2 {
                font-size: 20px;
            }

            .left-div form {
                max-width: 200px;
            }

            .student-info p {
                font-size: 18px;
            }

            .left-div input[type="text"],
            .left-div input[type="submit"],
            .form-control {
                font-size: 14px;
            }

            .right-div {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-div">
            <img src="//sathyabama.cognibot.in/pluginfile.php/1/theme_klass/logo/1687444541/Logo%202023.svg" alt="Logo">
            <div class="student-info">
                <h2>Student Info</h2>
                <p>Name: John Doe</p>
                <p>Registration Number: 1234567</p>
                <p>Room Appointed: Block 5</p>
            </div>
            <h2>Select Block</h2>
            <!-- Scroll Bar with Options -->
            <div class="scroll-menu">
                <form method="POST">
                    <select name="selected_block" class="form-control">
                        <?php
                        // Generate options for blocks
                        for ($i = 1; $i <= 10; $i++) {
                            echo '<option value="block' . $i . '">Block ' . $i . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="submit_block" value="Show on Map">
                </form>
            </div>
        </div>
        <div class="right-div">
            <?php
            if (isset($_POST["submit_block"])) {
                $selected_block = $_POST["selected_block"];
                ?>
                <!-- Modify the iframe URL based on the selected block -->
                <iframe src="https://maps.google.com/maps?q=<?php echo urlencode($selected_block); ?>&output=embed"></iframe>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
