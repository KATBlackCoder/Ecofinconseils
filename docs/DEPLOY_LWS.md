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

---

## 7. Sveltia CMS — Interface d'administration

Le projet intègre [Sveltia CMS](https://github.com/sveltia/sveltia-cms) (compatible Decap CMS) pour permettre la modification du contenu sans toucher au code. **Aucun proxy OAuth ni service tiers requis** — l'authentification GitHub se fait nativement via PKCE directement dans le navigateur.

### 7.1 Workflow global

```
Éditeur modifie contenu via /admin
        ↓
Sveltia CMS commit les fichiers JSON dans GitHub
        ↓
Développeur lance: pnpm build
        ↓
Upload dist/ sur LWS
```

### 7.2 Développement local (sans authentification)

Lance deux terminaux en parallèle :

```bash
# Terminal 1 — proxy CMS local
pnpm cms:dev

# Terminal 2 — serveur Astro
pnpm dev
```

Ouvre `http://localhost:4321/admin` → l'interface CMS apparaît sans authentification.

Les modifications sauvegardées écrivent directement dans `src/data/fr/` et `src/data/en/`.

### 7.3 Production — Authentification GitHub OAuth (sans proxy)

Sveltia CMS supporte le flux PKCE : **aucun serveur intermédiaire requis**.

**Étape 1 — Créer un GitHub OAuth App**

1. Va sur [GitHub → Settings → Developer settings → OAuth Apps → New OAuth App](https://github.com/settings/applications/new)
2. Remplis :
   - **Application name** : `Ecofinconseils CMS`
   - **Homepage URL** : `https://ecofinconseils.com`
   - **Authorization callback URL** : `https://ecofinconseils.com/admin`
3. Copie le **Client ID** (le Client Secret n'est pas nécessaire avec PKCE)

**Étape 2 — Ajouter le Client ID dans `public/admin/config.yml`**

```yaml
backend:
  name: github
  repo: KATBlackCoder/Ecofinconseils
  branch: main
  app_id: <ton-github-client-id>   # ← ajouter cette ligne
```

**Étape 3 — Build et déployer**

```bash
pnpm build
# Upload dist/ sur LWS via FTP
```

L'interface admin sera accessible sur `https://ecofinconseils.com/admin`.

### 7.4 Fichiers de contenu éditables

| Page | Fichier FR | Fichier EN |
|------|-----------|-----------|
| Accueil | `src/data/fr/home.json` | `src/data/en/home.json` |
| Services | `src/data/fr/services.json` | `src/data/en/services.json` |
| À propos | `src/data/fr/about.json` | `src/data/en/about.json` |
| Équipe | `src/data/fr/team.json` | `src/data/en/team.json` |

Les photos des membres peuvent être uploadées via le CMS → elles sont stockées dans `public/media/`.

---

## Référence

- [LWS — Hébergement web](https://www.lws.fr/hebergement-web/)
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
- [Decap CMS](https://decapcms.org/docs/)
- [Proxy OAuth pour Decap CMS](https://github.com/vencax/netlify-cms-github-oauth-provider)
