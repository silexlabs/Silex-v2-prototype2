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

refactoring en cours
- methodes static de Page dans PageModel
- laytou.Panel devrait etre groupable, pour que les boites a outils l utilisent et le menu aussi
- rename component => ui et laisser component.ComponentModel
- rename the component SelectionManager.hx => SelectionView.hx
- rename the component MenuManager.hx => MenuControler.hx
- rename all *Manager => *Model ??
- passer Silex => org.silex et ServerConfig dans org.silex.server
- regrouper *Base => org.silex.core
- supprimer package org

permettre la selection des Layer

le builder qui ouvre une publication devrait se servir des fonctions de Silex.hx?
pareil pour le côté server (remoting)?

mise a jour version Cocktail => typedef audio et video => changer dans SLPLayer Layer

refactoring:
- reunir template et interpreter dans un package ?

permettre d'omettre le # dans les LinkToPage => navigation sans js (ajout .html aux liens?)

* bugs
  * bugfix Lib.document.innerHTML call makes an error 500 on the server https://github.com/silexlabs/Cocktail/issues/217
  * workaround, bug https://github.com/silexlabs/Cocktail/issues/207
  * init the document with non empty body, workaround see  https://github.com/silexlabs/Cocktail/issues/208
  * memory leak in the Layer and transition classes
  * in the List class, listen to the click on the container instead of each cell, to prevent memory leak

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
