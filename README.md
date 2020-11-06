# eShop

Le site permet de mettre en relation des fournisseurs qui proposent des articles et des clients qui vont les commander.

Les fournisseurs peuvent enregistrer, supprimer et modifier ses articles qui sont repartis par catégories. Les clients peuvent accéder à la liste des articles introduits par les fournisseurs, choisir un ou plusieurs produits et passer la commande (en passant par le panier). Les fournisseurs peuvent consulter ensuite la liste des commandes passées et d’accepter ou de refuser une commande. Les deux parties peuvent retrouver le montant et le détail de chaque commande, ainsi que tout l’historique. 

Les clients et les fournisseurs peuvent retrouver les articles par fournisseur, catégorie ou directement par une recherche.

L’ajout des clients et des fournisseurs se fait par auto-enregistrement. Les catégories des produits sont fixés initialement et ne peuvent plus changer. Le site gére correctement l’épuisement des stocks (quantités) chez le fournisseur. Un fournisseur ne peut pas être un client (et inversement).

Les fonctionnalités implémentées sont :

- Les pages d’enregistrement des fournisseurs et des clients.

- Pour le fournisseur :
  - L’enregistrement d’un nouvel article.
  - La modification et/ou la suppression d’un article.
  - Le parcours de la liste de ses articles (par catégorie et/ou recherche).
  - La gestion des commandes (affichage des demandes, acceptation ou refus).
  
- Pour le client :
  - Liste de tous les produits.
  - Liste des produits par fournisseur et/ou catégorie et/ou recherche.
  - Commande d’un produit (en passant par le panier).
  - Liste des commandes (en cours, acceptées, refusées).

La Base de données : users, produits, categories, panier, commandes.

Technologies utilisées : Brackets, WampServer, PHP, HTML, CSS, Boostrap, MySQL, Apache2.

