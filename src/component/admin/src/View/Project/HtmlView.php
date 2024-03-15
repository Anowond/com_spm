<?php

namespace Piedpiper\Component\Spm\Administrator\View\Project;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\Toolbar\ToolbarFactoryInterface;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class HtmlView extends BaseHtmlView
{
    public $form;
    public $state;
    public $item;

    public function display($tpl = null): void
    {
        $this->form = $this->get('Form');
        $this->state = $this->get('State');
        $this->item = $this->get('Item');

        if (count($errors = $this->get('Errors'))) {
            throw new GenericDataException(implode('/n', $errors), 500);
        }
        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar()
    {
        Factory::getApplication()->input->set('hidemainmenu', true);
        $isNew = ($this->item->is == 0);
        $canDo = ContentHelper::getActions('com_spm');
        $toolbar = Factory::getContainer()->get(ToolbarFactoryInterface::class)->createToolbar();

        ToolbarHelper::title(Text::_('COM_SPM_PROJECT_TITLE' . ($isNew ? 'ADD' : 'EDIT')));

        if ($canDo->get('core.create')) {
            if ($isNew) {
                $toolbar->apply('project.save');
            } else {
                $toolbar->apply('project.apply');
            }
            $toolbar->save('project.save');
        }
        $toolbar->cancel('project.cancel', 'JTOOLBAR_CLOSE');
    }
}
