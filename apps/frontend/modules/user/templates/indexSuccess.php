<h1>Users List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Login</th>
      <th>Email</th>
      <th>Pass</th>
      <th>Nb messages</th>
      <th>Nb connexions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><a href="<?php echo url_for('user/edit?id='.$user->getId()) ?>"><?php echo $user->getId() ?></a></td>
      <td><?php echo $user->getLogin() ?></td>
      <td><?php echo $user->getEmail() ?></td>
      <td><?php echo $user->getPass() ?></td>
      <td><?php echo $user->getNbMessages() ?></td>
      <td><?php echo $user->getNbConnexions() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
