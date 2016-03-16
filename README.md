# Kirby SEO

A serp preview field for the panel.

![](https://raw.githubusercontent.com/jenstornell/kirby-seo/master/preview.gif)

## What is SEO?

It stands for Search Engine Optimization. Make yourself visible in the search engines.

## Installation

1. Place the `fields/seo` folder in `site/fields`. The field for the panel.
1. Place the `plugins/seo` folder in `site/plugins`. The helper functions for your site.

## Blueprint

```yaml
fields:
  seo:
    type: seo
```

You can add a label on it if you like, but you don't need to.

## Call in template / snippet / pattern

**In my `header.php` I do like this:**

```php
<?php
echo $page->seo()->seoTitle('html');
echo $page->seo()->seoDescription('html');
?>
```

**If you want full control over the HTML, don't add `html` as parameter, like this:**

```html
<title><?php echo $page->seo()->seoTitle(); ?></title>
<?php if( $page->seo()->hasSeoDescription() ) : ?>
    <meta name="description" content="<?php echo $page->seo()->seoDescription(); ?>">
<?php endif; ?>
```

## Prefix

You can append a prefix to the title as well. It's good for placing the company name last in the title.

```php
c::set('seo.prefix', ' - Some prefix');
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