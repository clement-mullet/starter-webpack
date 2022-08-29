# README Colibriledev
## Configuration

* Actuellement aucune (lol)  

## ChangeLog  

* Les fichiers buildés (minifiés) par webpack se trouvent maintenant dans public/js/dist.  
Je me suis dit que ça serait plus pratique pour différencier les modules js qu'on créait nous même des fichiers prêt pour un déploiement.  

* Nous avons maintenant plusieurs points d'entrées (entry points) dans le fichier webpack.config.js  
* Tout les fichiers et modules javascript ont été déplacé dans le dossier public/js afin d'avoir une meilleur lecture de la structure. 

## Pour créer et utiliser un script js :  

* Créer un fichier (de préférence dans le dossier public/js/). Ecrire du code dedans.
* Dans le fichier wepack.config.js : ajouter une entrée pour ce fichier (ex: cart : './public/js/cart.js).  
* Rebuild avec webpack
* Intégrer le script module à la page qu'on souhaite (je l'ai fait dans la classe show de component.php pour un exemple).

Et paf, ça fait des chocapics ! Have fun ! :smile: 


