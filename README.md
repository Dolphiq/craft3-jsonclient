# Json Client plugin for Craft CMS 3.x

Simple Json client plugin for Craft3 CMS. The plugin provides a simple Twig extension which allows you to fetch a Json url and use the result in your Twig template.

## Requirements
* Craft 3.0 (beta 20)+
* PHP 7.0+

## Using the plugin
1. Install it using composer or the plugin store.
2. You can use it from your template

### Using the plugin in your twig template
        {# Get a random Fact form chucknorris.io #}
        {% set jsonData = fetchJson({
        'url': 'https://api.chucknorris.io/jokes/random'
        }) %}

        <h1>Fact of the day</h1>
        {{ jsonData.value }}

## Installing using composer
1. Go to the project craft folder in the terminal and run

       composer require dolphiq/craft3-jsonclient

2. Install plugin in the Craft Control Panel under Settings > Plugins

### Contributors & Developers
Johan Zandstra - johan@dolphiq.nl
Brought to you by [Dolphiq](https://dolphiq.nl)
