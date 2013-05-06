<h1>Articles</h1>

<table class="padding10 " >
    <thead>
        <tr>
            <th class =" borderNoir">Date</th>
            <th class =" borderNoir">Date</th>
            <th class =" borderNoir">Theme</th>
            <th class =" borderNoir">Titre</th>
            <th class =" borderNoir">Auteur</th>
            <th class =" borderNoir">Article</th>
            <th class =" borderNoir">Image</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td class =" borderNoir"><?php echo $article->getCreated_at() ?></td>
                <td class =" borderNoir"><?php // echo $article->getUpdated_at()      ?></td>
                <td class =" borderNoir"><?php echo $article->getTheme() ?></td>

                <td class =" borderNoir">
                    <a href="<?php echo url_for('article/edit?id=' . $article->getId()) ?>"> 
                        <?php echo $article->getTitre() ?>
                    </a>
                    
                </td>

                <td class =" borderNoir"><?php echo $article->getAuteur() ?></td>
                <td class =" borderNoir"><?php echo $article->getArticle() ?></td>
                <td class =" borderNoir"><?php echo $article->getImage() ?></td>
            </tr>
            
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo url_for('article/new') ?>">New</a>
