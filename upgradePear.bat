cd C:/xampp/php
call go-pear.bat
call pear clear-cache
call pear channel-discover pear.phpunit.de
call pear channel-discover components.ez.no
call pear channel-discover pear.symfony-project.com
call pear install phpunit/PHPUnit


