<?php

namespace Piedpiper\Component\Spm\Site\View\Projects;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

\defined('_JEXEC') or die;

class HtmlView extends BaseHtmlView
{
    public $state;
    public $items = [];
    public $pagination;

    public function display($tpl = null): void
    {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        parent::display($tpl);
    }
}
