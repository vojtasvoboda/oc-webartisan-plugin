<?php

/**
 * Web artisan routes. Examples:
 *
 * - /artisan/v1/cache/clear/abcdef
 * - /artisan/v1/schedule/run/abcdef
 * - /artisan/v1/queued/october/update/abcdef
 *
 * @namespace artisan/v1
 * @version 1
 */
Route::group([ 'prefix' => 'artisan/v1' ], function ()
{
    /**
     * Run queued commend.
     *
     * @url queued/{group}/{command}/{hash}
     *
     * @method GET
     */
    Route::get('queued/{group}/{command}/{hash}', function($group, $command, $hash)
    {
        /** @var \VojtaSvoboda\WebArtisan\Classes\CommandRunner $runner */
        $runner = App::make(\VojtaSvoboda\WebArtisan\Classes\CommandRunner::class);
        $result = $runner->runQueued($group . ':' . $command, $hash);
        if ($result !== true) {
            exit($result);
        }
    });

    /**
     * Run commend.
     *
     * @url {group}/{command}/{hash}
     *
     * @method GET
     */
    Route::get('{group}/{command}/{hash}', function($group, $command, $hash)
    {
        /** @var \VojtaSvoboda\WebArtisan\Classes\CommandRunner $runner */
        $runner = App::make(\VojtaSvoboda\WebArtisan\Classes\CommandRunner::class);
        $result = $runner->run($group . ':' . $command, $hash);
        if ($result !== true) {
            exit($result);
        }
    });
});
