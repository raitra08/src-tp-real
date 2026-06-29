<?php
    include('../inc/functions.php');

if (isset($_GET['order'])) {
    $order = $_GET['order'];
} else {
    $order = "ASC";
}

$departments = get_all_departments($order);

if ($order == "ASC") {
    $nextOrder = "DESC";
    $texteLien = "Trier par nom (Z à A)";
} else {
    $nextOrder = "ASC";
    $texteLien = "Trier par nom (A à Z)";
}
?>		
<html>
    <head>
        <title>Les news</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
        <h1>Liste des départements</h1>
        <nav class="navbar">
            <ul>
                <li><a href="index.php" class="active">Départements</a></li>
                <li><a href="search.php" class="active">🔍 Rechercher un employé</a></li>
                <li><a href="stats.php" class="active">📊 Statistiques par emploi</a></li>
                <p><a href="dept_form.php" class="active">➕Ajouter un département</a></p>
                <p><a href="emp_form.php" class="active">➕Ajouter un employé</a></p>
                <a href="index.php?order=<?=$nextOrder?>" class="active"><?=$texteLien?></a>
            </ul>
        </nav>
        <table class="table">
        <thead>    
            <tr>
                <th>Department Number</th>
                <th>Department Name</th>
                <th>Manager actuel</th>
                <th>Nombre d'employés</th>
                <th>Action</th>
            </tr>
        </thead>
        <br>
        <br>
        <tbody>
        <?php foreach ($departments as $line) {?>
            <tr>
                <td><a href="employees.php?dept_no=<?= urlencode($line['dept_no']) ?>"><?= $line['dept_no']?></a></td>
                <td><?=$line['dept_name']?></td>
                <td><?= $line['manager_name'] ?? '—' ?></td>
                <td><?= $line['nb_employees'] ?></td>
                <td><a href="dept_form.php?dept_no=<?= urlencode($line['dept_no']) ?>">Éditer</a></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    </body>
</html>


 