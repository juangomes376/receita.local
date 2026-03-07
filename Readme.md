# Receita — site de recettes (Projet)

🔗 https://recettes.juangomes.dev/

---

## 🎯 Présentation
Receita est un mini-site de recettes de cuisine développé en PHP. Il permet de publier, lister et consulter des recettes, ainsi que d'administrer les recettes et les ingrédients via une interface d'administration.

Ce dépôt sert de base pour un projet personnel/portfolio et est prêt pour intégration future de services de traduction (ex. : GTranslate) et de gestion de consentement cookies (ex. : tarteaucitron).

---

## ✨ Fonctionnalités principales
- Gestion des recettes (nom, catégorie, image, description, note, tags). 
- Gestion des ingrédients (nom, image), réutilisables dans plusieurs recettes.
- Recherche par nom, ingrédients ou tags.
- Interface d'administration (création, modification, ajout d'ingrédients aux recettes).
- Interface moderne responsive avec Tailwind CSS et icônes Font Awesome.
- Pages légales prêtes : `Mentions légales`, `Politique de confidentialité`, `Politique des cookies`, `Conditions`.

---

## 🛠️ Technologies & dépendances
- PHP (versions modernes recommandées 7.4+ / 8.x)
- Composer (gestion des dépendances)
- Tailwind CSS (via CDN pour prototype)
- Font Awesome (via CDN)
- Base de données MySQL / MariaDB

---

## 🚀 Installation (locale)
1. Clonez le repo :

```bash
git clone <votre_repo> recettes.juangomes.dev
cd recettes.juangomes.dev
```

2. Installez les dépendances PHP (si besoin) :

```bash
composer install
```

3. Copier l'exemple d'environnement et configurez vos paramètres DB :

```bash
cp .env.example .env
# éditez .env avec vos credentials
```

4. Importez la base (fichier `recette.sql`) :

```bash
mysql -u <user> -p < recette.sql
```

5. Lancez un serveur local PHP pour tester :

```bash
php -S localhost:8000 -t .
```

Ouvrez ensuite `http://localhost:8000`.

---

## 🔐 Sécurité & bonnes pratiques
- **Ne commitez jamais** vos secrets (`.env`) : `.env` est listé dans `.gitignore`. Si vous l'avez commité, supprimez-le de l'index git (`git rm --cached .env`) et forcez le push si nécessaire.
- Utiliser des requêtes préparées (PDO) côté serveur pour éviter les injections SQL.
- Stocker les mots de passe avec `password_hash()`.
- Valider et échapper toute entrée/sortie pour prévenir XSS.

---

## ♿ Accessibilité & UX
Le site a été revu pour une meilleure accessibilité : focus visible, skip-link, role ARIA, contraste amélioré et navigation clavier fonctionnelle.

---

## 🧩 Intégration future
- Placeholder pour GTranslate dans le header (`#gtranslate-widget`).
- Placeholder / instructions pour intégrer `tarteaucitron` (bandeau cookies) dans `assets/pages/politique-cookies.php`.

---

## 🧾 Légal (déjà ajouté)
Les pages légales ont été ajoutées et indiquent que le site est géré et créé par :

**Juan Gomes** — contact : <contact@juangomes.dev>

> Ces textes sont des modèles indicatifs pour l'UE (RGPD). Pour une conformité stricte, faites valider par un conseiller juridique.

---

## 🤝 Contribuer
Contributions bienvenues (issues, PR). Merci de :
- créer une issue pour les changements importants
- ouvrir une PR par fonctionnalité

---

## 📬 Contact
Pour questions, intégrations ou services : **contact@juangomes.dev**

---

© <?php echo date('Y'); ?> Receita — créé et géré par Juan Gomes