<?php namespace VojtaSvoboda\WebArtisan\Classes;

use Artisan;
use Config;
use VojtaSvoboda\WebArtisan\Models\Settings;

class CommandRunner
{
    /** @var array $allowedCommands List of allowed commands loaded from Config. */
    protected $allowedCommands;

    /** @var Settings $settings */
    protected $settings;

    /**
     * CommandRunner constructor.
     *
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
        $this->allowedCommands = Config::get('vojtasvoboda.webartisan::allowedCommands');
    }

    /**
     * Run command and return true if Ok or string with error.
     *
     * @param string $command
     * @param string $hash
     *
     * @return bool|string
     */
    public function run($command, $hash)
    {
        // check command and hash
        $check = $this->check($command, $hash);
        if ($check !== true) {
            return $check;
        }

        // run command
        Artisan::call($command);

        return true;
    }

    /**
     * Run queued command and return true if Ok or string with error.
     *
     * @param string $command
     * @param string $hash
     *
     * @return bool|string
     */
    public function runQueued($command, $hash)
    {
        // check command and hash
        $check = $this->check($command, $hash);
        if ($check !== true) {
            return $check;
        }

        // run queued command
        Artisan::queue($command);

        return true;
    }

    /**
     * Check command and hash.
     *
     * @param string $command
     * @param string $hash
     *
     * @return bool|string
     */
    private function check($command, $hash)
    {
        // check whitelist
        if (!in_array($command, $this->allowedCommands)) {
            return 'This command is not allowed.';
        }

        // get hash
        $localHash = $this->settings->get('hash');

        // if hash not set
        if (strlen($localHash) < 16) {
            return 'You have to set controll hash at backend settings and it should be at least 16 characters length.';
        }

        // if hash doesn't match
        if ($hash != $localHash) {
            return 'Wrong control hash. Check backend settings.';
        }

        return true;
    }
}
