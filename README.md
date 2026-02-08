# Ecofinconseils — Plateforme vitrine

Site vitrine officiel d’**Ecofinconseils**, basé à **Bamako (Mali)**. Plateforme de haut standing pour rassurer les partenaires et attirer les investisseurs.

Ce projet suit les spécifications du [PRD](doc/prd.md) (Product Requirements Document).

## Vision et objectifs

- **Mission** : Plateforme vitrine professionnelle pour présenter l’offre et l’équipe.
- **Identité visuelle** : Bleu nuit / noir (sérieux financier) et vert (succès, croissance) — palette alignée sur le design React de référence.

## Stack technique

- **Framework** : [Astro](https://astro.build) (output statique).
- **UI** : Vue 3 + Tailwind CSS ; **shadcn-vue** (Button, Card, Input, Label, Textarea, DropdownMenu, Badge) dans `src/components/ui/`.
- **Hébergement** : Déploiement en fichiers statiques (ex. LWS).

## Architecture Vue / Astro

- **Vue (client:load)** : `Header.vue`, `Footer.vue`, `SectionHero.vue`, `StatsCards.vue`, `MissionSection.vue`, `CtaSection.vue`, `ServicesSection.vue`, `AboutSection.vue`, `TeamSection.vue`, `ContactSection.vue`, `ContactForm.vue`, `AnimateInView.vue`. UI : `ui/button/`, `ui/card/`, `ui/input/`, `ui/label/`, `ui/textarea/`, `ui/dropdown-menu/`, `ui/badge/` (shadcn-vue).
- **Astro** : `BaseLayout.astro` (seul layout), toutes les pages `*.astro` qui importent les composants Vue.

## Structure du projet

```text
/
├── docs/
│   ├── PROGRESS.md         # Suivi d'avancement
│   ├── ARCHITECTURE.md     # Décisions techniques
│   └── CHANGELOG.md        # Historique des changements
├── doc/
│   └── prd.md             # Cahier des charges / PRD
├── react/                 # App React de référence (design)
├── public/
├── src/
│   ├── components/        # Vue + ui/ (shadcn-vue)
│   ├── layouts/
│   │   └── BaseLayout.astro
│   ├── pages/             # FR + en/ (EN)
│   ├── lib/
│   └── styles/
│       └── global.css
├── components.json
├── package.json
└── README.md
```

## Pages et contenu

- **Accueil** : Hero, chiffres clés (stats), mission, CTA.
- **Services** : 3 pôles — Intermédiaire en Banque (agrément BCEAO N° ML00009/2024), Assurance (mandataire indépendant), Bureau d’études (analyse stratégique, conseils institutionnels) ; section « Pourquoi nous choisir ».
- **À propos** : Historique, valeurs (Confiance, Excellence, Innovation), positionnement « Le Connecteur Stratégique ».
- **Équipe** : Galerie de portraits avec rôles et expertises ; CTA « Rejoignez notre équipe ».
- **Contact** : Formulaire (nom, email, tél, sujet, message) et informations de contact (adresse, tél, email, horaires) ; placeholder pour plan d’accès (Bamako).

## Internationalisation (FR / EN)

- **FR** : routes à la racine (`/`, `/services`, `/about`, `/equipe`, `/contact`).
- **EN** : routes préfixées `/en` (`/en`, `/en/services`, `/en/about`, `/en/equipe`, `/en/contact`).
- Sélecteur de langue dans le header (dropdown FR / EN).

## Commandes

| Commande        | Action                                      |
| :-------------- | :------------------------------------------ |
| `pnpm install`  | Installer les dépendances                   |
| `pnpm dev`      | Lancer le serveur de dev (ex. `localhost:4321`) |
| `pnpm build`    | Build de production → `./dist/`             |
| `pnpm preview`  | Prévisualiser le build localement           |
| `pnpm astro ...`| Commandes CLI Astro                         |

## Déploiement

1. Build : `pnpm build`
2. Déployer le contenu du dossier `dist/` sur le serveur (LWS ou autre hébergement statique).

## Références

- [PRD du projet](doc/prd.md)
- [Suivi d'avancement](docs/PROGRESS.md) · [Architecture](docs/ARCHITECTURE.md) · [Changelog](docs/CHANGELOG.md)
- [Documentation Astro](https://docs.astro.build)
