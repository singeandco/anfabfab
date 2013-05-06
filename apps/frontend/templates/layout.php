
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'></link>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />

        <?php use_javascript('jquery-1.9.0.js') ?>
        <?php use_javascript('jquery-ui-1.10.0.custom.js') ?>
        <?php include_javascripts() ?>

        <?php use_stylesheet('jquery-ui-1.10.0.custom.css') ?>
        <?php use_stylesheet('main.css') ?>
        <?php include_stylesheets() ?>
    </head>

    <body>
        <script>
            
//            function testPage(){
//<?php if ($sf_request->getParameter('module') == 'morceau'): ?>       
//                                                                                                                           
//            if(confirm('voulez-vous ouvrir la page dans un nouvel onglet pour ne pas stopper la lecture en cours ?')){
//                window.open('http://www.singebatteur.com/', 'target="blank"');
//            }else{
//                window.location = 'http://www.singebatteur.com/';
//            }
                                                                                                                    
//<?php endif; ?>
//    }
        </script>

        <?php include_once 'header.php'; ?>

        <div id="container" >

            <br />

            <div  style="background-color: white;margin-left: 10px;margin-right: 10px;" class=" borderNoir" >

                <table style="width: 100%">
                    <tr>
                        <td  class="onglet" id="blogIt" align="center">

                            <a href="http://www.singebatteur.com"  >
                                <div>
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="<?php echo image_path('icones/blog.png') ?>"/>
                                            </td>
                                            <td style="text-decoration: none"> Blog-it</td>
                                        </tr>
                                    </table>
                                </div>
                            </a>

                        </td >

                        <td class="onglet" id="beatIt" align="center">

                            <a href="<?php echo url_for('morceau/index') ?>">
                                <div >
                                    <table>
                                        <tr>
                                            <td><img height="23" src="<?php echo image_path('icones/musique.png') ?>"/></td>
                                            <td style="text-decoration: none"> Beat-it</td>
                                        </tr>
                                    </table>
                                </div>
                            </a>

                        </td>  

                        <td class="onglet" id="fb" align="center" >
                            <a target="blank" href="http://fr-fr.facebook.com/pages/Le-Singe-Batteur/508949235811310">
                                <div >
                                    <table>
                                        <tr>
                                            <td > <img height="23" src="<?php echo image_path('fbSmall.png') ?>"/></td>
                                            <td style="text-decoration: none">ollow-it</td>
                                        </tr>

                                    </table>
                                </div>
                            </a>
                        </td >

                        <?php if ($sf_request->getParameter('module') != 'morceau'): ?>

                        <td style="background: linear-gradient(to top, #a08f75, whitesmoke);" id ="recherche" align="right" >
                                <div  >
                                    <form action="<?php echo url_for('main/recherche') ?>">
                                        rechercher : 
                                        <input id="inputRecherche" type="text" name="chaine" style="color: grey;" value="dans un article"></input>
                                    </form>
                                </div>                       
                            </td>

                        <?php else : ?>
                            <td class="onglet" id ="recherche" align="right" style="width: 500px;"></td>
                        <?php endif; ?>

                    </tr>
                </table>

            </div>

            <!------------------------------------------------------------------------------------->

            <div id="centre">
                <?php echo $sf_content ?> 
            </div>

            <br />

        </div>

        <div class="plusPetit" style="text-align: center;width: 220px;margin: auto">

            <span class="petit" >&copy; 2012+1<br /></span>
            Tout droit dans la réserve du Singe Batteur
        </div>


        <script type="text/javascript"> 
            $(function(){
                
                if($.browser.msie){
                    alert('ce site est optimisé pour Firefox, l\'affichage peut présenter des problèmes sous IE');
                }
                
                $('#inputRecherche').blur(function(){ 
                    $('#inputRecherche').val('dans un article').css('color', 'grey');
                })
                $('#inputRecherche').focus(function(){ 
                    $('#inputRecherche').val('');
                })
                
                //si la page courante est MUSIQUE -->
<?php if ($sf_request->getParameter('module') == 'morceau'): ?>
                                                                                                                                                                                                                                                              
            $('#beatIt').removeClass('onglet');                                                                                                                                                                                                                                
            $('#beatIt').addClass('ongletActif');                                                                                                                                                                                                                                
                          
            //si la page courante est BLOG
<?php elseif ($sf_request->getParameter('module') == 'article' || $sf_request->getParameter('module') == 'commentaire' || $sf_request->getParameter('module') == 'main') : ?>
                                                    
            $('#blogIt').removeClass('onglet');                                                                                                                                                                                                                                   
            $('#blogIt').addClass('ongletActif');                                                                                                                                                                                                                                
<?php endif; ?>
    
    })    
        </script>
    </body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</html>
