# __Using php `version 8.0` or lower.__
## **Set Environment**
- Edit `hosts` file and add
    ```
    127.0.0.1   project.pinz
    ```
- Edit `C:\xampp\apache\conf\extra\httpd-vhosts.conf` add
    ```xml
    <VirtualHost project.pinz:8000>
        DocumentRoot "C:\xampp\htdocs\pinz\public"
        ServerAdmin project.pinz
        <Directory "C:\xampp\htdocs\pinz">
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
        </Directory>
    </VirtualHost>
    ```
    Change `C:\xampp\htdocs\pinz` to your project path

- Edit `.env` file change `http://localhost` to `http://project.pinz`
    ```
    APP_URL=http://project.pinz
    ```

## **INSTALL**
- Install node modules
    ```
    cd project/path
    npm install
    ```
- Install php(XAMPP) and composer
    ```
    cd project/path
    composer install
    ```
- Generate artisan key
    ```
    php artisan key:generate
    ```
- Clear artisan cache
    ```
    php artisan cache:clear
    ```
    - If ERROR
        `Whoops, looks like something went wong` Edit file `app/config/app.php` set ``Debug`` to `true`
        ```php
            'debug' => env('APP_DEBUG', 'true')
        ```

    - If `PHP fatal ERROR`: `require(): Failed opening required '/opt/lampp/htdocs/..../vendor/autoload.php` run Command promt (CMD) and run
        ```
        cd /project/path
        composer dump-autoload
        composer update --no-scripts
        composer update
        ```
- Import database.sql to mysql

## **RUN**
```
npm run watch
```
---
---
# ISSUE Fix
- Error `Module not found: Error: Can't resolve 'vuetable-2'`, Open Terminal and run
    ```
    npm install vuetable-2 --save-dev
    ```
- Error `Can not load Module` on file *.vue*, Open file `webpack.mix.js` add `.vue()` to code
    ```php
    mix.js('resources/js/app.js', 'public/js').vue() //<-add .vue() to mix vuejs->
    .sass('resources/sass/app.scss', 'public/css')
    .setPublicPath('webroot');
    ```
- Using browser sync and auto reload, Open terminal and run
    ```
    npm install browser-sync browser-sync-webpack-plugin@^2.3.0 --save-dev --legacy-peer-deps
    ```
    - After install `browser-sync`, Re-run `npm run watch` again
        ```
        npm run watch
        ```
---
## NOTE:
- This project using [_ElaAdmin_](https://technext.github.io/elaadmin/index.html "View ElaAdmin template") template
- Template engine using _Blade_ for laravel   
- Javascript using [_Vue.js_](https://vuejs.org "Go to Vue Website") compile by _Laravel Mix_ and _webpack_
---
# **DevLogs**
- **06/06/2022** Change N_topic,N_detail in public/js/app.js file(modal can't show)
- **05/06/2022** Edit edit news file(not complete)
- **31/05/2022** Save news to database(complete) **insert function in News(model file) 
- **30/05/2022** Save news to database(not complete)
- **16/05/2022** Add website page for show news
- **14/05/2022** Fixed Form EditNewsComponent (Modal can show)
- **10/05/2022** Add EditNewsComponent page (Modal can't show up)
- **09/05/2022** Add News page
- **08/05/2022** Add section title, It will change title by page active.
- **08/05/2022** Add `views/layouts/footer.blade.php` use for footer contents and script tags on footer then include it to `views/layouts/app.blade.php`
- **08/05/2022** Edit `views/layouts/app.blade.php` by cut tag `<head></head>` and add it to `views/layouts/header.blade.php` becouse, head tag exists on running.

---
#### ❤️❤️❤️ X-RAY ❤️❤️❤️  
<span>
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</span>