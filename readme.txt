** About Silex **

Silex is used to produce websites directly in the browser.

It is free, open-source, seo friendly and can be used to publish multimedia content on the web very quickly.
Ready to use templates, themes and plugins are available for free on Silex Labs Exchange Platform and brought to you by an active community.

With Silex:
  * designers can quickly create the template they need
  * editors can easily update the content
  * developers can add endless functionalities with the plugins API

Links
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


** To do **


tiny-mce.html

fonctionnalité
- selection move
- drag/drop page, layer, comp
- stage avec scroll, Pannel pour stage et boites a outils
- remove page, layer, comp, 
- publication: open, close, save, save as, save a copy, delete
- admin dans ./admin/index.html, export de la publication dans ./ 
  =>  ./admin/index.html est compilée a partir de src/index-builder.html
- ------
- selection resize
- selection rotate
- toolbox media
- editeur texte
- boites a outil
  . ajout preload etc pour les medias : http://www.w3schools.com/html5/tag_audio.asp
  . ajouter des sliders http://www.w3schools.com/html5/tryit.asp?filename=tryhtml5_input_type_range
  . UrlInput, BackgroundInput, ...
  . Border
- publier une publication

design
- dans text, "Line Height" a son text input dans "Case"
- style menu / ribbon
- style des boites a outils
- anims de transition show/hide sur selection, position des layers, des composants...



== tool tips for beginners ==

Put them in the app by default

* to create a new master, insert a container in a page, select it on the stage and check the property "Set as master"

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



-------------------
En cours
-------------------

**refactoring**

mise a jour version Cocktail => typedef audio et video => changer dans SLPLayer Layer
contexts: generalize the toolbox contexts

selection
- ecoute window.resize, et dispatcher window.resize dans Page::open

le builder qui ouvre une publication devrait se servir des fonctions de Silex.hx?
pareil pour le côté server (remoting)?

reunir template et interpreter dans un package ?

permettre d'omettre le # dans les LinkToPage => navigation sans js (ajout .html aux liens?)

* bugs
  * fermeture de page ne tient pas compte des groupes enfants
  * bugfix Lib.document.innerHTML call makes an error 500 on the server https://github.com/silexlabs/Cocktail/issues/217
  * workaround, bug https://github.com/silexlabs/Cocktail/issues/207
  * init the document with non empty body, workaround see  https://github.com/silexlabs/Cocktail/issues/208
  * memory leak in the Layer and transition classes
  * in the List class, listen to the click on the container instead of each cell, to prevent memory leak
  * chrome and color picker : read ok, load bug

improvements
* add the manager, not found etc. to distrib ?
* transitions with params on the Layer as well as on the link
* "loading" transitions for the layers with connectors
* contexts with multiple class names ==== merge the concepts of Context and Page (=> State, State.setState(contextName, stateName))
* rename
  - Page into State
  - Layer into Container
* dans PublicationData, charger tous les .css? ou tout ce qui est dans style/?
* mettre toute la conf dans les headers? Vu que seules les personnes autorisées vont voir la page...
* components
  * transition alpha
* ?no conditional compilation in class Silex (client version)
* 404 error publication
* SLExtend 
  * Init plugins in Silex::new
  * split Silex::new into smaller methods
* opa-like lib
* in Silex.hx, add the style sheet in a style tag directly in the html page
* builder classes should not be in silex.js
