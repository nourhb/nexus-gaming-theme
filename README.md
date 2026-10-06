# Nexus — Gaming Platform WordPress Theme

**Nexus** is a high-voltage Full Site Editing (block) theme for gaming platforms, esports teams, game review sites and gaming communities. A dark, neon, HUD-inspired design with ready-made patterns for everything a gaming hub needs: featured games, trending grids, leaderboards, tournaments, reviews, live streams, esports news and more.

- **Author:** Nour El Houda Bouajila
- **Portfolio:** https://nour-el-houda-bouajila.rf.gd/
- **GitHub:** https://github.com/Nourhb
- **Version:** 1.0.0
- **License:** GPL-2.0-or-later

## Features

- Full Site Editing (FSE) with `theme.json` design system
- Dark neon palette (Void / Slate) with neon cyan, pink, lime and violet accents
- Orbitron display + Inter body typography (Google Fonts)
- 8 templates: front page, blog index, single post (with comments), page, wide page, archive, search, 404 ("Game over — press continue")
- Header with live headline ticker, logo, nav and "Join the Clan" CTA
- Footer with about, links, newsletter CTA and socials
- Animated stat counters, scroll reveal, back-to-top, glitch headline hover, pulsing LIVE badges, scanline hero overlay
- Reduced-motion support and print styles
- Custom block styles: Neon Shine button, HUD Card, Rank Badge
- One style variation: **Crimson** (red-hot alternative accents)

## Block Pattern Catalog (`nexus` category)

| Pattern | Description |
|---|---|
| Hero — Featured Game | Full-bleed cover hero with rating badge, glitch headline and CTAs |
| Trending Games Grid | 6 game cards with covers, ratings, platforms and trend labels |
| Stats Band | 4 animated count-up stats (players, tournaments, prize pool, games) |
| Leaderboard | Season ranking table with highlighted top 3 |
| Upcoming Tournaments | 3 tournament cards with dates, formats and prize pools |
| Latest Reviews | 3 review cards with big scores and level bars |
| Live Streams | 3 stream cards with pulsing LIVE badges and viewer counts |
| Esports Wire | 3 news cards with category labels |
| Newsletter CTA | Full-bleed signup banner over a glowing setup photo |
| Community FAQ | 4 common community questions, styled cards |

## Installation

1. Download or clone this repository into `wp-content/themes/nexus-gaming-theme/`.
2. In WordPress admin go to **Appearance → Themes** and activate **Nexus**.
3. Open **Appearance → Editor** to customize templates, patterns and the Crimson style variation.

## Customization

- Colors, gradients, duotones and type scale live in `theme.json`.
- Front-end effects (ticker, glitch, reveals, counters) are in `assets/js/theme.js` and `style.css`.
- Edit `parts/header.html` to change ticker headlines and navigation.
- The `nexus-count` class with `data-count` (and optional `data-format="compact"`) powers animated numbers.

## Changelog

### 1.0.0 — 2026-10-06
- Initial release: 8 templates, 10 patterns, Crimson style variation, neon design system.

## License

GPL-2.0-or-later. See `LICENSE` for the full text.

© 2026 Nour El Houda Bouajila.
