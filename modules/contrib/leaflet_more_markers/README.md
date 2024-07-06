# Leaflet More Markers

Most sites use a single marker style for each and every marker on each and
every map. This can get a little boring. Using the same plain marker for all
content, doesn't convey much of interest to the viewer, except for the
location.
This module spruces up your Leaflet maps with a variety of markers that are
eye-catching and say something relevant about the location they represent.
Each piece of content (entity instance) can have its own unique font icon or
emoji marker. If not provided, the marker automatically falls back to the
default blue map pin.

You can specify special marker attributes such as size, whether to put a circle
around the icon and for a bit of fun also some "special effects", like rocking
motions, jumps and somersaults.

To make things easy, the module automatically applies the correct marker size
dependent offsets to align pixel coordinates with latitudes and longitudes on
the map. Thus your icons always appear in the exact right spot, no matter the
zoom level the visitor is on.

All of this works for markers on individual content pages as well as on maps
in Views (via the Leaflet Views module, which is part of Leaflet).

See this article to learn more:
https://rikdeboer.medium.com/leaflet-maps-marker-power-in-drupal-9aa10ac9848

###Installation
Download the *Leaflet More Markers* module
[using Composer to manage Drupal site dependencies](https://www.drupal.org/docs/develop/using-composer/using-composer-to-manage-drupal-site-dependencies),
You can do this by running the following command from your project
package root (where the composer.json file lives):

    composer require drupal/leaflet_more_markers

This will also download the required dependencies, being the Leaflet
and Geofield modules and the GeoPHP library, as well as the Token module.
Now you can enable the Leaflet More Markers module. Use Drush if you wish.

###Configuration
1. The module will make a new field type available, named *Map marker*.
Visit *Administration -> Structure -> Content Types -> CONTENT TYPE ->
Manage Fields*. Use the drop-down to add the General *Map marker* field to the
content type. The content type must already have a Geofield. This will
typically be called something like "Location" or "Coordinates". Without a
sibling Geofield, this module does nothing for you.
You can call the *Map marker* field whatever you like, but for now stick with
Map Marker and a machine name of *field_map_marker*. Follow the prompts,
select "Limited to 1". On the next page you may enter a default value, for
the emoji and/or marker attributes. You could enter "medium" for instance.
Press *Save settings*.

2. Staying on the same page, flick to the *Manage Form Display* tab and drag
the Map Marker field into position. Just below your Geofield is nice.
Press Save.

3. Press the *Manage display* tab. The Geofield must have its widget
set to "Leaflet Map". Click the cog wheel on the far right of the row that has
"Leaflet Map" as its widget. Scroll down the page to the *Map icon* panel.
For the Icon select *Field (Html DivIcon)*. In the *Html* text area enter this
(keep double quotes, no outer quotes):

  `<div class="lmm-icon [node:field_map_marker:classes]">[node:field_map_marker:icon]</div>`

Note1: you can do this for other entities too; in addition to creating
*field_map_marker* fields on node, you can can use the same field on users,
taxonomy terms, paragraphs etc -- any entity. Simply adjust the above syntax
accordingly, e.g.

  `<div class="lmm-icon [user:field_map_marker:classes]">[user:field_map_marker:icon]</div>`

Note2: you may add a style attribute too, e.g. when using font icons you could
set the color for all font icons by adding to the `div`:

  `style="color:purple"`

Or better still, if you add a plain textfield to your content or entity type,
with a machine name of, say, *field_map_marker_color*, then you can enter a
different color for each location's font icon with

  `style="color:[node:field_map_marker_color];"`

Note: the color attribute does not affect emojis.

Feel free to fill out the remaining fields as you see fit. The above HTML is
the only configuration relevant to the Map Marker.
Press *Update* and *Save*.

4. Finally, back on the *Manage Display* tab, drag the Map Marker field down
into the Disabled section at the bottom. Its value is used on the map, it
doesn't need to be displayed as text as well. Press *Save*.

### Specifying the desired marker icon

#### Emoji and plain characters
Create or edit a piece of content of the type that you've just added the
Map Marker field too. Go to *Administration -> Content -> Add content* and
clich the relevant content type name to arrive at the Edit page.
When you click the "Pick emoji" button an easy emoji picker pops up for you
to select an icon that suits the location.

Or you can simpy type a letter, like 'X', to mark the spot.

#### Font icons
To use a font icon, you leave the emoji field empty.
Instead, in the *Marker attributes* field, enter the code belonging to the
font icon you like, as published on the documentation pages of that font.
The module currently supports out of the box:
Bootstrap Icons, https://icons.getbootstrap.com
Font Awesome icons, https://fontawesome.com/icons?m=free
Line Awesome icons, https://icons8.com/line-awesome#Maps

Bootstrap icon codes start with "bi bi-", e.g. **bi bi-shop**
Free Font Awesome icon codes start with, "fas fa-". Example: **fas fa-bed**
Line Awesome icon codes start with "la la-", e.g. **la la-helicopter**

You don't have to configure the font icon library used, because the module
recognises and loads the correct library based on these prefixes.
If a library isn't required for the page that the icon is on, for instance
because you are using an emoji, which doesn't require any additional files,
then the library will not be loaded.

In the same *Marker attributes* field you can specify additional parameters
that apply to emojis, plain characters and font icons alike.
These affect the size ("small", "medium", "large") of the icon and whether it
should be displayed with a circle around it ("circle-black", "circle-red",
"circle-white").
You can also lower the baseline a little with the "center" parameter. The
default baseline, "ground", is generally good for emojis that have an
implied ground level, like a person running, a building etc. However. if your
icon is a smiley or simply an X to mark the spot, then "center" may be more
appropriate.

###Views
Make sure that the *Leaflet Views* submodule is enabled at *Administration ->
Extend*.

Create a View a per normal or modify an existing View.
The View must have a Geofield amongst its Fields.

With the View Format set to "Leaflet Maps", click "Settings" next to it.

Scroll down the panel, select *Field (Html DivIcon)* and enter into the
Html field, the same as what you entered for the content type:

`<div class="lmm-icon [node:field_map_marker:classes]">[node:field_map_marker:icon]</div>`

Note: for its popup to rise when a marker is clicked, make sure to select a
value for the *Description* drop-down.


#####Author
* [Rik de Boer, Melbourne 2021](https://www.drupal.org/u/RdeBoer)

#####Emoji picker acknowledgement
The Emoji picker used is from https://www.cssscript.com/fg-emoji-picker.
It consists of a .min.js file, which is placed under this module's /js folder
and a .json file, which contains all the emoji data.
It's probably a good idea to occasionally check you have the latest version of
this file in .../leaflet_more_markers/data/full-emoji-list.json.
It can be downloaded here:
https://github.com/woody180/vanilla-javascript-emoji-picker

The fgEmojiPicker.js file can then be minimised using this command:
curl -X POST -s --data-urlencode 'input@fgEmojiPicker.js' https://javascript-minifier.com/raw > fgEmojiPicker.min.js
