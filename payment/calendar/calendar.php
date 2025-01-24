<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier d'événements</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            display: block;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<h1>Ajouter un événement</h1>
<form action="" method="POST">
    <label for="title">Titre:</label>
    <input type="text" id="title" name="title" required><br><br>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>
    
    <label for="event_date">Date:</label>
    <input type="date" id="event_date" name="event_date" required><br><br>
    
    <label for="start_time">Heure de début:</label>
    <input type="time" id="start_time" name="start_time" required><br><br>
    
    <label for="end_time">Heure de fin:</label>
    <input type="time" id="end_time" name="end_time" required><br><br>
    
    <label for="location">Lieu:</label>
    <input type="text" id="location" name="location"><br><br>
    
    <input type="submit" name="submit" value="Ajouter l'événement">
</form>

<?php
// Connexion à la base de données
require "../config/config.php";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8", $name, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Traitement du formulaire d'ajout d'événement
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $location = $_POST['location'];

    $stmt = $pdo->prepare("INSERT INTO events (title, description, event_date, start_time, end_time, location) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $event_date, $start_time, $end_time, $location]);

    echo "<p>Événement ajouté avec succès !</p>";
}

// Vérifier si le mois et l'année sont passés en paramètres GET
if (isset($_GET['month']) && isset($_GET['year'])) {
    $currentMonth = $_GET['month'];
    $currentYear = $_GET['year'];
} else {
    $currentMonth = date('m');
    $currentYear = date('Y');
}

// Récupérer les événements du mois en cours
$stmt = $pdo->prepare("SELECT * FROM events WHERE MONTH(event_date) = :month AND YEAR(event_date) = :year");
$stmt->execute(['month' => $currentMonth, 'year' => $currentYear]);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fonction pour générer le calendrier
function draw_calendar($month, $year, $events) {
    $daysOfWeek = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    if ($dayOfWeek == 0) $dayOfWeek = 7;

    $calendar = "<h2>$monthName $year</h2>";
    $calendar .= "<table border='1'>";
    $calendar .= "<tr>";

    foreach ($daysOfWeek as $day) {
        $calendar .= "<th>$day</th>";
    }

    $calendar .= "</tr><tr>";

    if ($dayOfWeek > 1) {
        $calendar .= "<td colspan='" . ($dayOfWeek - 1) . "'></td>";
    }

    $currentDay = 1;

    while ($currentDay <= $numberDays) {
        if ($dayOfWeek > 7) {
            $dayOfWeek = 1;
            $calendar .= "</tr><tr>";
        }

        $currentDate = "$year-$month-" . str_pad($currentDay, 2, "0", STR_PAD_LEFT);

        $calendar .= "<td>";

        if (array_search($currentDate, array_column($events, 'event_date')) !== false) {
            $event = array_filter($events, function($e) use ($currentDate) {
                return $e['event_date'] === $currentDate;
            });
            foreach ($event as $e) {
                $calendar .= "<strong>$currentDay</strong><br><span>{$e['title']}</span>";
            }
        } else {
            $calendar .= "$currentDay";
        }

        $calendar .= "</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if ($dayOfWeek != 1) {
        $remainingDays = 8 - $dayOfWeek;
        $calendar .= "<td colspan='$remainingDays'></td>";
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    return $calendar;
}

// Calcul des mois et années pour les boutons de navigation
$prevMonth = $currentMonth - 1;
$nextMonth = $currentMonth + 1;
$prevYear = $currentYear;
$nextYear = $currentYear;

if ($prevMonth == 0) {
    $prevMonth = 12;
    $prevYear--;
}

if ($nextMonth == 13) {
    $nextMonth = 1;
    $nextYear++;
}

// Afficher les boutons de navigation
echo "<div>";
echo "<a href='?month=$prevMonth&year=$prevYear'>« Précédent</a>";
echo "<a href='?month=$nextMonth&year=$nextYear' style='float: right;'>Suivant »</a>";
echo "</div>";

// Afficher le calendrier
echo draw_calendar($currentMonth, $currentYear, $events);
?>
</body>
</html>
