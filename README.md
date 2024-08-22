# Json Client plugin for Craft CMS 3.1.x

## Currently the project is DISCONTINUED. However, feel free to fork it and continue its development!

Simple Json client plugin for Craft3 CMS. The plugin provides a simple Twig extension which allows you to fetch a Json url and use the result in your Twig template.

## Requirements
* Craft 3.1+
* PHP 7.0+

## Using the plugin
1. Install it using composer or the plugin store.
2. Do composer.json updates - see "Installing using composer"
3. You can use it from your template

### Using the plugin in your twig template
        {# Get a random Fact form chucknorris.io #}
        {% set jsonData = fetchJson({
          'url': 'https://api.chucknorris.io/jokes/random'
        }) %}

        {% if (jsonData) %}
          <h1>Fact of the day</h1>
          {{ jsonData.value }}
        {% endif %}


## Installing using composer
1. Go to the project craft folder in the terminal and run

       composer require dolphiq/jsonclient

2. Install plugin in the Craft Control Panel under Settings > Plugins

## Roadmap
- Create filters for xss scripts
- Create more helper functions to parse the Json
- Support multiple methods not only get
- Provide a way to add the parameters separated from the uri

### Contributors & Developers
- Johan Zandstra - johan@dolphiq.nl
- Knut Erik Berg-Hansen
- Mike Pierce

Brought to you by [Dolphiq](https://dolphiq.nl)
