<?php
    echo '<form method="get" action="">';
    echo '<select name="diet_code">';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['code'] . '">' . $row['description'] . '</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="Update">';
    echo '</form>';

    echo '<form method="get" action="">';
    echo '<input type="hidden" name="diet_code" value="">';
    echo '<input type="submit" value="Verwijder mijn huidige keuze">';
    echo '</form>';

    echo '<form method="get" action="homeGuest.php">';
    echo '<input type="submit" value="Terug naar de home pagina">';
    echo '</form>';
?>