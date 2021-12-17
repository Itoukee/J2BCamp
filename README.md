# J2B Bills generator
## Comment installer le projet

- Clôner depuis GIT HUB
    - Via SSH: git@github.com:garoNits/J2BCamp.git
    - Via HTTPS: https://github.com/garoNits/J2BCamp.git
- Compose le docker

    - ### _Depuis Linux_

  ```
  $ cd docker
  $ ./init.sh
  ```

    - ### _Depuis Windows_

        - Avoir sur sa machine sous windows WSL avec docker installé sous sa machine: [Lien Tutoriel](https://docs.microsoft.com/fr-fr/windows/wsl/tutorials/wsl-containers)
        - Build le docker depuis le dossier docker et up le conteneur avec le serveur symfony et MySQL

    - ### _Depuis MacOC/OS X_

        - avoir installé Docker Desktop sur sa machine
        - lancer le script init

## Rapide explication du header

Dans le header se trouvent plusieurs onglets, en fonction du rôle de l'utilisateur :

- **\[ADMIN\]**
  - ``Factures Clients`` → Késako ?
  - ``État Factures`` → L'admin peut voir et télécharger toutes les factures des comédiens, et indiquer si elles sont payées ou non (changement réversible) ;
  - ``Gestion`` → L'admin peut CRUD les entreprises partenaires, les comptes comédiens ainsi que les formations.

- **\[COMÉDIEN\]**
    - ``Mes Factures`` → Le comédien peut ajouter et télécharger ses factures.

_Lien vers le [Diaporama](https://docs.google.com/presentation/d/1QikhU1qTnJB7HJkKbSU5iziktsObBMMy/edit?usp=sharing&ouid=117149520027415065755&rtpof=true&sd=true)_
