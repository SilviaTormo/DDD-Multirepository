<?php

require_once 'lib/Stio.h.php';
require_once 'lib/DependenciesValidation.h.php';
require_once 'lib/ProjectManager.h.php';

use lib\Stio;
use lib\DependenciesValidation;
use lib\ProjectManager;

Stio::showMessage('Multi repository cli init');
Stio::showMessage('WELCOME TO SOLIDJOBS CLI ASSISTANT', Stio::MESSAGE_TYPE_SUCCESS);

/**
 * Check dependencies
 */
Stio::showMessage('Checking dependencies...');
DependenciesValidation::checkAll();

/**
 * Installing projects
 */
Stio::showMessage('Installing public repositories...', Stio::MESSAGE_TYPE_INFO);

$projectManager = ProjectManager::getInstanceFromProjectData(Stio::getInstance()->getData());

$projectManager->installPublicProjects();
