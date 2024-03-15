<?php 

namespace Piedpiper\Component\Spm\Administrator\View\Projects;
use Joomla\CMS\MVC\View\GenericDataException;
use Joomla\CMS\MVC\View\HtmlView as  BaseHtmlView;

class HtmlView extends BaseHtmlView
{
    public $filterForm;
    public $state;
    public $items = [];
    public $pagination;
    public $activeFilters = [];

    public function display($tpl = null): void
    {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');

        if (count($errors = $this->get('Errors'))) {
            throw new GenericDataException(implode('/n', $errors), 500);
        }

        parent::display($tpl);
    }
}