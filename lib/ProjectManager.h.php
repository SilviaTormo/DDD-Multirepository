<?php


namespace lib;

/**
 * Class ProjectManager
 * @package lib
 */
class ProjectManager
{
    private static ?ProjectManager $instance = null;

    private ?array $projectData = null;

    private function __construct()
    {
    }

    public function installPublicProjects()
    {
        $publicProjects = $this->getProjectData()['projects']['public'];

        Stio::showMessage('Installing public repositories...: ', Stio::MESSAGE_TYPE_INFO);

        foreach ($publicProjects as $publicProjectLabel => $project)
        {
            Stio::showMessage(' - ' . $publicProjectLabel . ' (' . $project['name'] . ')');
            if (!file_exists('projects/' . $publicProjectLabel)) {
                exec('git clone ' . $project['repository-http'] . ' projects/' . $publicProjectLabel);
                Stio::showMessage('Installed.', Stio::MESSAGE_TYPE_SUCCESS);
            } else {
                Stio::showMessage('Already installed.', Stio::MESSAGE_TYPE_WARNING);
            }
        }
    }

    /**
     * @return array|null
     */
    public function getProjectData(): ?array
    {
        return $this->projectData;
    }

    /**
     * @param array|null $projectData
     */
    public function setProjectData(?array $projectData): void
    {
        $this->projectData = $projectData;
    }

    /**
     * Singleton implementation
     *
     * @param array $projectData
     * @return ProjectManager
     */
    public static function getInstanceFromProjectData(array $projectData): ProjectManager
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();

            self::$instance->setProjectData($projectData);
        }

        return self::$instance;
    }
}
