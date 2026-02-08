# Ecofinconseils — Plateforme vitrine

Site vitrine officiel d’**Ecofinconseils**, basé à **Bamako (Mali)**. Plateforme de haut standing pour rassurer les partenaires et attirer les investisseurs.

Ce projet suit les spécifications du [PRD](doc/prd.md) (Product Requirements Document).

## Vision et objectifs

- **Mission** : Plateforme vitrine professionnelle pour présenter l’offre et l’équipe.
- **Identité visuelle** : Bleu nuit / noir (sérieux financier) et vert (succès, croissance) — palette alignée sur le design React de référence.

## Stack technique

- **Framework** : [Astro](https://astro.build) (output statique) — HTML statique par défaut, peu de JS.
- **UI** : Vue 3 + Tailwind CSS ; composants type shadcn-vue (Card, formulaires, etc.).
- **Hébergement** : Prévu pour un déploiement en fichiers statiques (ex. LWS).

## Structure du projet

```text
/
├── doc/
│   └── prd.md              # Cahier des charges / PRD
├── public/
│   ├── favicon.svg
│   └── favicon.ico
├── src/
│   ├── components/         # Composants réutilisables
│   │   ├── ui/             # Card, Button, etc.
│   │   ├── Header.vue      # Nav + sélecteur de langue
│   │   ├── Footer.astro
│   │   ├── ContactForm.vue
│   │   ├── *Hero.astro     # Heroes (Page, Services, About, Team, Contact)
│   │   └── *Section.astro  # Blocs de contenu par page
│   ├── layouts/
│   │   └── BaseLayout.astro
│   ├── pages/
│   │   ├── index.astro     # Accueil
│   │   ├── services.astro
│   │   ├── about.astro
│   │   ├── equipe.astro
│   │   ├── contact.astro
│   │   └── en/             # Pages en anglais
│   └── styles/
│       └── global.css
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
- [Documentation Astro](https://docs.astro.build)
