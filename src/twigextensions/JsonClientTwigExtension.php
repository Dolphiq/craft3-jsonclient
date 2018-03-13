<?php

namespace dolphiq\jsonclient\twigextensions;

use Twig_Extension;
use Twig_SimpleFunction;

class JsonClientTwigExtension extends Twig_Extension
{

    static $manifestObject = null;
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'JsonClient';
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('fetchJson', [$this, 'fetchJson'])
        ];
    }

    /**
     * Returns JSON from URL.
     *
     * @param array $options Options, just URL for now.
     *
     * @return string
     */
    public function fetchJson($options = [])
    {
        if (!isset($options['url'])) {
            die('Required url parameter not set!');
        }

        $data = self::getUrl($options['url']);
        return json_decode($data, true);
    }

    /**
     * Function for actually getting data with cURL
     *
     * @param string $url URL to fetch
     *
     * @return mixed
     */
    protected static function getUrl($url)
    {
        $oldErrorLevel = error_reporting(0);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $store = curl_exec($ch);
        curl_close($ch);

        error_reporting($oldErrorLevel);

        return $store;
    }
}
