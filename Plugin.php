<?php

namespace VojtaSvoboda\WebArtisan;

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
            'name' => 'vojtasvoboda.webartisan::lang.plugin.name',
            'description' => 'vojtasvoboda.webartisan::lang.plugin.label',
            'author' => 'Vojta Svoboda',
            'icon' => 'icon-forward',
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'category' => 'system::lang.system.categories.system',
                'label' => 'vojtasvoboda.webartisan::lang.settings.label',
                'description' => 'vojtasvoboda.webartisan::lang.settings.description',
                'icon' => 'icon-forward',
                'class' => 'VojtaSvoboda\WebArtisan\Models\Settings',
                'order' => 600,
                'permissions' => [
                    'vojtasvoboda.webartisan.access_settings',
                ],
            ],
        ];
    }

    public function registerPermissions()
    {
        return [
            'vojtasvoboda.webartisan.access_settings' => [
                'tab' => 'vojtasvoboda.webartisan::lang.plugin.name',
                'label' => 'vojtasvoboda.webartisan::lang.permissions.settings'
            ],
        ];
    }
}
