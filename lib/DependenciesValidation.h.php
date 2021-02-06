<?php


namespace lib;

use lib\Stio;

/**
 * Class DependenciesValidation
 * @package lib
 */
class DependenciesValidation
{
    const VERSION_PHP = '7.4';

    /**
     * Check all dependencies on bulk
     */
    public static function checkAll(): void
    {
        $ok = self::checkPHPVersion();
        $ok &= self::checkGitVersion();

        if ($ok) {
            Stio::showMessage('OK Dependencies', Stio::MESSAGE_TYPE_SUCCESS);
        } else {
            Stio::showMessage('KO Dependencies, do you want to continue? Highly not recommended.', Stio::MESSAGE_TYPE_ERROR);
            $input = strtolower(Stio::getKeyboardInputStream('(y/N)'));
            if ($input != 'y') die("Closed cli assistant. Please, install/update your dependencies.\n");
        }
    }

    /**
     * Check php version is OK
     *
     * @return bool
     */
    private static function checkPHPVersion(): bool
    {
        $ok = version_compare(phpversion(), '7.4', '>=');

        if ($ok) {
            Stio::showMessage('PHP Version OK');
        } else {
            Stio::showMessage('Current PHP version: ' . phpversion());
            Stio::showMessage('PHP Version needs to be >= ' . self::VERSION_PHP, Stio::MESSAGE_TYPE_WARNING);
        }

        return $ok;
    }

    /**
     * Check git is installed
     *
     * @return bool
     */
    public static function checkGitVersion(): bool
    {
        $gitFullVersion = exec('git --version');
        $git = explode(' ', $gitFullVersion)[0];
        $ok = $git === 'git';

        if ($ok) {
            Stio::showMessage('Git OK');
        } else {
            Stio::showMessage(
                'Not found git on cli. Is it installed or do you need to add to path environment?',
                Stio::MESSAGE_TYPE_WARNING
            );
        }

        return $ok;
    }
}
