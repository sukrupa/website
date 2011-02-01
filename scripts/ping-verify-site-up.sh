#!/bin/bash

site_to_fetch=$1

wget -q --spider http://$site_to_fetch/ || exit 1

expected_text_on_site='Proudly powered by WordPress.'
test  `wget -qO- http://$site_to_fetch | grep  "$expected_text_on_site" | wc -l ` == 1 || ( echo 'Site not displaying expected content.';  exit 1 )

echo 'site up OK and seems to be hosting expected content'