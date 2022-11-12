# Twig Request Params Manager
This bundle provide twig functions that you can use in your twig template to add, remove, or get a request queries. 


## Installation 

    composer require daday-andry/rmptwigbundle

## Usage 
Let imagine that we are on https://mysite.com

## Append query to the current route
>You can use "appendRouteParam" function to add new query or edit value in your current url
**appendRouteParam($param, $value)**
Eg: `{% set _url = appendRouteParam('foo', 'bar') %}`
expect value :https://mysite.com?foo=bar

## Get param
**getRouteParam($param, $defautlValue = ' ' )**
Eg : `{% set foo = appendRouteParam('foo') %}`


## Remove query 
**removeRouteParam($param)**
Eg: `{% set _url = appendRouteParam('foo') %}`
expect value :https://mysite.com

