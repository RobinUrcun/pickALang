<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./style/Base/reset.css" rel="stylesheet" />
    <link href="./style/index.css" rel="stylesheet" />
    <meta name="description" content="Exprimez votre opinion et votez pour votre langage de programmation préféré sur PickALang ! Rejoignez la communauté et faites entendre votre choix sans inscription." />
    <meta name="keywords" content="voter langage de programmation, choisir langage préféré, vote programmation, PickALang, développeurs, préférence langage" />

</head>
<body>
    <?php include_once(__DIR__ . '/layouts/headerBar/headerBar.php'); 
    include_once(__DIR__ . '/utils/db_connect.php');
    $fetch = $mysqlClient->query("SELECT * FROM languages_table");
    $languages = $fetch->fetchAll(PDO::FETCH_ASSOC);
    ?>
   <main class="vote_page">
   <h1>Voter pour un langage!</h1>

   <section class="vote_section">

        <div class="languages_wrapper">
            <?php foreach($languages as $language) :
            ?>
            <div class="language_wrapper">
            
                <img src=".<?php echo $language['img_url'] ?>" alt="Logo <?php echo $language['title'] ?>">
                <h2>
                    <?php echo $language['title'] ?>
                </h2>
                <form method="POST" action="submit_vote.php?id=<?php echo $language['language_id'] ?>">
                    <button type="submit" value="<?php echo $language['language_id'] ?>">Voter</button>
                </form>
            </div>
            <?php endforeach ?>
        </div>
    </section>
   </main>
    <?php include_once(__DIR__ . '/layouts/footer/footer.php') ?>
</body>
</html>