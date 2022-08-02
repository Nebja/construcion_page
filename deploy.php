<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'git@github.com:Nebja/construcion_page.git');
set('keep_releases', 2);

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('Dev')
    ->setHostname('45.84.206.195')
    ->setForwardAgent(true)
    ->setRemoteUser('u463018380')
    ->setPort(65002)
    ->setIdentityFile('~/.ssh/nebjaeu_id_rsa')
    ->set('deploy_path', '~/domains/nebja.eu/dev');

// Hooks

after('deploy:failed', 'deploy:unlock');
desc('Deploy your project');
task('deployDev', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:clear_paths',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'deploy:symlink',
    'deploy:unlock',
    'push'
]);
