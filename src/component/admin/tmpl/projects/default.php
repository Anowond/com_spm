<?php

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));

?>

<form action="<?= Route::_('index.php?option=com_spm&view=projects') ?>" method='POST' name='adminForm' id='adminForm'>
    <div class="table-responsive">
        <table class="table table-striped">
            <caption><?= Text::_('COM_SPM_PROJECTS_LIST') ?></caption>
            <thead>
                <tr>
                    <td><?= Text::_('COM_SPM_PROJECTS_LIST_ID') ?></td>
                    <td><?= Text::_('COM_SPM_PROJECTS_LIST_NAME') ?></td>
                    <td><?= Text::_('COM_SPM_PROJECTS_LIST_DEADLINE') ?></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $item) : ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->deadline ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?= $this->pagination->getListFooter() ?>
    <input type="hidden" name="task" value="">
    <?= HTMLHelper::_('form.token') ?>
</form>