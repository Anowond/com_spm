<?php

namespace Piedpiper\Component\Spm\Administrator\Model;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\AdminModel;

class ProjectModel extends AdminModel
{
    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm(
            'com_spm.project',
            'project',
            [
                'control' => 'jform',
                'load_data' => $loadData,
            ]
        );

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    protected function loadFormData()
    {
        $app = Factory::getApplication();
        $data = $app->getUserState(
            'com_spm.edit.project.data',
            []
        );

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }
}
