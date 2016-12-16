<?php namespace VojtaSvoboda\WebArtisan;

use Backend;
use System\Classes\PluginBase;

/**
 * Artisan Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Web Artisan',
            'description' => 'Runs artisan commands by URL, curl or wget',
            'author' => 'Vojta Svoboda',
            'icon' => 'icon-forward',
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'category' => 'system::lang.system.categories.system',
                'label' => 'Web Artisan',
                'description' => 'Runs artisan commands by URL, curl or wget',
                'icon' => 'icon-forward',
                'class' => 'VojtaSvoboda\WebArtisan\Models\Settings',
                'order' => 600,
            ],
        ];
    }
}
