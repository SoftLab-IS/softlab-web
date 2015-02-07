<?php

namespace ComposerScripts;

use Composer\Script\Event;

class Env {
    public static function preInstallAssets(Event $event)
    {
        exec('composer global require "fxp/composer-asset-plugin:1.0.0-beta4"');
    }


    public static function initEnv(Event $event)
    {
        $isDevEnv = false;
        foreach ($_SERVER['argv'] as $arg) {
            if ($arg == '--dev') {
                $isDevEnv = true;
            }
        }

        if ($isDevEnv) {
            require dirname(__FILE__) . '/../../init-dev';
        } else {
            require dirname(__FILE__) . '/../../init-prod';
        }
    }    

    public static function doMigrations(Event $event)
    {
       $_SERVER['argv'] = array(
            'yii',
            'migrate',
       );
       
       require dirname(__FILE__) . '/../../yii';
    }
}