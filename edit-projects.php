<?php
session_start();
include('config.php'); // Include the database connection

// Retrieve project information for the given ID
$title = '';
$description = '';
$img = '';
if (isset($_GET['editprojectid'])) {
    $id = $_GET['editprojectid'];
    $sql = "SELECT * FROM `projects` WHERE Project_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['Project_Title'];
        $description = $row['Project_Desc'];
        $img = $row['Project_Img'];
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql_update = "UPDATE `projects` SET Project_Title = ?, Project_Desc = ? WHERE Project_ID = ?";
    $stmt_update = $con->prepare($sql_update);
    $stmt_update->bind_param("ssi", $title, $description, $id);
    $stmt_update->execute();
    $stmt_update->close();
    // Check if file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['name']) {
        $file_name = $_FILES['file']['name'];
        $file_temp = $_FILES['file']['tmp_name'];
        $file_destination = 'uploads/' . $file_name;
        if (move_uploaded_file($file_temp, $file_destination)) {
            // Update project photo in the database
            $sql_update_photo = "UPDATE `projects` SET Project_Title = ?, Project_Desc = ?, Project_Img = ? WHERE Project_ID = ?";
            $stmt_update_photo = $conn->prepare($sql_update_photo);
            $stmt_update_photo->bind_param("sssi", $title, $description, $img, $id);
            if ($stmt_update_photo->execute()) {
                // Update displayed photo
                $dis_photo = $file_name;
                $stmt_update_photo->close();
                echo '
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            Swal.fire({
                                icon: "success",
                                title: "Project Updated Successfully",
                                confirmButtonText: "OK",
                                confirmButtonColor: "#4CAF50",
                                background: "#0e0d0d",
                                color: "#fff",
                                iconColor: "#4CAF50"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "manage-projects.php?update-projectid=' . $id . '";
                                }
                            });
                        });
                    </script>';
                } else {
                echo '
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Failed to update skill: ' . $stmt->error . '",
                                confirmButtonText: "OK",
                                confirmButtonColor: "#f44336",
                                background: "#0e0d0d",
                                color: "#fff",
                                iconColor: "#f44336"
                            });
                        });
                    </script>';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Projects</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/17cd73726d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="container">
                <h1 class="logo"><i class="far fa-gem"></i> PELIF</h1>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="edit.php">Edit</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="manage-hobbies" class="section-padding">
            <div class="container">
                <h2>Edit Project</h2>

                <form method="POST" enctype="multipart/form-data">

                <?php

                        echo '<div class="row">
                        <div class="col">
                            <p>Title</p>
                            <input value="'.$title.'" type="text" name="title" class="form-control" placeholder="Title...">
                        </div>
                        <div class="col">
                            <p>Description</p>
                            <input value="'.$description.'" type="text" name="description" class="form-control" placeholder="Description...">
                        </div>
                        <p>Image</p>
                        <input value='.$img.' class="image-button" name="image" type="file"></input>
                        <button class="add-button" name="submit" type="submit">Edit</button>
                    </div>';

                    
                

                ?>

                </form>
            </div>
        </section>
    </div>
    <footer>
        <div class="container">
            <p>2024 My Portfolio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

<?php $conn->close(); ?>