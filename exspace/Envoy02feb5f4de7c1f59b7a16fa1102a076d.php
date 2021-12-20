<?php $__container->servers(['web' => ['exspace.chickenkiller.com']]); ?>

<?php $__container->startTask(‘deploy’, [‘on’ => ‘production’]); ?>
cd /home/deploybot
sail artisan down
git reset —hard HEAD
git pull origin master
sail composer.phar install
sail composer.phar dump-autoload
sail artisan migrate —force
sail artisan up
<?php $__container->endTask(); ?>
