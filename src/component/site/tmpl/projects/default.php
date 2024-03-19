<?php
use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or die;

?>

<form>
    <div class="items-limit-box">
        <?= $this->pagination->getLimitBox() ?>
    </div>
    <div>
        <?php foreach ($this->items as $item) : ?>
            <div>
                <h2>
                    <?= $item->name ?>
                </h2>
                <div id='project-id'>
                    <?= $item->id ?>
                </div>
                <div id='project-deadline'>
                    <?= $item->deadline ?>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <div>
            <?= $this->pagination->getResultsCounter() ?>
        </div>
    <?= $this->pagination->getListFooter() ?>
    <input type="hidden" name="task" value="projects">
    <?= HTMLHelper::_('form.token') ?>
</form>