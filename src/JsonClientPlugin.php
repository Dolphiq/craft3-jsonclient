<?php

/**
 * Craft jsonclient plugin
 *
 * @author    dolphiq
 * @copyright Copyright (c) 2017 dolphiq
 * @link      https://dolphiq.nl/
 */

namespace dolphiq\jsonclient;

use Craft;
use craft\base\Plugin;
use dolphiq\jsonclient\twigextensions\JsonClientTwigExtension;

class JsonClientPlugin extends \craft\base\Plugin
{
    public static $plugin;

    public $hasCpSettings = false;

    // table schema version
    public $schemaVersion = '1.0.0';

    public function init()
    {
        parent::init();

        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new JsonClientTwigExtension());

        Craft::info('dolphiq/jsonclient plugin loaded', __METHOD__);
    }
}
