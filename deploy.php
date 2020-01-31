<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'ShopCo');


// Project repository
set('repository', 'git@github.com:morganchorlton3/ShopCo.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', [
    'storage',
    'public/products',
    'node_modules',
]);

// Writable dirs by web server 
add('writable_dirs', [
    'public/products',
]);


// Hosts

host('134.209.184.49')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('deploy_path', '/var/www/html/shopco.morganchorlton.me');     
    
// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
//    'artisan:migrate',
    'artisan:view:clear',
    'artisan:cache:clear',
    'artisan:config:cache',
//    'artisan:route:cache',
//    'artisan:optimize',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);


desc('Publish npm');
/*task('npm', function () {
    //run('cd {{release_path}} && npm install');
    run('cd {{release_path}} && npm run prod');
});

after('deploy', 'npm');*/

task('composer', function () {
    //run('cd {{release_path}} && npm install');
    run('cd {{release_path}} && composer du');
});

after('deploy', 'composer');

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
// Migrate database before symlink new release.
//before('deploy:symlink', 'artisan:migrate');