<?php session_start();
require_once  __DIR__ . '/vendor/autoload.php';



$toastMessage = isset($_SESSION['toast_message']) ? $_SESSION['toast_message'] : '';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./style/Base/reset.css" rel="stylesheet" />
    <link href="./style/index.css" rel="stylesheet" />
    <meta name="description" content="Découvrez le classement des langages de programmation les plus populaires sur PickALang ! Voyez quels langages sont préférés par la communauté de développeurs." />
    <meta name="keywords" content="classement langages de programmation, langages populaires, top langages programmation, PickALang, préférences développeurs, programmation" />

</head>
<body>
    <?php include_once(__DIR__ . '/layouts/headerBar/headerBar.php'); 
    include_once(__DIR__ . '/utils/db_connect.php');
    $fetch = $mysqlClient->query("SELECT * FROM languages_table ORDER BY score DESC");
    $languages = $fetch->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <main class="ranking_page">
        <h1>Votre classement</h1>
        <section class="ranking_section">
           
                <table class="ranking_row">
                    <thead>
                        <tr>
                            <th scope="col">Rang</th>
                            <th scope="col">Langage </th>
                            <th scope="col">Logo</th>
                            <th scope="col">Votes</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php for($i=0; $i < count($languages); $i++) : ?>
                            <tr>
                                <td class="table_rang">
                                    <?php echo ($i + 1 )?>
                                </td>
                                <td class="table_name">
                                    <h2>
                                        <?php echo $languages[$i]['title'] ?>
                                    </h2>
                                </td>
                                <td>
                                    <img class="language_img" <?php echo ( "src='." . $languages[$i]['img_url']) . "'" . " " . "alt='" . "logo_" . $languages[$i]['title'] . "'"?> />
                                </td>
                                <td class="table_score">
                                    <?php echo ($languages[$i]['score']) ?>
                                </td>
                            </tr>
                        <?php endfor ?>

                    </tbody>
                </table>
                   
        </section>
    </main>
    <?php if(!empty($toastMessage)) : ?>
        <div class="toast">
            <?php echo $toastMessage ?>
        </div>
        <?php endif ?>
    <?php include_once(__DIR__ . '/layouts/footer/footer.php') ?>
    <?php unset($_SESSION['toast_message']); ?>
</body>
</html>