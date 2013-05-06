<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div class="padding10 margin10">
    <form action="<?php echo url_for('article/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>
        <table>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <?php echo $form->renderHiddenFields(false) ?>
                        <?php if (!$form->getObject()->isNew()): ?>
                            &nbsp;<?php echo link_to('Delete', 'article/delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                        <?php endif; ?>

                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php echo $form->renderGlobalErrors() ?>
                <tr>
                    <th><?php echo $form['titre']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['titre']->renderError() ?>
                        <?php echo $form['titre'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['article']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['article']->renderError() ?>
                        <?php echo $form['article'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['auteur']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['auteur']->renderError() ?>
                        <?php echo $form['auteur'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['theme']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['theme']->renderError() ?>
                        <?php echo $form['theme'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['image']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['image']->renderError() ?>
                        <?php echo $form['image'] ?>
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <td> <input type="submit" value="Save" />
                    </td>
                </tr>

            </tbody>
        </table>
    </form>
</div>