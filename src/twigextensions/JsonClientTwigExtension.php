<?php

namespace dolphiq\jsonclient\twigextensions;

use Twig_Extension;
use Twig_SimpleFunction;
use Craft;

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
     * @param array $parameters Parameters, just URL for now.
     *
     * @return string
     */
    public function fetchJson($parameters = [])
    {
        if (!isset($parameters['url'])) {
            Craft::error('URL parameter not set', __METHOD__);
            return false;
        }

        $data = self::getUrl($parameters['url']);
        return json_decode($data, true);
    }

    /**
     * Function for actually getting data with cURL
     * Improvements:
     * - Use Guzzle?
     * - Check mimetype?
     *
     * @param string $url URL to fetch
     *
     * @return mixed
     */
    protected static function getUrl($url)
    {
        Craft::debug('Fetching JSON from: '.$url, __METHOD__);

        $ch = curl_init();
        curl_setopt_array(
            $ch,
            [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 5,
                CURLOPT_CONNECTTIMEOUT => 5,
            ]
        );
        $data = curl_exec($ch);

        $errorNumber = curl_errno($ch);
        $errorMessage = curl_error($ch);
        curl_close($ch);

        if ($errorNumber > 0) {
            Craft::warning('cURL got an error: '.$errorNumber.', '.$errorMessage, __METHOD__);
            return false;
        }

        return $data;
    }
}
