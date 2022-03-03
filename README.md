# Dotsafe Skills
#### Dotsafe Skills est une application permettant de présenter les membres de l’entreprise Dotsafe, leurs compétences et leurs projets.
** **
Toutes les données sont fictives et ont été générées automatiquement et aléatoirement gràce à des Data Fixtures.

#### _Structure du repo_
- l' **API** se trouve sur la branche '**heroku-API**' (prod) et '**API**' (dev)
- L'**application** se trouver sur la branche '**web-interface**'
### Technologies utilisées : 

##### _Back-end : API_
- PHP 8.0
- Symfony 6.0
- API Platform
- Doctrine
- MySQL

##### _Front-end : Application_
- JavaScript
- Vue.js
- Node.js
- Bootstrap

### Pour tester l’application, vous avez deux options :  
##### 1. En clonant le repo GitHub
- Placez-vous dans un dossier
- Cloner le repo **dotsafe-skills**
```sh
git clone https://github.com/FromBenj/dotsafe-skills.git
```
- Récupérer la branche **web-interface**
```sh
git pull origin web-interface
```
- Se positionner dans le dossier de l'application
```sh 
cd dotsafe-skills/dotsafe-skills-app
```
- Lancer le serveur et ouvrir l'application
```sh 
yarn install
yarn run serve 
```
##### 2. En téléchargeant au format zip la branche web-interface du repo GitHub
- Décpompresser le dossier 
- Ouvrir le dossier **dotsafe-skills-app**
- Lancer le serveur et ouvrir l'application
```sh 
yarn install
yarn run serve 
```

### Concernant l’API :
La branche heroku-API du repo permet d’avoir accès au projet Symfony.
Afin de pouvoir accéder à cette API sans avoir à lancer Symfony et créer une base de données, cette API est hébergée sur Heroku : **https://dotsafe-skills.herokuapp.com/api**

### Points d’amélioration : 

- Trouver une meilleure solution pour déployer et tester l’application en local le plus simplement possible
- Refactorer l’application Vue.js, avec notamment une moindre répétition du code
- Travailler l’esthétisme et l’UX de l’application
- Rendre l’application responsive
