<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>


<body>
    <header class="header">
        <div class="container headerContainer">
            <button class="headerBurger-btn" id="burger">
                <span></span><span></span><span>
            </button>
            <a href="index.html" class="logo">
                <img class="logoIMG" src="media/logoCS.png" alt="Logo" ">
            </a>
            <nav class=" menu" id="menu">
                <ul class="menuList">
                    <li class="menuItem">
                        <a class="menuLink" href="#home" id="1">
                            Home
                        </a>
                    </li>
                    <li class="menuItem">
                        <a class="menuLink" href="#service">
                            Servicii
                        </a>
                    </li>
                    <li class="menuItem">
                        <a class="menuLink" href="#portfolio">
                            Portofoliu
                        </a>
                    </li>
                    <li class="menuItem">
                        <a class="menuLink" href="#contact">
                            Contact
                        </a>
                    </li>
                </ul>
                </nav>
        </div>
    </header>
    <div id="home" class="row">
        <div class="column">
            <p class="name">Cristian Stoian</p>
            <div class="skills">
                <p>Programator & <br> designer web.</p>
                <p>Full stack dev-HTML5, CSS3, JS, PHP, MySQL, git, C++</p>
            </div>
        </div><!-- column end -->
        <div class="column1"></div>
    </div><!-- row end -->
    <br>


    <main id="service" class="color_set">
        <h2>Servicii Oferite</h2>
        <div class="service_page">

            <?php
            require_once 'db_connect.php';



            // Interogare pentru a extrage informațiile despre servicii
            $sql = "SELECT ID_SERVICE, SERVICE_NAME FROM service";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afisează datele sub formă de articole HTML
                while ($row = $result->fetch_assoc()) {
                    echo "<article class='service_article'>";
                    echo "<div>";
                    echo "<div class='antet'>";

                    // Aici adaugăm logica pentru a afișa iconița în funcție de ID-ul serviciului
                    $id_serviciu = $row["ID_SERVICE"];
                    $icon_path = '';
                    if ($id_serviciu == 1) {
                        $icon_path = 'media/BackEndLogo.png';
                    } elseif ($id_serviciu == 2) {
                        $icon_path = 'media/FrontEndLogo.png';
                    } elseif ($id_serviciu == 3) {
                        $icon_path = 'media/GraphicDesignLogo.png';
                    }
                    // Afisează iconița
                    echo "<img src=\"$icon_path\" alt=\"Iconiță serviciu $id_serviciu\" class=\"icon\">";

                    echo "<h4>" . $row["SERVICE_NAME"] . "</h4>";
                    echo "</div>";
                    echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime exercitationem sequi
        eligendi autem excepturi nemo</p>"; // Aici poți adăuga descrierea serviciului dacă o ai în baza de date
                    echo "</div>";
                    echo "</article>";
                }
            } else {
                echo "Nu s-au găsit rezultate";
            }
            ?>

    </main>

    <div class="wrapper">
        <h2>Portofoliu</h2>
        <a href="add_project.php">
            <img src="media/add.png" alt="Adăugare proiect" class="buttons">
        </a>
    </div>

    <main id="portfolio" class="portofoliu">
        <?php
        $sql = "SELECT p.ID_PROJECT, p.PROJECT_NAME, GROUP_CONCAT(ps.ID_SERVICE) AS SERVICES
    FROM project p
    INNER JOIN project_service ps ON p.ID_PROJECT = ps.ID_PROJECT
    GROUP BY p.ID_PROJECT, p.PROJECT_NAME";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Afisează datele sub formă de articole HTML
            while ($row = $result->fetch_assoc()) {
                echo "<article class='insign'>";
                echo "<div class='antet'>";
                echo "<h3>" . $row["PROJECT_NAME"] . "</h3>"; // Afișăm numele proiectului
        
                // Afișăm iconițele în funcție de ID-urile serviciilor
                $services = explode(',', $row["SERVICES"]);
                foreach ($services as $service_id) {
                    $icon_path = '';
                    if ($service_id == 1) {
                        $icon_path = 'media/BackEndLogo.png';
                    } elseif ($service_id == 2) {
                        $icon_path = 'media/FrontEndLogo.png';
                    } elseif ($service_id == 3) {
                        $icon_path = 'media/GraphicDesignLogo.png';
                    }
                    // Afisează iconița
                    echo "<img src='$icon_path' alt='Iconiță serviciu $service_id' class='icon'>";
                }

                // Adăugăm butonul de ștergere asociat ID-ului proiectului
                echo "<form action='delete_project.php' method='POST'>";
                echo "<input type='hidden' name='project_id' value='" . $row["ID_PROJECT"] . "'>";
                echo "<button class='delete_btn' type='submit' onclick='return confirm(\"Sigur doriți să ștergeți acest proiect?\");'><img src='media/x-mark.png' alt='buttonpng' border='0' /></button>";
                echo "</form>";


                echo "</div>";
                // Puteți adăuga descrierea proiectului aici dacă este disponibilă în baza de date
                echo "<div>";
                echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus labore tempore fuga. Facere vero omnis et! Asperiores minus odit praesentium quaerat distinctio minima dolore ad quo aperiam.</p>";
                echo "</div>";
                echo "</article>";
            }
        } else {
            echo "Nu s-au găsit rezultate";
        }

        $conn->close();
        ?>
    </main>

    <br>
    <br>
    <div id="contact" class="contact_main">
        <h2 id="contacteaza">Contacteaza-ma pentru orice detalii</h2>
        <main class="contact_form">

            <div class="contact_text">

                <br>
                <h2>Informatii de contact:</h2>
                <h3>Adresa postala</h3>
                <p>Strada Alba 5, Alba Iulia 510009</p>
                <div class="flex">
                    <h3>Tel.:</h3>
                    <p> 07967513498</p>
                </div>
                <div class="flex">
                    <h3>Email.:</h3>
                    <p> stoian.cristian000@gmail.com</p>
                </div>
                <h3>Social Media.:</h3>

                <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
                <a href="https://twitter.com/" class="fa fa-twitter"></a>
                <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
                <a href="https://github.com/Peach0069" class="fa fa-github"></a>

            </div>
            <div class="contact_fill">
                <h2>Scrie un mesaj aici:</h2>
                <form action="" method="get" class="form">
                    <div class="contactName" id="contactName">
                        <label for="Name" class="required" required>Nume</label>

                        <input type="text" id="name" name="name" placeholder="Giovani" size="30" required>
                    </div>

                    <br>

                    <div class="contactEmail" id="contactEmail">
                        <label for="email" class="required" required>Email</label>

                        <input type="email" id="email" name="email" placeholder="yourname@gmail.com" size="30" required>
                    </div>

                    <br>

                    <div class="contactSubject" id="contactSubject">
                        <label for="subject">Subiect</label>

                        <select name="subject" id="subject">
                            <option>General</option>
                            <option>Special</option>
                            <option>I like kittens </option>
                        </select>
                    </div>
                    <br>
                    <div class="contactMessage" id="contactMessage">
                        <label for="message" size="30" class="required" required>Mesaj</label>

                        <textarea name="message" id="message" cols="34" rows="7" required></textarea>
                    </div>
                    <br>
                    <div>
                        <input type="submit" value="Trimite" id="submit">
                    </div>
                </form>
            </div>

        </main>
    </div>
    <br><br>

    <div class="break_line"></div>

    <footer>
        <br>
        <img src="media/logoCS.png" alt="" id="footer_logo">
        <p id="copyright">© 2021. Design si implemetare: Stoian Cristian. Toate drepturile rezervate</p>
    </footer>
</body>

</html>