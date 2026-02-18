# KLYORA Demo Import Guide

## Files
- `sample-data/klyora-products.csv` -> WooCommerce demo products
- `sample-data/klyora-demo-content.xml` -> Home page + blog posts

## Import Steps
1. Install and activate: WooCommerce, WordPress Importer plugin.
2. Import products:
- WP Admin -> WooCommerce -> Products -> Import
- Choose `sample-data/klyora-products.csv`
- Keep default field mapping and run import
3. Import content:
- WP Admin -> Tools -> Import -> WordPress
- Upload `sample-data/klyora-demo-content.xml`
- Assign imported posts to your admin user
4. Set homepage template:
- Edit page `Home`
- Template = `KLYORA Luxury Home`
5. Set front page:
- Settings -> Reading
- Homepage displays = `A static page`
- Homepage = `Home`

## Notes
- Product image URLs in CSV are demo placeholders from Unsplash.
- Replace images with your own media after testing.
- Your KLYORA homepage sections will auto-pull WooCommerce products and latest posts.
