<?php 
require_once(__DIR__ . '/../../utils/db_connect.php');

$fetch = $mysqlClient->query("SELECT * FROM languages_table ORDER BY score DESC LIMIT 2");
$languages = $fetch->fetchAll();
 ?>
<section class="homepage_rank_section">
    <div class="section_wrapper">    
        <img class="rank_img" src="./assets/podium.webp" alt="Votre podium">
        <article class="homepage_rank_article">
            <h2>Découvrez votre classement</h2>
            <p>Votre choix impacte le classement ! Votez pour votre langage de programmation preferé et decouvrez sa place dans le classement ! </p>
            <div class="ranks_wrapper">
                <?php for($i=0; $i < count($languages); $i++) :?>
                <div class="rank_wrapper">
                    <h3>
                        <span class="rank_title">
                            <?php echo ($i + 1) ?>
                        </span> er
                    </h3>
                    <div class="rank_language_wrapper">
                        <img src=".<?php echo $languages[$i]['img_url'] ?>" alt="<?php echo "En ".($i + 1).(($i+1) === 1 ? " er ": " eme ")." position le ".$languages[$i]['title'] ?>">
                        <p>
                            <?php echo $languages[$i]['title'] ?>
                        </p>
                    </div>
                </div>
                <?php endfor ?>
                
            </div>
        </article>
    </div>
    <div class="section_wrapper">
        <?php include(__DIR__ . '../../../layouts//headerBar/headerNav/headerNav.php') ?>
    </div>
</section>