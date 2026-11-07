# Versteegen Tuinen

WordPress-thema voor [versteegentuinen.nl](https://versteegentuinen.nl), hovenier in Venray en omstreken.

Gebouwd door [Kay Jilesen](https://kayjilesen.nl). Versie 2.0 is een opgeschoonde herbouw van het oorspronkelijke thema uit 2021, met hetzelfde uiterlijk.

## Opbouw

| Map / bestand | Inhoud |
|---|---|
| `functions.php` | Laadt de bestanden in `inc/` |
| `inc/` | Thema-instellingen, custom post type `projecten`, ACF-optiepagina, scripts/styles, helpers, SureCookie |
| `templates/home.php` | Paginatemplate **Home** (one-pager: slider, over, diensten, projecten, reviews) |
| `templates/components/` | Herbruikbare onderdelen (paginakop, decoratieve lijnen) |
| `archive-projecten.php` / `single-projecten.php` | Projectenoverzicht en projectpagina |
| `assets/legacy/` | Oorspronkelijke CSS/JS-stack (Bootstrap 4, template-CSS, jQuery-plugins), ongewijzigd |
| `assets/css/input.css` | Nieuwe CSS (Tailwind, zonder preflight), wordt na de legacy-stack geladen |

## Ontwikkelen

```bash
npm install
npm run dev     # watch
npm run build   # minified build naar assets/css/style.css
```

Na een wijziging aan CSS: `npm run build` vóór de commit. `assets/css/style.css` staat in git.

## Deploy

Via Deployer for Git vanaf `main`. Na een deploy met CSS/JS-wijzigingen de cache legen (Nginx Helper → Purge Entire Cache).

## Content

- ACF-velden staan in de database (velden op de homepage, projectfoto's, footerlijsten in de optiepagina).
- SEO via SureRank, cookies via SureCookie. Het thema zet SureCookie-branding uit en het logo in de banner (`inc/cookie-consent.php`).
