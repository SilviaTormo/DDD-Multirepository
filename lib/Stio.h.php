<?php

namespace lib;

/**
 * Class Stio
 * @package lib
 *
 * Standard Input/Output operations
 */
class Stio
{
    /**
     * Constants for showing messages
     */
    const MESSAGE_TYPE_INFO = 1;
    const MESSAGE_TYPE_WARNING = 2;
    const MESSAGE_TYPE_ERROR = 3;
    const MESSAGE_TYPE_SUCCESS = 4;

    const PATH_PROJECTS = 'data/projects.json';

    private static ?Stio $instance = null;
    private ?array $data = null;

    private function __construct()
    {
    }

    /**
     *
     * To show messages on cli
     *
     * @param string $message
     * @param int $type
     */
    public static function showMessage(string $message, int $type = 1): void
    {
        /**
         * Switch is here due iy depends on type it could change format on future features
         */
        switch ($type) {
            case 1:
                /**
                 * INFO
                 */
                $currentDateFormatted = (new \DateTime())->format('Y-m-d H:i:s');
                echo "\033[36m[{$currentDateFormatted}] [SOLIDJOBS] {$message} \033[0m\n";
                break;
            case 2:
                /**
                 * WARNING
                 */
                $currentDateFormatted = (new \DateTime())->format('Y-m-d H:i:s');
                echo "\033[33m[{$currentDateFormatted}] [SOLIDJOBS] {$message} \033[0m\n";
                break;
            case 3:
                /**
                 * ERROR
                 */
                $currentDateFormatted = (new \DateTime())->format('Y-m-d H:i:s');
                echo "\033[31m[{$currentDateFormatted}] [SOLIDJOBS] {$message} \033[0m\n";
                break;
            case 4:
                /**
                 * SUCCESS
                 */
                $currentDateFormatted = (new \DateTime())->format('Y-m-d H:i:s');
                echo "\033[32m[{$currentDateFormatted}] [SOLIDJOBS] {$message} \033[0m\n";
                break;
            default:
                $currentDateFormatted = (new \DateTime())->format('Y-m-d H:i:s');
                echo "[{$currentDateFormatted}] [SOLIDJOBS] {$message}\n";
        }
    }

    /**
     *
     * To get keyboard input from cli user
     *
     * @param string|null $message
     * @param int $type
     * @return false|string
     */
    public static function getKeyboardInputStream(?string $message = null, int $type = 1): ?string
    {
        echo "{$message} ";
        return fgets(STDIN);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        if (is_null($this->data)) {
            $this->loadData();
        }

        return $this->data;
    }

    /**
     *
     */
    private function loadData(): void
    {
        if (!file_exists(self::PATH_PROJECTS)) die("Configuration file " . self::PATH_PROJECTS . " does not exists");

        $this->data = json_decode(file_get_contents('data/projects.json'), JSON_OBJECT_AS_ARRAY);
    }

    /**
     * Singleton implementation
     *
     * @return static
     */
    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
