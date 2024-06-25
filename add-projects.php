
<?php   
session_start();
include('config.php'); // Include the database connection

if (isset($_POST['submit'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $desc = htmlspecialchars(trim($_POST['description']));
    $photo = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'uploads/' . $photo;
  
    // Ensure photo upload directory exists
    if (!is_dir('uploads')) {
      mkdir('uploads', 0777, true);
    }
  
    // Move the uploaded file to the server directory
    if (move_uploaded_file($tempname, $folder)) {
      // Use session user_ID
      $userID = 1;
  
      // Prepared statements to prevent SQL injection
      $stmt = $conn->prepare("INSERT INTO `projects` (User_ID, Project_Title, Project_Desc, Project_Img) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("isss", $userID, $title, $desc, $photo);
    }
}

$conn->close()
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
                <h2>Add Project</h2>

        <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <p>Title</p>
            <input type="text" name="title" class="form-control" placeholder="Title...">
            </div>
            <div class="col">
                <p>Description</p>
            <input type="text" name="description" class="form-control" placeholder="Description...">
            </div>
            <p>Image</p>
            <input class="image-button" name="image" type="file"></input>
            <button class="add-button" name="submit" type="submit">Add</button>
        </div>
        </form>
        </section>

    </div>
    <footer>
        <div class="container">
            <p>2024 My Portfolio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
