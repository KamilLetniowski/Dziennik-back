<?php
require 'getPupils.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dodaj kurwiszona</title>
</head>
<body>
<form action="pupil_add" method="post">
    Imie<input type="text" name="kurwiszon"><br>
    Nazwisko<input type="text" name="kurwiszon_sur"><br>
    Klasas <select name="kurwiszon_class">
        <option>1C</option>
        <option>2B</option>
        <option>3A</option>
    </select>
    <input type="submit" value="JAZDA!">
</form>

<br>
<br>

<form action="subject_add.php" method="post">
    Przedmiot<input type="text" name="subject"><br>
    Prowadzący<input type="text" name="leader"><br>
    Data rozpoczęcia<input type="datetime-local" name="date"><br>
    Data zakończenia<input type="datetime-local"  name="date_end"><br>
    Klasa<select name="class">
        <option>1C</option>
        <option>2B</option>
        <option>3A</option>
    </select>
    <input type="submit" value="Dodaj przedmioty!">
</form>

<br>
<br>


<form action="course_add.php" method="post">
    Nazwa kursu<input type="text" name="kurwiszon_tortura"><br>
    Prowadzący<input type="text" name="władca_kurwiszonow"><br>

    <input type="submit" value="DODAJ KURSA!">
</form>

<form action="add_pupil_to_course.php" method="get">

    <br>
    <br>

    Wybierz ucznia do dodania
    <br>
    <select name="choose_kurwiszon">
        <option value="">Wybierz ucznia </option>
        <?php
        $result1= get_calendar_users();
        while($row1 = mysqli_fetch_array($result1)):;?>
            <option  value="<?php echo $row1['id'];?>" ><?php echo $row1['name']." ".$row1['class_id'];?></option>
        <?php endwhile;?>
    </select>
    <br>
    <select name="choose_course">
        <option value="">Wybierz kurs </option>
        <?php

        $result= get_calendar_course();
        while($row = mysqli_fetch_array($result)):;?>
            <option  value="<?php echo $row['id'];?>" ><?php echo $row['name']." ".$row['leader'];?></option>
        <?php endwhile;?>
    </select>
<!--        Wybierz kurs-->
<!--        <select name="władca_kurwiszonow">-->
<!--            <option></option>-->
<!--        </select>-->
        <input type="submit" value="DODAJ UCZNIA DO KURSA!">
</form>

</body>
</html>
