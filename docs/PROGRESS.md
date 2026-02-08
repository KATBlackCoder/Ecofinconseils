# Suivi d'avancement — Ecofinconseils

État actuel du projet et tâches. Dernière mise à jour : 2025-02-07.

## Statut global

| Domaine              | Statut     | Note                                      |
|----------------------|------------|-------------------------------------------|
| Migration Vue/shadcn | Terminé    | Toutes les sections et le hero en Vue     |
| Design / React ref   | Terminé    | Aligné sur `react/` (Services, palette)   |
| i18n FR/EN           | Terminé    | Routes `/` et `/en/*`, prop `locale`       |
| Documentation        | En cours   | PROGRESS, ARCHITECTURE, CHANGELOG en place |

## Milestones

### M1 — Site vitrine (Terminé)

- [x] Layout unique `BaseLayout.astro` avec Header/Footer Vue
- [x] Pages : Accueil, Services, À propos, Équipe, Contact (FR + EN)
- [x] Hero unique `SectionHero.vue` (variant full / compact)
- [x] Sections métier en Vue : StatsCards, MissionSection, CtaSection, ServicesSection, AboutSection, TeamSection, ContactSection
- [x] Formulaire contact avec validation côté client (`ContactForm.vue`)
- [x] Animations au scroll (`AnimateInView.vue` + script global dans BaseLayout)

### M2 — UI et design (Terminé)

- [x] shadcn-vue : Button, Card, Input, Label, Textarea, DropdownMenu, Badge
- [x] Section Services alignée sur l’app React (CardHeader/CardContent, Badge vert, `bg-[#0A1929]/50`)
- [x] Palette : `#0A1929`, `#0D2137`, `#4CAF50`, thème dans `global.css`

### M3 — Documentation (En cours)

- [x] Création de `docs/PROGRESS.md`, `docs/ARCHITECTURE.md`, `docs/CHANGELOG.md`
- [x] Aligner le README sur l’état actuel (architecture Vue/shadcn, liens vers docs/)
- [ ] Scripts optionnels : `scripts/validate_docs.py`, `scripts/generate_changelog_entry.py` (si besoin)

## Prochaines priorités

1. **Contenu** : Remplacer les placeholders (téléphone, images équipe, carte) par les vraies données.
2. **SEO / meta** : Vérifier titres et descriptions par page (déjà définis dans les pages Astro).
3. **Déploiement** : Build `pnpm build` et déploiement de `dist/` (LWS ou autre hébergeur statique).

## Blocages / risques

- Aucun blocage actuel.
- Référence design : app React dans `react/` (localhost:5173) ; la garder à jour si la maquette change.
