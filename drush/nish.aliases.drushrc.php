<?php

$aliases['dev'] = array(
  'uri' => 'https://anishnawbek-social.ddev.site',
  'root' => '/var/www/html/html',
);

$aliases['live'] = array(
    'root' => '/srv/www/www.anishnawbek.xyz/html',
    'uri' => 'https://www.anishnawbek.xyz',
    'remote-host' => 'www.anishnawbek.xyz',
    'remote-user' => 'russell',
    'path-aliases' => array(
        '%drush-script' => '/home/russell/.local/bin/drush',
    ),
);
