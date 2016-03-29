# Kirby SEO

## Version 0.3

A serp preview field for the panel.

![](https://raw.githubusercontent.com/jenstornell/kirby-seo/master/preview2.gif)

The black thing in the recording is not a bug. It's a click to get the slug edit modal. It just did not fit in the screen.

## What is SEO?

It stands for Search Engine Optimization. Make yourself visible in the search engines.

## Installation

1. Place the `fields/seo` folder in `site/fields`. The field for the panel.
1. Place the `plugins/seo` folder in `site/plugins`. The helper functions for your site.

## Blueprint

It's important that the key of the field is `seo` and nothing else. In the future there will be an option for it.

```yaml
fields:
  seo:
    type: seo
```

You can add a label on it if you like, but you don't need to.

### Global field definitions

To not repeat yourself in every blueprint I highly recommend to use [Global Field Definitions](https://getkirby.com/docs/panel/blueprints/global-field-definitions).

**Add this file:** `/site/blueprints/fields/seo.yml`

In that file, add this:

```yaml
type: seo
```

Call it from the blueprint like this:

```yaml
fields:
  seo: seo
```

## Call in template / snippet / pattern

**In my `header.php` I do like this:**

When using this example it will output the HTML as well.

```html
<?php seo('title'); ?>
<?php seo('description'); ?>
```

Output:

```html
<title>Some title</title>
<meta name="description" content="Some description">
```

When using this example it will return the value.

Because you return it and therefor want to control it, it does not wrap it in HTML. If you want HTML, warp it yourself or create a snippet / pattern for it.

```html
<?php echo seo('title', array(), true); ?>
<?php echo seo('description', array(), true); ?>
```

Output:

```html
Some title Some description
```

## Additional info

- The preview has the look of Google serp.
- The seo title and the meta description will only be cut in the preview, not on the site.
- Newlines are stripped from the textarea and replaced with space.
- If the seo title tag is missing, it will use the `title` field value instead.
- If the meta description is missing, it will not output anything.
- Title tag is cut, not my character, but by width, just like Google.
- Meta description in the preview is cut after 155 characters.
- You can click on the seo title, meta description and the seo url in the panel to edit them.