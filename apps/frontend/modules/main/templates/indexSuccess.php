
<!--liste themes-------------------------------------------------------------->
<div style="text-align: center" class="listeThemes plusPetit">
    <?php foreach ($listeThemes as $theme) : ?>

        <a href="<?php echo url_for('main/rechercheTheme?theme=' . $theme->getTheme()) ?>">
            <?php echo $theme->getTheme() ?>
        </a>/

    <?php endforeach; ?>

</div>

<?php if ($articles->getPage() == 1): ?>


    <!--Edito --------------------------------------------------------------------->
    <div  style="background-color: whitesmoke;margin: auto;border-bottom: 1px solid lightgrey;">
        <table >
            <tr>
                <td>

                    <div id="edito" style="display: inline-block;">
                        <h4 style="float: right;margin-top: 5px;" ><?php echo $edito->dateFr($edito->getCreated_at()) ?></h4>

                        <h2 style="float: left" ><?php echo $edito->getTitre() ?></h2><br /><br />

                        <div style="font-size: 0.8em;"><?php echo nl2br($edito->getArticle()) ?></div>
                    </div>
                </td>
                <td>
                    <img style="margin-right: 30px; " height="150" alt="singe" src="<?php echo image_path("singeBanksy200Transpa2.png") ?>" />
                    <div class="plusPetit" style="display: inline-block; border: 1px solid lightgrey" >&nbsp; Monkey by <a class="lienDecore" target="blank" href="http://www.banksy-art.com/">Banksy</a>&nbsp;</div>
                </td>
            </tr>
        </table>

        <div style="vertical-align: center; width: 300px; margin: auto">
            <img width="300"  alt="frise" src="<?php echo image_path("frise.png") ?>" />
        </div>

<br />

        <!--<div style="text-align: center" class="listeThemes plusPetit">&nbsp;</div>-->

    </div>
<?php endif; ?>


<!--liste articles------------------------------------------------------------->

<script>
    $(function() {
        $( "#accordion" ).accordion({
            heightStyle: "content",
            collapsible: true
        });

        $('.theme').button();
        
    });
</script>


<!--Boutons pager-->

<div class="boutonsPager">
    <a class="precedentSuivant" href="<?php echo url_for('main/index') ?>?page=<?php echo $articles->getFirstPage() ?>" >&nbsp;<<&nbsp;</a>
    <a class="precedentSuivant" href="<?php echo url_for('main/index') ?>?page=<?php echo $articles->getPreviousPage() ?>" >&nbsp;<&nbsp;</a>

    page <?php echo $articles->getPage() ?> sur <?php echo $articles->getLastPage() ?>

    <a class="precedentSuivant" href="<?php echo url_for('main/index') ?>?page=<?php echo $articles->getNextPage() ?>" >&nbsp;>&nbsp;</a>
    <a class="precedentSuivant" href="<?php echo url_for('main/index') ?>?page=<?php echo $articles->getLastPage() ?>" >&nbsp;>>&nbsp;</a>
</div>   

<!----------------------------Articles-------------------->

<div class="margin10">
    <div class="padding10" id="accordion">

        <?php foreach ($articles as $article): ?>
            <h1 class="titre-ui"  >
                <strong  ><?php echo $article->getTitre() ?></strong> 

                <span style="float: right" class="petit">
                    <?php echo date('d-m-Y', strtotime($article->getCreated_at())) ?>
                </span>

                <span style="margin-top: 4px; margin-right: 30px;float: right" class=" plusPetit " >
                    <?php echo '(' . $article->getTheme() . ')' ?>
                </span>


            </h1> 

            <div >




                <br />

                <table class="padding10" style="width: 100%;border-bottom: solid 1px #f0f0f0">
                    <tr>
                        <td  style="font-size: 14px; vertical-align: top; text-align: justify; padding-right: 10px; width: 100%" >

                            <div class="padding10 borderNoirSans" style="background-color: white;padding-top: 10px;">
                                <?php echo nl2br($article->getArticle(ESC_RAW)) ?>
                                <br />
                            </div>

                            <a class="lienDecore" style="float: right; vertical-align: bottom;" href="<?php echo url_for('commentaire/new?article=' . $article->getId()) ?>">
                                <br />
                                <span class="commenter" >commenter</span>

                            </a>

                        </td>

                        <td style="float: right">

                            <img width="300px" id="imageGrand" src="<?php echo image_path($article->getImage()) ?>" />

                            <a class="lienDecore theme" 
                               style=" font-size: 0.6em;float: right; margin-top: 5px;" 
                               href="<?php echo url_for('main/rechercheTheme?theme=' . $article->getTheme()) ?>">
                                < <?php echo $article->getTheme() ?> > 
                            </a>

                        </td>
                    </tr>

                </table>
                <br />

                <!--------------------------commentaires--------------------------->

                <?php foreach ($commentaires as $commentaire): ?>

                    <?php if ($commentaire->getArticle_id() == $article->getId()): ?>

                        <div class="commentaire borderNoirSans padding10">


                            <strong> <?php echo $commentaire->getLogin() . ', ' ?></strong>

                            <span style="float:right"><h5><?php echo $article->dateFr($commentaire->getCreated_at()) ?></h5></span><br />

                            <?php echo $commentaire->getTitre() ?>

                            <p class="commentaireTexte">
                                <?php echo nl2br($commentaire->getCommentaire()); ?>
                            </p>

                        </div>
                    <?php endif; ?>
                <?php endforeach;
                ?>

            </div>

        <?php endforeach; ?> 
    </div>
</div>


<!--Boutons pager-->
<div class="boutonsPager">
    <a class="precedentSuivant" href="<?php echo url_for('main/index') ?>?page=<?php echo $articles->getFirstPage() ?>" >&nbsp;<<&nbsp;</a>
    <a class="precedentSuivant" href="<?php echo url_for('main/index') ?>?page=<?php echo $articles->getPreviousPage() ?>" >&nbsp;<&nbsp;</a>

    page <?php echo $articles->getPage() ?> sur <?php echo $articles->getLastPage() ?>

    <a class="precedentSuivant" href="<?php echo url_for('main/index') ?>?page=<?php echo $articles->getNextPage() ?>" >&nbsp;>&nbsp;</a>
    <a class="precedentSuivant" href="<?php echo url_for('main/index') ?>?page=<?php echo $articles->getLastPage() ?>" >&nbsp;>>&nbsp;</a>
</div>    
<!--Boutons pager-->
