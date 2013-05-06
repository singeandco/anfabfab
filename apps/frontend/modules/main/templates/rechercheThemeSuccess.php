<script>
    $(function(){
        $('#listeThemes').button();
    })

</script>

<div  style="float: right;" class="margin10">
    <a id="listeThemes" class="lienDecore petit" href="<?php echo url_for('main/index') ?>">Liste des articles</a>
</div>

<br />
<br />
<br />
<div class="margin10">

        <h2 class="margin10">Articles sur le thème "<?php echo $theme ?>"</h2>
        <hr>
        <br />

    <div >
        <?php foreach ($articles as $article): ?>
            <div >
                <table class="articleListe borderNoir    margin10 boxShadow backgroundOther">
                    <tr>
                        <td style="padding-left: 10px;" class="alignHaut">

                            <a 
                                class="lienDecore" 
                                href="<?php echo url_for('article/show?article=' . $article->getId()) ?>">


                                <?php if (strlen($article->getTitre()) > 35): ?>
                                    <h3><?php echo substr($article->getTitre(), 0, 35) . '...' ?></h3>
                                <?php else : ?>

                                    <h3><?php echo $article->getTitre() ?></h3>
                                <?php endif; ?>

                            </a>
                            <br />

                            <h6><?php echo $article->dateFr($article->getCreated_at()) ?></h6>

                            <span style="float: right;" class="petit">
                                <a class="lienDecore" href="<?php echo url_for('main/rechercheTheme?theme=' . $article->getTheme()) ?>">
                                    <?php echo $article->getTheme() ?>
                                </a>
                            </span>
                            <br />


                        </td>
                        <td style="width: 130px">
                            <a 
                                class="lienDecore" 
                                href="<?php echo url_for('article/show?article=' . $article->getId()) ?>">
                                <img  class="imageMiniature borderNoir" src="<?php echo image_path($article->getImage()) ?>" />
                            </a>

                        </td>
                    </tr>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<br />