# SEO archive field

To get an overview of the SEO in all the pages there is now an SEO archive field.

## Panel page

I created a page in the panel called `admin` and inside that another page called `seo`.

## Blueprint

In your blueprint, add something like this:

```yml
title: Page
pages: false
files: false
fields:
  seoarchive:
    type: seoarchive
```

## Future

- Exclude pages
- Pagination
- List children or list all pages
- Better description handling