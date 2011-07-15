cd C:/xampp/php
call go-pear.bat
call pear-update.bat
call pear clear-cache
call pear channel-discover pear.phpunit.de
call pear channel-discover components.ez.no
call pear channel-discover pear.symfony-project.com
call pear upgrade-all
call pear install --nodeps XML_RPC2
call pear install phpunit/PHPUnit
call pear upgrade-all
call pear clear-cache
call pear install --alldeps --force phpunit/PHPUnit


