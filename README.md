# J2B

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

    - Avoir sur sa machine sous windows WSL avec docker installer sous sa machine: [Lien Tutoriel](https://docs.microsoft.com/fr-fr/windows/wsl/tutorials/wsl-containers)
    - Build le docker depuis le dossier docker et up le conteneur avec le serveur symfony et MySQL

  - ### _Depuis MacOC/OS X_

    **LEO**

## Rapide explication du header

Dans le header se trouve plusieurs onglets:

- **\[ADMIN\]** Onglet Gestion où l'admin peut CRUD les entreprises partenaires, les comptes comédiens ainsi que les formations
- **\[COMEDIEN\]** Onglet Upload où le comédien peut ajouter ses document
- **\[ADMIN\]** Onglet Facture où l'admin peut voir toutes les factures des comédiens ainsi que de check les factures déjà payés

_Lien vers le [Diaporama](https://docs.google.com/presentation/d/1QikhU1qTnJB7HJkKbSU5iziktsObBMMy/edit?usp=sharing&ouid=117149520027415065755&rtpof=true&sd=true)_
