# FootEvenT

**FootEvenT** est une application web dédiée à l'organisation et à la gestion des tournois de football pour les équipes amateurs.


## Présentation

FootEvenT centralise l'ensemble du processus d'organisation des compétitions de football dans une seule plateforme simple, claire et efficace. Elle permet aux organisateurs de créer des tournois, d'inscrire des équipes, de planifier des matchs et de suivre les résultats ainsi que le classement.

**Présentation Canva** :(https://canva.link/jor00ghq81ao876)  
**Maquettes Figma** : (https://www.figma.com/design/A2i38Xjm4jrxfOEuO424Pl/Untitled?node-id=0-1&t=a8CdctjtfuFWZpdp-1)

---

## Objectifs

- Simplifier l'organisation des tournois de football amateurs
- Centraliser la gestion des équipes, matchs et résultats
- Réduire les erreurs de planification et de suivi
- Offrir une expérience claire et intuitive aux utilisateurs


## Cibles

| Cible | Description |
|---|---|
| Organisateurs | Créent et gèrent les tournois |
| Équipes amateurs | S'inscrivent et participent |
| Joueurs | Rejoignent une équipe et suivent les matchs |
| Associations sportives | Supervisent les compétitions |

## Fonctionnalités

### Gestion des utilisateurs
- Inscription et connexion
- Rôles : **Administrateur**, **Organisateur**, **Joueur / Équipe**
- Gestion du profil

### Gestion des tournois
- Création, modification et suppression de tournois
- Définition du nombre d'équipes, lieu, date et type

### Gestion des équipes
- Inscription des équipes à un tournoi
- Ajout et gestion des joueurs
- Validation des équipes par l'organisateur

### Gestion des matchs
- Génération automatique des matchs
- Planification (date, heure, terrain)
- Affichage du calendrier

### Résultats & Classement
- Saisie des scores
- Mise à jour  des statistiques
- Classement automatique avec points, buts marqués/encaissés

### Notifications
- Changements de matchs
- Acceptation / retrait d'équipe
- Nouveau tournoi disponible
### Invitation 
- invitée joueur dans équipe 
- accépter invitation
- refusee invitation

## Technologies

### Frontend
- HTML5, CSS3
- Bootstrap / Tailwind CSS
- JavaScript

### Backend
- PHP — Framework Laravel
- Architecture MVC(Model – View – Controller)

---

## Livrables

- [ ] Cahier des charges
- [ ] Diagrammes UML (cas d'utilisation, classes)
- [ ] Maquettes UI/UX (Figma)
- [ ] Présentation (Canva)
- [ ] Code source
- [ ] Scrum Board (Jira)
- [ ] Dépôt GitHub

## User Stories 

| Rôle | Exemples
| **Utilisateur** | Créer un compte, se connecter, consulter les tournois |
| **Administrateur** | Gérer les utilisateurs, superviser tous les tournois |
| **Organisateur** | Créer un tournoi, valider les équipes, saisir les résultats |
| **Joueur** | Rejoindre une équipe, consulter les matchs et le classement,crée équipe |


## Structure du projet

FootEvenT/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Services/
|   └── Repositories/
├── resources/
│   ├── views/
│   └── ...
├── routes/
│   └── web.php
├── database/
│   └── migrations/
└── public/


##  Installation

git clone https://github.com/votre-repo/FootEvenT.git
cd FootEvenT
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
