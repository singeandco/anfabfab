<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div class="padding10 margin10">
    <form action="<?php echo url_for('commentaire/' . ($form->getObject()->isNew() ? "create" : "update") . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>
        <table>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <?php echo $form->renderHiddenFields(false) ?>
                        <?php if (!$form->getObject()->isNew()): ?>
                            &nbsp;<?php echo link_to('Delete', 'commentaire/delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                        <?php endif; ?>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php echo $form->renderGlobalErrors() ?>
                <tr>
                    <th style="text-align: right"><?php echo $form['titre']->renderLabel() ?></th>
                    <td >
                        <?php echo $form['titre']->renderError() ?>
                        <?php echo $form['titre'] ?>
                    </td>       
                </tr>

                <tr>
                    <th style="text-align: right"><?php echo $form['commentaire']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['commentaire']->renderError() ?>
                        <?php echo $form['commentaire'] ?>
                    </td>                  
                </tr>
                <tr>
                    <th style="text-align: right"><?php echo $form['login']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['login']->renderError() ?>
                        <?php echo $form['login'] ?>
                    </td>         
                </tr>
                <tr>
                    <th style="text-align: right"><?php echo $form['email']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['email']->renderError() ?>
                        <?php echo $form['email'] ?>
                    </td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" value="Save" id="valider"/>
                    </td>
                </tr>

            </tbody>
        </table>
    </form>
</div>