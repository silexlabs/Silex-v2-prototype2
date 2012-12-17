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



** to do **

bugs !
* notif : 
  . si on n accepte pas ni refuse => passer en custom notif
  . load la template au démararage?
- editeur texte / enrichissement non pris en compte
- IE and null in styles
- replace getElementsByClassName by Application.getComponents
- display none => how to get it back??
- display inline => 0 width
* delete a container when it is a master or not, and uncheck master when the container is not on any page
* ecouter window.resize, et dispatcher window.resize dans Page::open
* pas de "name" par defaut car tooltip relou
* icon "edit" sur les composants (edit text ou url)
* supprimer la fonction "fermer"?
* ajout road map: 
  . designer friendly => brix components in "insert" menu + select styles for each comp
  . templates comme dans l'éditeur text
* themes tab: rename "styles"
* add "functions" tab



silex v2 functionnal specs

questions/notes
* functions are plugins? what about slextend?

new notions
• themes
• styles and rules
• functions

a theme is a set of styles, assets, functions...
a style is a css file with css classes / rules
a function is a Brix component ([js class] + css styles/skins + html/template) + the component's interface description 

theme
• 1 theme = 1 folder in bin/theme/
• contains styles in bin/themes/*/styles/*.css
• contains assets in bin/themes/*/assets/
• contains functions in bin/themes/*/functions/*.js and *.css and *.html
• all themes installed on the server make 
∘ styles available in the "styles" tab
∘ assets available in the "clipart" tab? in the library?
∘ functions in the insert tab? separate from components because they can be dropped on components and layers, not added to the dom

styles
• 1 style = 1 css file in bin/bin/themes/*/styles/
• each style contains css classes (rules)
• when a style sheet is added to a publication
∘   . adds styles to the css classes of the publication
∘   . may change the default styles (header, nav...)
• the components and containers have a list of css classes in properties and one can add some from the publication's styles
• all css classes listed are named silex-css-rule-*

functions
• 1 function = files *.js and *.css and *.html in bin/themes/*/functions/
• each function can be dropped on certain types of components or containers (like brix comp)
• each function has a set of attributes, editable in the properties tool box when an element having the function is selected
• case of the brix global components: drop it on the stage? simply select it?


example of the XML list function
• drop it on a layer
• select the layer and edit the "Url" property, set a url of an XML file
• select the style of the list (provided with this functionality, e.g. "vertical", "menu", ...)
• in the properties, click "select root node" => it displays the XML and ask you to select the "root node"
• let's assume that the items are like <item><title>my cell title</title><image>http://.../icone.jpg </image></item>
• in the layer, add a text field and an image
• in the text field set the text to "::title::"
• in the image, set URL to ::image::
• save and preview the publication => it repeats the template with all the items, with image and title
