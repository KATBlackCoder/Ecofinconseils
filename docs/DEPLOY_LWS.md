# Déploiement sur LWS Perso

Ce guide décrit comment héberger le site Ecofinconseils sur [LWS](https://www.lws.fr/) avec la formule **LWS Perso** (hébergement web mutualisé).

## Prérequis

- Un compte LWS avec offre **LWS Perso** (ou équivalent hébergement web).
- Un nom de domaine pointant vers LWS (ex. `ecofinconseils.com`).
- Node.js et pnpm en local pour le build.

## 1. Configurer l’URL du site

Dans `astro.config.mjs`, vérifie que `SITE` correspond à ton domaine :

```js
const SITE = 'https://ecofinconseils.com'
```

Le sitemap est généré par `@astrojs/sitemap` au build (`sitemap-index.xml`, `sitemap-0.xml`). L’URL du site et celle dans `public/robots.txt` doivent correspondre à ton domaine.

## 2. Formulaire de contact (PHP + PHPMailer sur LWS)

Le projet inclut **`public/contact.php`**, copié dans `dist/` au build. Le formulaire envoie les messages vers `/contact.php`.

1. **Build** : `pnpm build` → le contenu de `dist/` contient déjà `contact.php`.
2. **Upload** : envoie **tout le contenu de `dist/`** à la racine du site sur LWS (FTP ou gestionnaire de fichiers).
3. **Sur LWS**, ouvre le terminal du dashboard, place-toi à la racine du site (là où se trouvent `index.html` et `contact.php`) puis exécute :
   ```bash
   composer require phpmailer/phpmailer
   ```
   Cela crée `vendor/` et `composer.json`.
4. **Configurer l’email** : ouvre `contact.php` sur le serveur et modifie la constante `TO_EMAIL` en haut du fichier (par défaut : `contact@ecofinconseils.com`).

Le script utilise la fonction PHP `mail()` de LWS (pas de configuration SMTP). Les messages sont envoyés à `TO_EMAIL`. Limites LWS : 1500 emails/jour, 40 sujets identiques/minute.

## 3. Build du site

```bash
pnpm install
pnpm build
```

Le site statique est généré dans le dossier `dist/`.

## 4. Envoi des fichiers sur LWS

Avec **LWS Perso**, tu accèdes à ton hébergement par **FTP** ou **Gestionnaire de fichiers** (cPanel / interface LWS).

1. Connecte-toi à ton espace LWS (FTP ou fichier).
2. Ouvre le répertoire d’hébergement web (souvent `www`, `public_html` ou `web` selon l’offre).
3. **Uploade tout le contenu de `dist/`** (fichiers et dossiers) à la racine de ce répertoire. Ne pas uploader le dossier `dist` lui-même : son contenu doit être à la racine du site.

Structure typique après upload (avec PHP) :

```text
www/
├── index.html
├── contact.php          ← formulaire POST vers ce script
├── vendor/              ← après "composer require phpmailer/phpmailer"
│   └── autoload.php
├── contact/
├── services/
├── about/
├── equipe/
├── en/
├── assets/
├── sitemap-index.xml
├── sitemap-0.xml
├── robots.txt
├── favicon.ico
├── favicon.svg
├── logo-header.png
├── logo-header@2x.png
└── …
```

## 5. Vérifications

- Ouvre `https://ton-domaine.ml` : la page d’accueil s’affiche.
- Teste les pages FR et EN, puis le formulaire de contact (avec PHP : `composer require phpmailer/phpmailer` exécuté et `TO_EMAIL` configuré dans `contact.php`).
- Vérifie `https://ecofinconseils.com/sitemap-index.xml` et `https://ecofinconseils.com/robots.txt`.

## 6. Mises à jour

À chaque modification du projet :

```bash
pnpm build
```

Puis renvoie le contenu de `dist/` par FTP (écrase les fichiers existants). Tu peux ne pas toucher aux fichiers inchangés si ton client FTP le permet.

## Référence

- [LWS — Hébergement web](https://www.lws.fr/hebergement-web/)
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
