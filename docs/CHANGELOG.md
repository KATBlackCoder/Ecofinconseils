# Changelog — Ecofinconseils

Historique des changements. Format [Keep a Changelog](https://keepachangelog.com/).

## [Unreleased]

### Added

- Documentation projet : `docs/PROGRESS.md`, `docs/ARCHITECTURE.md`, `docs/CHANGELOG.md` (maintenance docs).

---

## [0.1.0] — 2025-02-07

### Added

- **Hero unique** : `SectionHero.vue` avec `variant="full"` (accueil) et `variant="compact"` (autres pages) ; remplacement de tous les heroes Astro.
- **Sections Vue** : `ServicesSection.vue`, `AboutSection.vue`, `TeamSection.vue`, `ContactSection.vue` avec Card shadcn, `AnimateInView`, prop `locale`.
- **Composants shadcn-vue** : Button, Card (CardHeader, CardContent, CardTitle), Input, Label, Textarea, DropdownMenu, Badge.
- **Header** : Sélecteur de langue via DropdownMenu shadcn (remplacement du dropdown manuel).
- **ContactForm** : Champs avec Input, Label, Textarea, Button shadcn ; validation côté client.
- **Section Services** : Alignement sur l’app React — Card `bg-[#0A1929]/50`, CardHeader/CardContent, Badge vert pour Banque et Assurance, Bureau d’Études sans badge.

### Changed

- **Pages** : Toutes les pages (FR et EN) utilisent `SectionHero.vue` et les sections Vue en `client:load`.
- **Layout** : Un seul layout `BaseLayout.astro` ; suppression de `Layout.astro`.
- **Styles** : Palette et variables thème (`--eco-bg`, `--eco-primary`, etc.) dans `global.css` pour cohérence avec React.

### Removed

- **Composants Astro supprimés** : PageHero, ServicesHero, AboutHero, TeamHero, ContactHero ; ServicesSection, AboutSection, TeamSection, ContactSection (remplacés par les .vue) ; AnimateHero, AnimateInView.astro, MissionSection.astro, CtaSection.astro, StatsCards.astro, Footer.astro, PageSection.astro, Welcome.astro ; `ui/Button.astro`, `ui/Card.astro`.
- **Layout** : `Layout.astro` (inutilisé).

### Fixed

- **Services** : Design aligné sur la référence React (badges verts en Badge shadcn, structure CardHeader/CardContent, pas de bouton pleine largeur).
- **Footer** : Prop `locale` passée depuis BaseLayout (lang déduit du path).
- **ContactForm** : Placeholders et labels via computed pour éviter erreurs de parsing (guillemets/apostrophes).

---

[Unreleased]: https://github.com/ecofinconseils/ecofinconseils-docs/compare/v0.1.0...HEAD
[0.1.0]: https://github.com/ecofinconseils/ecofinconseils-docs/releases/tag/v0.1.0
