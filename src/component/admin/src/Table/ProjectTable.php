<?php

namespace Piedpiper\Component\Spm\Administrator\Table;
use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

class ProjectTable extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct('#__spm_projects', 'id', $db);
    }
}