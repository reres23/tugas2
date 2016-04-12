Microsoft Windows [Version 6.3.9600]
(c) 2013 Microsoft Corporation. All rights reserved.

C:\Users\ASUS K401L>cd\

C:\>composer create-project --prefer-dist yiisoft/yii2-app-basic basic
Installing yiisoft/yii2-app-basic (2.0.7)
  - Installing yiisoft/yii2-app-basic (2.0.7)
    Downloading: 100%

Created project in basic
Loading composer repositories with package information
Updating dependencies (including require-dev)
Your requirements could not be resolved to an installable set of packages.

  Problem 1
    - yiisoft/yii2 2.0.7 requires bower-asset/jquery 2.2.*@stable | 2.1.*@stable
 | 1.11.*@stable -> no matching package found.
    - yiisoft/yii2 2.0.6 requires bower-asset/jquery 2.1.*@stable | 1.11.*@stabl
e -> no matching package found.
    - yiisoft/yii2 2.0.5 requires bower-asset/jquery 2.1.*@stable | 1.11.*@stabl
e -> no matching package found.
    - Installation request for yiisoft/yii2 >=2.0.5 -> satisfiable by yiisoft/yi
i2[2.0.5, 2.0.6, 2.0.7].

Potential causes:
 - A typo in the package name
 - The package is not available in a stable-enough version according to your min
imum-stability setting
   see <https://getcomposer.org/doc/04-schema.md#minimum-stability> for more det
ails.

Read <https://getcomposer.org/doc/articles/troubleshooting.md> for further commo
n problems.

C:\>composer global require "fxp/composer-asset-plugin:~1.1.1"
Changed current directory to C:/Users/ASUS K401L/AppData/Roaming/Composer
./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)
  - Installing fxp/composer-asset-plugin (v1.1.2)
    Downloading: 100%

Writing lock file
Generating autoload files

C:\>composer create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic
 basic
Installing yiisoft/yii2-app-basic (dev-master c8afc49aad4d82273156a155501fe9a1cc
3dd76c)


  [InvalidArgumentException]
  Project directory basic/ is not empty.


create-project [-s|--stability STABILITY] [--prefer-source] [--prefer-dist] [--r
epository REPOSITORY] [--repository-url REPOSITORY-URL] [--dev] [--no-dev] [--no
-plugins] [--no-custom-installers] [--no-scripts] [--no-progress] [--keep-vcs] [
--no-install] [--ignore-platform-reqs] [--] [<package>] [<directory>] [<version>
]


C:\>composer create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic
 basic
Installing yiisoft/yii2-app-basic (dev-master c8afc49aad4d82273156a155501fe9a1cc
3dd76c)
  - Installing yiisoft/yii2-app-basic (dev-master master)
    Downloading: 100%

Created project in basic
Loading composer repositories with package information
Updating dependencies (including require-dev)
Reading bower.json of bower-asset/jquery (2.1.1-RC2)
Could not fetch https://api.github.com/repos/jquery/jquery-dist/commits/c2fdcaaa
cd4d7f8479b2196525330c1738e30cd3, please create a GitHub OAuth token to go over
the API rate limit
Head to https://github.com/settings/tokens/new?scopes=repo&description=Composer+
on+ASUS-PC+2016-03-29+1522
to retrieve a token. It will be stored in "C:/Users/ASUS K401L/AppData/Roaming/C
omposer/auth.json" for future use by Composer.
Token (hidden):
Invalid token provided.
You can also add it manually later by using "composer config github-oauth.github
.com <token>"
Reading bower.json of bower-asset/jquery (2.1.1-RC1)
Could not fetch https://api.github.com/repos/jquery/jquery-dist/contents/bower.j
son?ref=6ba4c8def1f9b0d03c5e8de1d64a78ae36646fb6, please create a GitHub OAuth t
oken to go over the API rate limit
Head to https://github.com/settings/tokens/new?scopes=repo&description=Composer+
on+ASUS-PC+2016-03-29+1523
to retrieve a token. It will be stored in "C:/Users/ASUS K401L/AppData/Roaming/C
omposer/auth.json" for future use by Composer.
Token (hidden):
Invalid token provided.
You can also add it manually later by using "composer config github-oauth.github
.com <token>"
Reading bower.json of bower-asset/jquery (2.1.1-beta1)
Could not fetch https://api.github.com/repos/jquery/jquery-dist/contents/bower.j
son?ref=130f395eb8906e16db8506571f125a6beb28327a, please create a GitHub OAuth t
oken to go over the API rate limit
Head to https://github.com/settings/tokens/new?scopes=repo&description=Composer+
on+ASUS-PC+2016-03-29+1524
to retrieve a token. It will be stored in "C:/Users/ASUS K401L/AppData/Roaming/C
omposer/auth.json" for future use by Composer.
Token (hidden):
Token stored successfully.
Reading bower.json of bower-asset/jquery (1.11.1-RC2)^CTerminate batch job (Y/N)
? Y

C:\>composer create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic
 basic
^CTerminate batch job (Y/N)? y

C:\>composer create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic
 basic
Installing yiisoft/yii2-app-basic (dev-master c8afc49aad4d82273156a155501fe9a1cc
3dd76c)
  - Installing yiisoft/yii2-app-basic (dev-master master)
    Loading from cache

Created project in basic
Loading composer repositories with package information
Updating dependencies (including require-dev)
  - Installing yiisoft/yii2-composer (dev-master 348122d)
    Downloading: 100%

  - Installing ezyang/htmlpurifier (v4.7.0)
    Downloading: 100%

  - Installing bower-asset/jquery (1.11.3)
    Downloading: 100%

  - Installing bower-asset/yii2-pjax (v2.0.6)
    Downloading: 100%

  - Installing bower-asset/punycode (v1.3.2)
    Downloading: 100%

  - Installing bower-asset/jquery.inputmask (3.2.7)
    Downloading: 100%

  - Installing cebe/markdown (dev-master e2a490c)
    Downloading: 100%

  - Installing yiisoft/yii2 (dev-master d44ea56)
    Downloading: 100%

  - Installing swiftmailer/swiftmailer (5.x-dev fffbc0e)
    Downloading: 100%

  - Installing yiisoft/yii2-swiftmailer (dev-master 20775fe)
    Downloading: 100%

  - Installing yiisoft/yii2-codeception (dev-master e01b3c4)
    Downloading: 100%

  - Installing bower-asset/bootstrap (v3.3.6)
    Downloading: 100%

  - Installing yiisoft/yii2-bootstrap (dev-master e64170f)
    Downloading: 100%

  - Installing yiisoft/yii2-debug (dev-master 0817955)
    Downloading: 100%

  - Installing bower-asset/typeahead.js (v0.11.1)
    Downloading: 100%

  - Installing phpspec/php-diff (dev-master 30e103d)
    Downloading: 100%

  - Installing yiisoft/yii2-gii (dev-master 989d6c5)
    Downloading: 100%

  - Installing fzaninotto/faker (dev-master 68c0d74)
    Downloading: 100%

  - Installing yiisoft/yii2-faker (dev-master a8daa97)
    Downloading: 100%

Writing lock file
Generating autoload files
> yii\composer\Installer::postCreateProject
chmod('runtime', 0777)...done.
chmod('web/assets', 0777)...done.
chmod('yii', 0755)...done.

C:\>