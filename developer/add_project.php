<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <h2>Adăugare Proiect Nou</h2>
    <form action="insert_project.php" method="POST" >
        <label for="project_name">Denumire Proiect:</label><br>
        <input type="text" id="project_name" name="project_name" required><br><br>

        <label for="services">Servicii:</label><br>
        <select name="services[]" id="services" multiple>
            <option value="1">BackEnd</option>
            <option value="2">FrontEnd</option>
            <option value="3">GraphicDesign</option>
        </select><br><br>

        <input type="submit" value="Adaugă Proiect">
    </form>
</body>

</html>
