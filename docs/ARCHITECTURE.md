# Architecture — Ecofinconseils

Décisions techniques et organisation du code. Site vitrine Astro + Vue, output statique.

## Stack

- **Framework** : Astro 5 (static output)
- **UI** : Vue 3 avec `client:load` ; shadcn-vue (Button, Card, Input, Label, Textarea, DropdownMenu, Badge) dans `src/components/ui/`
- **Styles** : Tailwind CSS 4, thème dans `src/styles/index.css` + `light-theme.css` / `dark-theme.css`, animations dans `animations.css`
- **Référence design** : app React dans `react/`

## Structure

- `src/components/` : Vue (SectionHero, sections métier, Header, Footer, ContactForm, AnimateInView) + `ui/` shadcn
- `src/layouts/BaseLayout.astro` : seul layout (Header, Footer, slot, script animation scroll)
- `src/pages/` : Astro ; FR à la racine, EN dans `en/`
- `src/lib/utils.ts` : `cn()` pour classes
- `src/styles/index.css` : point d’entrée ; `light-theme.css` / `dark-theme.css` : variables thème ; `animations.css` : `[data-animate-inview]`, hero-grid, keyframes

## Décisions (ADR)

**ADR 1 — Astro pages, Vue blocs**  
Pages et layout en Astro ; sections, hero, header, footer, formulaire en Vue avec `client:load`. Hydratation limitée, HTML statique.

**ADR 2 — Un seul hero**  
`SectionHero.vue` avec `variant: 'full' | 'compact'`. Accueil = full (grille, CTA) ; autres pages = compact.

**ADR 3 — i18n par routes et prop**  
FR = `/`, `/services`, … ; EN = `/en/*`. Composants reçoivent `locale="fr"|"en"` ; textes en computed. BaseLayout déduit `lang` du path pour Footer.

**ADR 4 — Design aligné React**  
Palette et structure (ex. Services : CardHeader/CardContent, Badge) alignées sur `react/`.

**ADR 5 — Animations sans lib**  
`data-animate-inview` / `data-stagger` + script global dans BaseLayout qui ajoute `.in-view` ; CSS dans `animations.css`. Pas de Motion/Framer.

## Patterns

- Sections : Vue + Card shadcn + AnimateInView + prop `locale`.
- Formulaire : ContactForm avec Input, Label, Textarea, Button ; validation manuelle.
- Header : DropdownMenu shadcn pour la langue.

## Dépendances

- `@astrojs/vue`, `reka-ui`, `@vueuse/core` ; pas de router Vue (MPA Astro).
