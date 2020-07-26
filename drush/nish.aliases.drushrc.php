<?php

$aliases['dev'] = array(
  'uri' => 'https://anishnawbek-social.ddev.site',
  'root' => '/var/www/html/html',
);

$aliases['live'] = array(
  'uri' => 'https://www.anishnawbek.xyz',
  'remote-host' => 'www.anishnawbek.xyz',
  'remote-user' => 'russell',
  'root' => '/srv/www/www.anishnawbek.xyz/html',
  'path-aliases' => array(
      '%drush' => '/home/russell/.local/bin/drush',
  ),
);
