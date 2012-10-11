** About Silex **

Silex is used to produce websites directly in the browser.

It is free, open-source, seo friendly and can be used to publish multimedia content on the web very quickly.
Ready to use templates, themes and plugins are available for free on Silex Labs Exchange Platform and brought to you by an active community.

With Silex:
  * designers can quickly create the template they need
  * editors can easily update the content
  * developers can add endless functionalities with the plugins API

Links
  * roadmap https://github.com/silexlabs/Silex-v2.x/wiki/roadmap
  * Wikipedia http://en.wikipedia.org/wiki/Silex_Flash_CMS
  * Website: http://projects.silexlabs.org/?/silex/
  * Community: http://www.silexlabs.org/groups/silex/hierarchy/
  * Source code: https://silex.svn.sourceforge.net/svnroot/silex/trunk
  * License: http://www.gnu.org/licenses/gpl.html
  * Developer Guide: http://www.silexlabs.org/silex/docs-silex/codex-silex/
  * Bug report: http://sourceforge.net/tracker/?group_id=192954&atid=943477

** License **

This file is part of Silex - see http://projects.silexlabs.org/?/silex

Silex is © 2009-2013 Silex Labs and is released under the GPL License:

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License (GPL) as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. 

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

To read the license please visit http://www.gnu.org/copyleft/gpl.html

** known bugs **

  * chrome and color picker : read ok, load bug
  * delete a container when it is a master or not, and uncheck master when the container is not on any page
  * ecouter window.resize, et dispatcher window.resize dans Page::open
  * autoriser display block?
  * ergo : disable les pixel+unit quand on a select un shorthand (exple background h pos)



Bugs
* publication with scroll bug
* pas d apply quand on tape du texte

* pas possible d effacer les conteneurs de base
* cration de publication = prend le contenu "empty-template" et le css de "bin/themes/default.css"
* dans PublicationCategory, remplacer theme par template


== edition of properties ==

the toolboxes / dialogs

* go to the menu "file" and then "properties" to open the publication properties
* select a page to edit its properties in the properties tool box
* select a layer to edit its properties in the properties tool box
* select a component to edit its properties in the properties tool box

properties of the a publication

* vertical and horizontal align, optional size
* meta tags: description, content-type, distribution (target platform), keywords, refresh (redirect), robots, author, revised
* html head elements: title, base, link (rss etc.), script (text/ecmascript cf http://www.w3schools.com/tags/att_script_type.asp )

properties of the pages 

* title, name/deeplink
* initialPage (true/false)
* order (index in the page list) - 2D order for wire-like publications??

properties of the layers 

* name
* type (container or master)
* styles (all css styles)
* contexts

properties of the components

* name/title?, description?
* actions
  * next/prev page
  * internal link (linkToPage, linkToPopup, closePopup)
  * external link
* properties function of the component type
  * URL
  * preload and auto start
  * loop
* styles (all css styles)
* contexts

== edition of styles ==

for component

* select a conponent by clicking on it
* change its style in the properties toolbox

for layers

* select a layer by double clicking on it
* change its style in the properties toolbox

edit the flow in the flow toolbox
* change the flow of the components and layers
* move components accross layers

styles for a layer
* display, position, float, borders, background, margin...

styles for a component
* display, position, float, borders, background, margin...


================================================================================
discuté avec thomas le 04/10/2012
- listes, templates et données en xml
  > mettre en attente et thomas le fait
  > doit pouvoir etre fait a la compil, probleme de la RFE
- drag / drop et reverse des templates
  > marche, à tester par lex
  > add/suppr elements ne fonctionne pas
- drag drop avec "proxy"
  > pas tout de suite, a discuter plus tard ensemble
- brix et flex jusqu ou?
  > on devrait faire les comp flex
  > data binding? a faire bientot
- mvc? 
  > thomas est pour les packages mvc

SEO and brix
- php with deeplink in get
- php open html page, interprete with brix (and cocktail)
- echo of interpreted dom (innerHTML)
- js is loaded
- replace the body with the raw html of the page (get it from a web service or php can put it in a meta tag in <head>)
- opens the page corresonding to the deeplink
