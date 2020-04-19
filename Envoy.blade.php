@servers(['web' => 'juice'])

@task('deploy', ['on' => ['web']])
cd idea-collect
git pull origin master
sudo chmod -R 777 storage/
@endtask
