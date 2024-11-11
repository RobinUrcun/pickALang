<?php session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement des langages de programation</title>
    <link href="./style/Base/reset.css" rel="stylesheet" />
    <link href="./style/index.css" rel="stylesheet" />
    <meta name="description" content="Votez pour votre langage de programmation préféré sur PickALang ! Un site simple et sans connexion requise pour exprimer vos préférences en programmation et découvrir les choix des autres développeurs." />
    <meta name="keywords" content="PickALang, vote langage de programmation, meilleur langage de programmation, préférences développeurs, programmation, technologie" />

</head>
<body>
<?php include_once(__DIR__ . '/layouts/header.php') ?>
<main>
   <?php include_once(__DIR__ . "/pages/homepage/rankSection.php") ?>
</main>
<?php include(__DIR__ . "/layouts/footer/footer.php") ?>
</body>
</html>