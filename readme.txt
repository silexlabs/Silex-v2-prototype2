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

** to integrate in roadmap **

* use css patterns ?? http://www.google.fr/search?hl=en&redir_esc=&client=ms-android-samsung&source=android-browser-type&v=133247963&qsubts=1352845988673&action=devloc&q=css+patterns&v=133247963
* make a native desktop app http://appjs.org/ 
* help buttons on all editors

discours
- http://www.applicationcraft.com/
  . BROWSER BASED or DESKTOP
  . BUILD PROTOTYPES, FRONT-ENDS & FULL-BLOWN APPS
  . WEB APPS TO MOBILE APP STORES?
  . EVERYTHING IS HTML5, CSS AND JAVASCRIPT
  . YOU’D BE CRAZY TO GO NATIVE!
  . php or nodejs
  . html5 and flash


** to do **


remarques pol
- keyboard shortcuts
- editeur texte / enrichissement non pris en compte
- "add a loading page" button
> des assets se déplacent d’un container à l’autre.


bugs !
- z-index should not be %
- absolute => at the end of the DOM 
- tab => browse all layers and comp
- IE and null in styles
- chrome and 
- absolute => out of container, no more clickable
- save a copy bug
- bug backgroundPosition: should concat the X and Y values instead of selecting one of the 2
* chrome and color picker : read ok, load bug
- visual effects, cursor, not pluged with the library

toolbox still missing :
* lock a layer or component from edit
* tous les styles dans la boite a outil styles
  + descriptions / aide
  + groups and "apply to group" (e.g. for border-left border-rigth border-top and border- bottom)

- styles hover et active => data-style-* - http://www.w3schools.com/css/css_pseudo_classes.asp
  . selector in each accordion tab => set style to data-*
  . save in data-* instead of style only
  . init all at start
  . listen over and out on body => set style to data-*
  . check for active when open / close page
  . save as style => .xxxx{} .xxxx:hover{} .xxxx:active{} 
* history : back button of air android
* selection drop zone : priorité aux petites zones 
* les layers/comp en absolute doivent etre selectionnables => faire en sorte que le getBestDropZone parcurs toutes les zones? prendre la + petite?
* styles/themes
* mettre a jour les tests unitaires cote serveur
* delete a container when it is a master or not, and uncheck master when the container is not on any page
* ecouter window.resize, et dispatcher window.resize dans Page::open
* new from template
