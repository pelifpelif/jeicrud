<?php
include('config.php'); // Include the database connection

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PELIF</title>
    <link rel="icon" type="image/png" href="gem.png">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/17cd73726d.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="logo" id="logo"><i class="far fa-gem"></i> PELIF</h1>
            <nav>
                <ul>
                    <li><a href="#projects"></i> Projects</a></li>
                    <li><a href="#hobbies">Hobbies</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="edit.php"><i class="fas fa-edit"></i> Edit</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropbtn">Socials &#9660;</a>
                        <div class="dropdown-content">
                            <a href="https://x.com/phlpllv"target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
                            <a href="https://www.reddit.com/user/Entire-Step-57/"target="_blank"><i class="fab fa-reddit"></i> Reddit</a>
                            <a href="https://github.com/pelifpelif"target="_blank"><i class="fab fa-github"></i> GitHub</a>
                            <a href="https://www.linkedin.com/login"target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section id="hero">
        <div class="container">
            <div class="hero-content">
                <h2>Personal Webpage</h2>
                <h4>Portfolio</h4>
            </div>
            <div class="hero-image">
                <img src="uploads/kongzgif.gif" alt="Person Image">
            </div>
        </div>
    </section> 

<section id="projects" class="section-padding">
    <div class="cloud-container">
        <div class="cloud"><img src="uploads/cloud.gif" alt=""></div>
    </div>
        <div class="container">
            <h2>My Projects</h2>
            <div class="projects">

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

                        echo '
                        <div class="project">
                    <img src="'.$img.'" alt="gorilla">
                    <h3>'.$title.'</h3>
                    <p><i class="fa fa-minus"></i>'.$description.'</p>
                </div>  ' ;

                    }
                }

                ?>
                <!-- Add more projects as needed -->
            </div>
        </div>
    </section>

    <section id="hobbies" class="section-padding">
        <div class="cloud-container">
            <div class="cloud2"><img src="uploads/cloud.gif" alt=""></div>
        </div>
        <div class="container">
            <h2>My Hobbies</h2>
            <div class="about-boxes">
                <div class="about-box">
                    <img src="uploads/lol.jfif" alt="">
                    <h3>League of Legends</h3>
                    <p><i class="fa fa-minus"></i> League of Legends is a team-based strategy game where two teams of five powerful champions face off to destroy the other's base. Choose from over 140 champions to make epic plays, secure kills, and take down towers as you battle your way to victory.</p>
                </div>
                <div class="about-box">
                    <img src="uploads/tft.jfif" alt="">
                    <h3>Teamfight Tactics</h3>
                    <p><i class="fa fa-minus"></i> Teamfight Tactics (TFT) is an auto battler game developed and published by Riot Games. The game is a spinoff of League of Legends and is based on Dota Auto Chess, where players compete online against seven other opponents by building a team to be the last one standing.</p>
                </div>
                <div class="about-box">
                    <img src="uploads/valorant.jfif" alt="">
                    <h3>VALORANT</h3>
                    <p><i class="fa fa-minus"></i> Valorant is an online multiplayer computer game, produced by Riot Games. It is a first-person shooter game, consisting of two teams of five, where one team attacks and the other defends.</p>
                </div>
                <div class="about-box">
                    <img src="uploads/pixels.webp" alt="">
                    <h3>Pixels</h3>
                    <p><i class="fa fa-minus"></i> Pixels is an idle farming blockchain-backed web3 game, with a Free-to-Play option, utilising an off-chain currency called Coins, and an on-chain currency called PIXEL. Pixels is powered by the Ronin Network.</p>
                </div>
                <div class="about-box">
                    <img src="uploads/Sipher.jpg" alt="">
                    <h3>Sipher Odyssey</h3>
                    <p><i class="fa fa-minus"></i> Sipher Odyssey invites players into a matrix-like universe filled with vibrant animal characters. Experience the thrill of blasting through hordes of enemies with godlike abilities in an epic saga - designed in Tiktok-like short form for on-the-go action.</p>
                </div>
                <div class="about-box">
                    <img src="uploads/borderlands.jpg" alt="">
                    <h3>Borderlands 3</h3>
                    <p><i class="fa fa-minus"></i> Borderlands 3 has you blasting through multiple worlds as one of four Vault Hunters, the ultimate treasure-seeking badasses, each with deep skill trees, abilities, and customization. Play solo or party up in co-op to take on deranged enemies, score loads of loot, and save the galaxy from a fanatical threat.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section id="about" class="section-padding">
        <div class="cloud-container">
            <div class="cloud"><img src="uploads/cloud.gif" alt=""></div>
        </div>
        <div class="container">
            <h2>About The Developer</h2>
            <div class="profile-boxes">
                <div class="profile-box">
                    <img src="uploads/pfp.jpg" alt="">
                    <h3>Philip Gerard Mendoza Llave</h3>
                    <p><i class="fa fa-minus"></i> haha</p>
                </div>
                <div class="profile-box">
                    <h3 >Age</h3>
                    <p><i class="fa fa-minus"></i> 18 Years Old</p>
                    <h3 >Birthday</h3>
                    <p><i class="fa fa-minus"></i> February 23, 2006</p>
                    <h3 >Address</h3>
                    <p><i class="fa fa-minus"></i> 008 Mandigma St. Brgy. 1, Bontog, Mataasnakahoy, Batangas</p>
                    <h3 >Skills</h3>
                    <p><i class="fa fa-minus"></i> haha</p>
                    <h3 >School</h3>
                    <p><i class="fa fa-minus"></i> National University - Lipa</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section-padding">
        <div class="cloud-container">
            <div class="cloud2"><img src="uploads/cloud.gif" alt=""></div>
        </div>
        <div class="container">
            <h2>Contact</h2>
            <div class="contact-boxes">
                <div class="contact-box">
                    <h3><i class="fa fa-phone"></i> Phone</i></h3>
                    <p><i class="fa fa-minus"></i> (042) 462-9912</p>
                    <h3><i class="fa fa-mobile"></i> Mobile Number</h3>
                    <p><i class="fa fa-minus"></i> 09664487285</p>
                    <h3><i class="fa fa-envelope"></i> Email</h3>
                    <p><i class="fa fa-minus"></i> pelifllave@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="container">
                <div class="quote-box">
                    <p> “Agriculture is the most healthful, most</p>
                    <p> useful and most noble employment of man.”</p>
                    <p><i class="fa fa-minus"></i> George Washington</p>
                </div>
            </div>
        </div>
    </section>

    <div class="chicken">
        <img src="uploads/manok.gif" class="chickengif" alt="chicken">
    </div>
    
    <footer>
        <div class="container">
            <p>PELIF, All rights reserved.</p>
        </div>
    </footer>

    <script>
        // JavaScript for scrolling to top when clicking on logo
        const logo = document.getElementById('logo');
        logo.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    
</body>
</html>

<?php $con->close() ?>