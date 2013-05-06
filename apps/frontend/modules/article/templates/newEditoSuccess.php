<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<form action="<?php echo url_for("article/newEdito") ?>" >
    titre : <input type="text" name="titre"><br />
    auteur : <input type="text" name="auteur"><br />
    edito : <textarea type="text" rows="10" cols="80" name="article"></textarea><br />
    <input type="submit">




</form>