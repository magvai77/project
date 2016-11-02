VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"

  # Disable the new default behavior introduced in Vagrant 1.7, to
  # ensure that all Vagrant machines will use the same SSH key pair.
  # See https://github.com/mitchellh/vagrant/issues/5005
  config.ssh.insert_key = false

  config.vm.network "forwarded_port", guest: 80, host: 8082
  config.vm.network "private_network", ip: "192.168.50.5"
  config.vm.hostname = "myproject.local"
  config.vm.synced_folder ".", "/var/www/html", {:mount_options => ['dmode=755','fmode=755']}
  config.vm.provision :shell, :path => "bootstrap.sh"

end

