# PHP test
## REQUIREMENTS
- PHP version 8.0 or newer
  * Composer version 2.7.7 included on project root `composer.phar`
- MariaDB 10.4 or newer
  * optional: user docker

## SETUP
1. Install the requirements
2. Excute the .sql file from 
3. From the root of the project, Run in terminal / CLI
   ```
   chmod 755 ./composer.phar

   ./composer.phar install && ./composer dump-autoload

   php -S localhost:9000 -t public
   ```

4. go to browser http://localhost:9000/

## NOTES
- The developer used `-t` flag on running the php server to ensure the security of the files will not be exposed to public, basically the `public` directory is only accessible to outside.
- PHP 8.0 is required for modern features like nullsafe operator, security fixes, and performance improvements. [refer: https://www.php.net/releases/8.0/en.php]
- Composer was used for package management and PSR-4 autoloading.
- Use `.env` to prevent sensitive data / credentials tracked by git.
- Utilize PHP Type Declaration for type hinting and fail fast.