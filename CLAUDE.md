# Versteegen Tuinen — WordPress-thema

## Project Context
- **Thema**: Versteegen Tuinen (map `versteegentuinen`)
- **Stack**: WordPress + ACF Pro, legacy Bootstrap 4/jQuery-stack + Tailwind (zonder preflight) voor nieuw werk
- **Author**: Kay Jilesen
- **Text domain**: `kj`
- **Function prefix**: `kj_`

## Uitgangspunten
- Het uiterlijk komt uit `assets/legacy/` (Bootstrap 4, `css/main.css` van het oorspronkelijke template, `css/base.css` = normalize + oude basisregels). **Niet aanpassen**; wijzigingen gaan in `assets/css/components/*.css` (geïmporteerd in `assets/css/input.css`) en overschrijven de legacy-regels.
- Geen Tailwind preflight: die zou de bestaande site veranderen.
- Kleuren: groen `#86c841` (primary), donkergroen hover `#6fa832`, tekst/footer `#222`.
- Volgorde van de legacy CSS/JS staat in `inc/scripts.php` en is gelijk aan het oude thema. De jQuery-plugins draaien op de meegeleverde jQuery (`kj-jquery`), niet op die van WordPress.
- Escape alle output (`esc_html`, `esc_url`, `esc_attr`, `wp_kses_post`).

## Content
- Homepage: paginatemplate `templates/home.php` met ACF-velden `sliders`, `over-ons-*`, `alles_in_een`, `project_1..4`, `reviews`.
- Projecten: CPT `projecten`, repeater `project_images` (sub `afbeelding`).
- Footer: ACF-optiepagina, repeaters `diensten` en `kernwaarden`.
- ACF-veldgroepen staan in de database (geen acf-json).

## Build & deploy
- `npm run build` vóór elke commit met CSS-wijzigingen; `assets/css/style.css` staat in git.
- Deploy via Deployer for Git vanaf `main`, daarna Nginx-cache legen.
