

<div class="padding10">

    <!------------------------------------------------------ARTICLE------------>
    <div style="margin-left: 20px;">
        <h6>(<a class="lienDecore" href="<?php echo url_for('main/rechercheTheme?theme=' . $article->getTheme()) ?>">
                <?php echo $article->getTheme() ?>
            </a>)
        </h6>

        <div  style="float: right">
            <span id="liste"> <a class="petit" href="<?php echo url_for('main/index') ?>">Liste des articles</a></span>
        </div>

        <br /><br />


        <h2><?php echo $article->getTitre() ?></h2>

        <br />

        <span  class="petit"><?php echo $dateArticle ?></span>

        <br /><br/>

    </div>
    <table class="padding10" style="width: 100%; border-top: solid 1px #f0f0f0;border-bottom: solid 1px #f0f0f0">
        <tr>
            <td  style="font-size:14px; vertical-align: top; text-align: justify; padding-right: 10px; width: 100%" >
                <div class="borderNoirSans" style="background-color: white; padding: 10px;">
                <?php echo nl2br($article->getArticle(ESC_RAW)) ?><br /><br />
</div>
                <a class="lienDecore" style="float: right; vertical-align: bottom" 
                   href="<?php echo url_for('commentaire/new?article=' . $article->getId()) ?>">
                    <br />
                    <span id="commenter">commenter</span>
                </a>

            </td>
            <td style="width:300px;float: right">

                <?php if (image_path($article->getImage()) != null): ?>
                    <img width="300px" id="imageGrand"  src="<?php echo image_path($article->getImage()) ?>" />
                <?php endif; ?>

            </td>
        </tr>
    </table>

    <br />

    <!-----------------------precedent suivant--------------------------------->

    <table style="width: 100%">
        <tr>
            <td>
                <?php if (isset($precedent)): ?>
                    <?php if ($precedent->getId() != $article->getId()): ?>
                        <a id="precedent" href="<?php echo url_for('article/show?article=' . $precedent->getId()) ?>"> <!-- bouton precedent si ce n'est pas le premier article-->
                            <div class=" petit">
                                <table>
                                    <tr><td ><b> < &nbsp;</b></td>
                                        <td>
                                            <?php if (strlen($precedent->getTitre()) > 20): ?>
                                                <?php echo substr($precedent->getTitre(), 0, 20) . '...' ?>
                                            <?php else: ?>
                                                <?php echo $precedent->getTitre() ?>

                                            <?php endif; ?>
                                            <br /> (<?php echo $precedent->getTheme() ?>)
                                        </td>
                                    </tr>
                                </table> 


                            </div>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
            <td >

                <?php if (isset($suivant)): ?>
                    <?php if ($suivant->getId() != $article->getId()): ?>
                        <a id="suivant" href="<?php echo url_for('article/show?article=' . $suivant->getId()) ?>"><!-- suivant  (idem) -->
                            <div class=" petit" >
                                <table >
                                    <tr><td><?php if (strlen($suivant->getTitre()) > 20): ?>
                                                <?php echo substr($suivant->getTitre(), 0, 20) . '...' ?>

                                            <?php else: ?>
                                                <?php echo $suivant->getTitre() ?>
                                            <?php endif; ?>
                                            <br />(<?php echo $suivant->getTheme() ?>)</td>
                                        <td>
                                            &nbsp;<b> ></b>
                                        </td>
                                    </tr>
                                </table>

                            </div>  
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

            </td>
        </tr>
    </table>
    <br />


    <!------------------COMMENTAIRES  ----------------------------------------->


    <?php foreach ($commentaires as $commentaire): ?><!-- pour chaque commentaire-->

        <div class="petit commentaire borderNoirSans padding10 ">


            <h5><?php echo $commentaire->getLogin() . ', ' ?></h5>

            <span style="float:right"><?php echo $article->dateFr($commentaire->getCreated_at()) ?></span><br />

            <?php echo $commentaire->getTitre() ?>

            <p class="commentaireTexte">
                <?php echo nl2br($commentaire->getCommentaire()); ?>
            </p>

        </div>

    <?php endforeach; ?>
    <br />

</div>

<script>

    $(function(){
        $('#liste').button();
        
        $('#precedent').button();
        $('#suivant').button();
    })

</script>

