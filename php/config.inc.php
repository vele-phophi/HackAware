<?php
/* phpMyAdmin configuration */

$cfg['blowfish_secret'] = 'hackawareSecretKey123'; // Use any random string here

$i = 0;
$i++;
$cfg['Servers'][$i]['auth_type'] = 'config'; // Use 'cookie' if you want login prompt
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = ''; // Leave empty if no password
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = true;

/* UI and display settings */
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';
