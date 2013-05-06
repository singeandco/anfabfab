
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#tabs" ).tabs({
            collapsible: true
        });
    });
</script>


<div id="tabs">
    <ul>
        <li><a href="#tabs-1"  class="lienDecore" >Le Singe Batteur</a></li>
        <li><a href="#tabs-2"  class="lienDecore">Papi Cool</a></li>
        <li><a href="#tabs-3"  class="lienDecore">Le Premier Sens</a></li>
    </ul>

    <div id="tabs-1">
        <p class="petit backgroundWhite borderNoir margin10 padding10 ">
            Quelques productions musicales de divers horizons, à écouter,liker, partager, et commenter...<br />
            Visitez <a target="blank" href="https://soundcloud.com/le-singe-batteur" class="lienDecore">sound cloud</a> pour en découvrir davantage.

        </p>   


        <div style="text-align: center" id="load" ></div>

        <script>

            $('#load').html('veuillez patienter un instant...').hide().css('color','white');
            $('#load').fadeIn(3000);
            $('#load').fadeOut(3000);
        </script>

        <?php ?>



        <?php foreach ($morceaux as $morceau): ?>


            <table style="vertical-align: central">
                <tr>
                    <td>
                        <span  style="color: whitesmoke">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _<br /><br /></span>
                    </td> 
                    <td>
                        <img style="padding-bottom: 7px;" width="40px;" src="<?php echo image_path('ciseaux.png') ?>"/>
                    </td> 
                </tr>
            </table>

            <iframe style=" margin-left: 10px;margin-right: 10px;margin-bottom: 5px;"
                    width="923px" 
                    height="166" 
                    scrolling="no" 
                    frameborder="no" 
                    src="<?php echo $morceau->getTitre() ?>">

            </iframe>








        <?php endforeach; ?>

    </div>
    <div id="tabs-2">

        <p class="petit backgroundWhite borderNoir margin10 padding10 ">

            /EN CONSTRUCTION/ <BR />
	PapiCool vous propose une croustillade de lyrics déglacée, accompagnée d'une julienne de beats de saison, ayant autant de sens et de saveur que cette introduction.<br />
            Fort de leur longue collaboration, le Kid, le Doc et le Singe avancent en cadence ("même si le truc est couru d'avance...").
            L'album "le retour de PapiCool, pas de jour férié pour les braves" est disponible en téléchargement gratuit (tant qu'à faire), en bas de page."

        </p>      






    </div>
    <div id="tabs-3">

        <p class="petit backgroundWhite borderNoir margin10 padding10 ">
            sur votre gauche vous pouvez écouter les participations du Singe aux albums du Premier Sens, 
            et sur votre droite, vous est offerte l'écoute des albums correspondants.<br />
            Pour de plus amples informations, veuillez prendre une des correspondances suivantes :<br /> 
            <a target="blank" href="https://www.facebook.com/lepremiersens" class="lienDecore">facebook le Premier Sens</a> | 
            <a target="blank" href="http://lepremiersens.wordpress.com/tag/le-premier-sens/" class="lienDecore" >site le Premier Sens</a> | 
            <a target="blank" href="http://lepremiersens.bandcamp.com/" class="lienDecore"> BandCamp le Premier Sens</a>


        </p>       


        <table id="tablePremierSens" >
            <tr>
                <td>

                    <div id="premierSensLeft" >


                        <iframe 
                            width="923" 
                            height="100" 
                            style="position: relative; display: block; width: 400px; height: 100px;" 
                            src="http://bandcamp.com/EmbeddedPlayer/v=2/track=501177192/size=venti/bgcol=FFFFFF/linkcol=4285BB/" 
                            allowtransparency="true" 
                            frameborder="0">
                        <a href="http://lepremiersens.bandcamp.com/track/18h30">
                            18h30 by Le Singe Batteur
                        </a>
                        </iframe>


                        <br />

                        <iframe 
                            width="400"
                            height="100" 
                            style="position: relative; display: block; width: 400px; height: 100px;" 
                            src="http://bandcamp.com/EmbeddedPlayer/v=2/track=1908592857/size=venti/bgcol=FFFFFF/linkcol=4285BB/" 
                            allowtransparency="true" frameborder="0">
                        <a href="http://lepremiersens.bandcamp.com/track/please-chill-le-singe-batteur-x-lexblends">
                            Please Chill - Le Singe Batteur x Lexblends by Le Premier Sens
                        </a>
                        </iframe>

                        <br />

                        <iframe
                            width="400" 
                            height="100" 
                            style="position: relative; display: block; width: 400px; height: 100px;" 
                            src="http://bandcamp.com/EmbeddedPlayer/v=2/track=282387412/size=venti/bgcol=FFFFFF/linkcol=4285BB/" 
                            allowtransparency="true" 
                            frameborder="0">
                        <a href="http://lepremiersens.bandcamp.com/track/le-singe-batteur-le-no-l-des-singes">
                            Le Singe Batteur - Le Noël des Singes by Le Premier Sens
                        </a>
                        </iframe>
                    </div>
                </td>

                <td style="color: whitesmoke">
                    <img src="<?php echo image_path('ciseauxVertical.png') ?>"/>
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />
                    &nbsp;&nbsp; |<br />

                </td>


                <td>
                    <div id="premierSensLeft" >

                        <iframe 
                            width="400" 
                            height="100" 
                            style="position: relative; display: block; width: 400px; height: 100px;" 
                            src="http://bandcamp.com/EmbeddedPlayer/v=2/album=2758210969/size=venti/bgcol=FFFFFF/linkcol=4285BB/" 
                            allowtransparency="true" frameborder="0">
                        <a href="http://lepremiersens.bandcamp.com/album/new-beats-on-the-clock">
                            New Beats On The Clock by Le Premier Sens
                        </a>
                        </iframe>

                        <br />



                        <iframe 
                            width="400" 
                            height="100" 
                            style="position: relative; display: block; width: 400px; height: 100px;" 
                            src="http://bandcamp.com/EmbeddedPlayer/v=2/album=4129401762/size=venti/bgcol=FFFFFF/linkcol=4285BB/" 
                            allowtransparency="true" frameborder="0">
                        <a href="http://lepremiersens.bandcamp.com/album/cross-the-distance">
                            Cross The Distance by Le Premier Sens
                        </a>
                        </iframe>

                        <br />
                        <iframe 
                            width="400" 
                            height="100" 
                            style="position: relative; display: block; width: 400px; height: 100px;" 
                            src="http://bandcamp.com/EmbeddedPlayer/v=2/album=2209042917/size=venti/bgcol=FFFFFF/linkcol=4285BB/" 
                            allowtransparency="true" frameborder="0">
                        <a href="http://lepremiersens.bandcamp.com/album/first-gift">
                            First Gift by Le Premier Sens
                        </a>
                        </iframe>

                </td>
                </div>

            </tr>



        </table>




    </div>
</div>

<div  style="text-align: center" class="margin10 padding10 petit">Vous en voulez plus ? <a target="blank" class="lienDecore" href="https://soundcloud.com/le-singe-batteur">C'est par là.</a></div>

