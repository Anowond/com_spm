<?php

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

?>

<form action="<?= Route::_('index.php?option=com_spm&view=project&layout=edit&id='. (int) $this->item->id ) ?>" method="POST" name="adminForm" id="project-form" class="form-validate">
    <div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->form->renderField('name') ?>
                        <?= $this->form->renderField('alias') ?>
                        <?= $this->form->renderField('description') ?>
                        <?= $this->form->renderField('deadline') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="task" value="">
    <?= HTMLHelper::_('form.token') ?>
</form>