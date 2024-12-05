# Fonctionnalités du Projet de Blog

## Groupe 1 : Authentification
L'objectif de cette fonctionnalité est de gérer les utilisateurs, leur authentification et la mise à jour de leur profil. Cette fonctionnalité permet aux utilisateurs de se connecter, de s'inscrire et de mettre à jour leurs informations personnelles.

### 1.1 Login (Connexion)
- **Description** : Permet à un utilisateur de se connecter à l'application en vérifiant son `username` (nom d'utilisateur) et son `password` (mot de passe).
- **Étapes** :
  - L'utilisateur saisit son `username` et son `password`.
  - Le système vérifie si les informations sont correctes.
  - Si les informations sont valides, l'utilisateur est redirigé vers la page d'accueil.
  - Si les informations sont incorrectes, un message d'erreur est affiché.

### 1.2 Inscription
- **Description** : Permet à un utilisateur de créer un compte en fournissant un `username`, un `email` et un `password`.
- **Étapes** :
  - L'utilisateur saisit son `username`, `email` et `password`.
  - Le système vérifie la disponibilité du `username` et de l'`email`.
  - Si l'utilisateur existe déjà, un message d'erreur est affiché.
  - Si l'utilisateur n'existe pas, le compte est créé et l'utilisateur est connecté automatiquement.

### 1.3 Mise à jour du profil utilisateur
- **Description** : Permet à un utilisateur connecté de modifier ses informations personnelles, telles que son `email`, `mot de passe` ou son `username`.
- **Étapes** :
  - L'utilisateur accède à son profil depuis la page d'accueil ou son tableau de bord.
  - Il peut modifier les informations de son profil.
  - Si le `username` existe déjà, un message d'erreur est affiché
  - L'utilisateur doit mettre son `mot de passe` actuel pour pouvoir faire une modification.(Donc une vérification pour s'assurer que c'est l'utilisateur lui même qui fait les modifications)
  - Les modifications sont validées et mises à jour dans la base de données.

---

### gestion de role (admin , user)

## Groupe 2 : Accueil
L'objectif de cette fonctionnalité est d'afficher les articles publiés et les commentaires associés. Elle inclut également un système de filtrage pour retrouver des posts spécifiques.

### 2.1 Listage des posts (articles)
- **Description** : Affiche tous les articles publiés dans l'application.
- **Étapes** :
  - Les articles sont affichés sous forme de liste avec un titre, le corps de l'article et la date de publication.
  - Les articles sont triés par date de publication (du plus récent au plus ancien).
  - Aussi une fonction de filtrage pour chercher selon le titre de l'article

### 2.2 Commentaires
- **Description** : Permet d'afficher les commentaires associés à chaque article.
- **Étapes** :
  - Les commentaires sont affichés sous chaque article.
  - Chaque commentaire montre le `nom de l'utilisateur` qui a commenté et la `date de publication`.
  - Un utilisateur qui n'est pas connecté ne peut pas faire de commentaire.

### 2.3 Option de filtrage
- **Description** : Permet de filtrer les articles pour trouver ceux qui correspondent à des critères spécifiques (par auteur ou mots-clés).
- **Étapes** :
  - L'utilisateur peut choisir les critères de filtrage (ex : mots-clés, auteur).
  - La liste des articles est mise à jour en fonction des filtres sélectionnés.

### 2.4 Restriction de publication de posts et commentaires
- **Description** : Les utilisateurs non connectés ne peuvent pas publier de posts ni laisser de commentaires.
- **Étapes** :
  - Si un utilisateur n'est pas connecté, les options pour ajouter un post ou un commentaire sont désactivées.
  - L'utilisateur est redirigé sur la page de register s'il  tente de faire un post ou un commentaire.

---

## Groupe 3 : Post (Articles)
Cette fonctionnalité gère la création, l'édition et la suppression des articles. Elle inclut un système de contrôle d'accès pour limiter l'édition et la suppression aux seuls auteurs des articles.

### 3.1 Création des articles
- **Description** : Permet à un utilisateur connecté de créer un nouvel article en fournissant un titre, un contenu et éventuellement des mots clés.
- **Étapes** :
  - L'utilisateur remplit un formulaire avec les informations de l'article (titre, contenu, mots  clés).
  - L'article est enregistré dans la base de données.
  - L'article est affiché dans la liste des articles de la page d'accueil.

### 3.2 Listage des articles
- **Description** : Affiche tous les articles créés par les utilisateurs sous forme de liste.
- **Étapes** :
  - Les articles sont affichés avec un titre, un résumé et la date de publication.
  - L'utilisateur peut consulter le contenu complet d'un article en cliquant sur le titre.

### 3.3 Mise à jour des articles
- **Description** : Permet à l'auteur d'un article de modifier son contenu (titre, texte, tags).
- **Étapes** :
  - L'auteur de l'article peut accéder à une interface de modification.
  - L'auteur peut mettre à jour le titre, le contenu ou les tags.
  - Les modifications sont sauvegardées dans la base de données.

### 3.4 Suppression des articles
- **Description** : Permet à l'auteur d'un article de le supprimer.
- **Étapes** :
  - L'auteur peut supprimer l'article via une interface dédiée.
  - L'auteur d'un article peut supprimer aussi un commentaire sous son poste
  - Une fois supprimé, l'article n'est plus visible sur la plateforme.

### 3.5 Contrôle d'accès
- **Description** : Seul l'auteur d'un article a le droit de le modifier ou de le supprimer.
- **Étapes** :
  - Lors de l'édition ou de la suppression d'un article, le système vérifie que l'utilisateur est bien l'auteur de l'article.
  - Si l'utilisateur n'est pas l'auteur, il ne pourra pas effectuer ces actions.


### crud sur les catégories d'articles
