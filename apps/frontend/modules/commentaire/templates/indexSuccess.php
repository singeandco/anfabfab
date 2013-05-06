<h1>Commentaires List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Titre</th>
      <th>Article</th>
      <th>User</th>
      <th>Date</th>
      <th>Commentaire</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($commentaires as $commentaire): ?>
    <tr>
      <td><a href="<?php echo url_for('commentaire/edit?id='.$commentaire->getId()) ?>"><?php echo $commentaire->getId() ?></a></td>
      <td><?php echo $commentaire->getTitre() ?></td>
      <td><?php echo $commentaire->getArticleId() ?></td>
      <td><?php echo $commentaire->getUserId() ?></td>
      <td><?php echo $commentaire->getDate() ?></td>
      <td><?php echo $commentaire->getCommentaire() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('commentaire/new') ?>">New</a>
