@servers(['web' => 'juice'])

@task('deploy', ['on' => ['web']])
cd idea-collect
git pull origin master
php artisan lighthouse:clear-cache
sudo chmod -R 777 storage/
@endtask
