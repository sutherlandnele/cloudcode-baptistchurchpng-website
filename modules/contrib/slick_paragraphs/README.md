# INTRODUCTION

Provides integration between Slick [1] and Paragraphs [2].
Slick Paragraphs allows richer slideshow/ carousel contents with a mix of text,
image and video, and more complex slide components like nested sliders, or any
relevant field type as slide components and probably with a few extra fields
before and or after the slideshow with the goodness of Paragraphs.
It is also possible to make individual bundle as a slide.

This provides a Slick Paragraphs formatter for the Paragraphs type.


## REQUIREMENTS
1. [Slick 3.x](https://drupal.org/project/slick)
2. [Paragraphs](https://drupal.org/project/paragraphs)


## INSTALLATION
Install the module as usual, more info can be found on:
https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules

Enable Slick Paragraphs module under **Slick** package:

**/admin/modules#edit-modules-slick**


## VERSIONS
+ Slick Paragraphs 3.x requires Slick:3.x.
+ Slick Paragraphs 2.x has no relation to Slick Media module as Slick Media is
  now being deprecated for a plugin of the main Slick module.
+ Slick Paragraphs 1.x has recommendations for Slick Media and VEM.

For new installs, use 3.x.
For old installs, please follow the migration path at Slick Media module to use
the main Slick Media plugin instead so you can install 2.x or 3.x+.


## USAGE / CONFIGURATION
There are two formatters:

1. **Slick Paragraphs Vanilla**, to render each slide (paragraph bundle) as is,
   to have different composition of fields per slide. Use Field Group, Display
   Suite, Bootstrap Layouts, etc. to get different layouts at ease.
   This formatter is available at both top-level and child paragraphs types.
   Requires Blazy.
2. **Slick Paragraphs Media**, to have customized slide with advanced features.
   This formatter is only available at second level paragraphs type.


### USAGE INSTRUCTIONS
The following instruction applies to [2], while [1] acts like any regular
formatter.

The final sample structure will be like:

  **Node > Paragraphs > Slideshow > Slide**

  * **Node** can be any public facing entity like User, ECK, etc.
  * **Paragraphs** is a field type paragraphs inside Node.
  * **Slideshow**, along with other paragraphs, containing a field type
    paragraph
  * **Slides** is the host paragraph bundle for child paragraph bundle **Slide**
    which contains non-paragraph fields.

  Unless you need more themeing control, **Default** view mode suffices for all.
  All the steps here can be reversed when you get the big picture.

  This should help clarify any step below:
  Adding a paragraphs type/bundle is like adding a content type.
  Adding a field type paragraph is like adding any other field.

Visit any of the given URLs, and or adjust accordingly.

* **/admin/structure/paragraphs_type/add**
  + Add a new Paragraphs bundle to hold slide components, e.g.: **Slide**.
  + Alternatively skip and re-use existing paragraph bundles, and make note of
    the paragraph machine name to replace **slide** for the following steps.

* **/admin/structure/paragraphs_type/slide/fields**
  + Add or re-use fields for the **Slide** components, e.g.:
    Image/Video/Media, Title, Caption, Link, Color, Layout list, etc.

  + You are going to have a multi-value field **Slides**, so it is reasonable
    to have single-value fields for any of the non-paragraph fields here,
    except probably field links.

  + Alternatively, just render a multi-value text, image or media entity here
    as a Slick carousel to make them as nested or independent slicks later.

  + Manage individual field display later when done:
    + **/admin/structure/paragraphs_type/slide/display**
    + Be sure to make expected fields visible here.

* **/admin/structure/paragraphs_type/add**
  + Add a new Paragraphs bundle to host the created **Slide**, e.g.: Slideshow

* **/admin/structure/paragraphs_type/slideshow/fields/add-field**
  + Add a new field Paragraph type named **Slides** (Entity reference
    revisions), and select the previously created **Slide**, excluding other
    paragraph bundles to avoid complication. Choose Unlimited so to have
    multiple slides.

* **/admin/structure/paragraphs_type/slideshow/display**
  + Select **Slick Paragraphs** for the **Slides** field under **Format**, and
    click the **Configure** icon.
  + Adjust Slick formatter options accordingly, including your optionset.

* **/admin/structure/types**, or
  **/admin/config/people/accounts/fields**, or
  any fieldable entity.
  + Select **Manage fields** for the target bundle.
  + If you already have Paragraphs, simply edit and select **Slideshow** to
    include it along with other Paragraphs bundles.
  + If none, add or re-use **Paragraph** field under **Reference revisions**.
  + Be sure to at least choose **Slideshow** under **Paragraph types**,
    excluding **Slide** bundle which is already embedded inside **Slideshow**
    bundle.

* Add a content with a Slideshow paragraph, and see Slick Carousel there.

The more complex is your slide, the more options are available.


## OPTIONSET
To create your optionsets, go to:

**/admin/config/media/slick**


## SLIDE LAYOUT
The slide layout option depends on at least a skin selected. No skin, just DIY.
A Paragraphs is fieldable entity so you can add custom field to hold layout
options. While core image field supports several caption placements/ layout that
affect the entire slides, the fieldable entity may have unique layout per slide
using a dedicated **List (text)** type with the following supported/pre-defined
keys:
top, right, bottom, left, center, below, e.g:

Option #1
---------
```
bottom|Caption bottom
top|Caption top
right|Caption right
left|Caption left
center|Caption center
center-top|Caption center top
below|Caption below the slide
```

Option #2
---------

If you have complex slide layout via Paragraphs with overlay video or images
within slide captions, also supported:
```
stage-right|Caption left, stage right
stage-left|Caption right, stage left
```

Option #3
---------

If you choose skin Split, additional layout options supported:
```
split-right|Caption left, stage right, split half
split-left|Caption right, stage left, split half
```

Split means image and caption are displayed side by side.

Specific to split layout, be sure to get consistent options (left and right)
per slide, and also choose optionset with skin Split to have a context per
slideshow. Otherwise layout per slideshow will be screwed up.

Except the **Caption below the slide** option, all is absolutely positioned aka
overlayed on top of the main slide image/ background for larger monitor.
Those layouts are ideally applied to large displays, not multiple small slides,
nor small carousels, except **Caption below the slide** which is reasonable with
small slides.


Option #4
---------

Merge all options as needed.


## TROUBLESHOOTING
Be sure to first update Blazy and Slick Media prior to this module update.

## KNOWN ISSUES
* The module only works from within Field UI Manage display under Formatter, not
  Views UI. The issue is Views UI doesn't seem to respect
  SlickParagraphsFormatter::isApplicable(), or there may need additional method.
  Till proper fix, please ignore **Slick Paragraphs** formatter within Views UI.


## AUTHOR/MAINTAINER/CREDITS
* [Gaus Surahman](https://drupal.org/user/159062)
* [Contributors](https://www.drupal.org/node/2791135/committers)


## READ MORE
See the project page on drupal.org:

[Slick Paragraphs](https://drupal.org/project/slick_paragraphs)
