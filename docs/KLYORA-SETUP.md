# KLYORA Theme Setup

## 1) Activate Theme
1. Install `perukar` as parent theme.
2. Optional: install `perukar-child` and activate child theme for update-safe overrides.

## 2) Homepage
1. Create a page named `Home`.
2. Set template to `KLYORA Luxury Home`.
3. Set as static front page in `Settings > Reading`.

## 3) Customizer
Go to `Appearance > Customize > KLYORA Theme Settings`.

- Global Styles: color scheme, typography scale, layout density, animation intensity.
- Header & Announcement: header style, announcement visibility, promo text, countdown label.
- Homepage Content: hero title/subtitle/CTA labels.
- Footer: footer style and newsletter headline.

## 4) WooCommerce
1. Install/activate WooCommerce.
2. Create shop/cart/checkout/account pages.
3. Add products with featured images (4:5 ratio recommended).
4. Gift support is built into product add-to-cart form:
- `This is a gift`
- Gift message (up to 200 chars)

## 5) Rewards Foundation
- Product page shows earnable points: `price = points` baseline.
- Integrate a dedicated loyalty plugin for tier logic (Silver/Gold/Platinum).

## 6) Elementor
- Use Elementor for additional landing pages while preserving global KLYORA header/footer styles.

## 7) Recommended Plugins
- WooCommerce
- Elementor + Elementor Pro
- YITH WooCommerce Wishlist
- Variation Swatches (if color variants required)
- Loyalty plugin (e.g., WooCommerce Points and Rewards)

## 8) Performance Checklist
- Enable page caching (WP Rocket or equivalent)
- Compress images to WebP
- Enable lazy loading and critical CSS
- Test with Lighthouse mobile target
