<?php
include('config.php'); // Include the database connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects</title>
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

        <section id="manage-projects" class="section-padding">
            <div class="container">
                
                <h2>Manage Projects</h2>
                <?php
                // Fetch projects data
                $sql = "SELECT * FROM projects";
                $result = $conn->query($sql);

                $projects = [];
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $id = $row["Project_ID"];
                        $title = $row["Project_Title"];
                        $description = $row["Project_Desc"];
                        $img = $row["Project_Img"];

                        echo '<div class="project-card">
                <div class="action-icons">
                        <form><button class="delete-icon"><i class="fas fa-trash-alt"></i></button></form>
                        <form action="edit-projects.php?editprojectid='.$id.'" method="post"><button type="submit" name="edit" class="edit-icon"><i class="fas fa-edit"></i></button></form>
                    </div>
                    <h2>'.$id.'</h2>
                    <h4>'.$title.'</h4>
                    <p>'.$description.'</p>
                    <img src="uploads/'.$img.'" alt="Hobbies 1">
                </div>'
                        ;

                    }
                }

                ?>

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