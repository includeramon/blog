# blog
A simple bloging site using CodeIgniter.
Features:
  - login through google sign in api
  - create/edit posts using markdown (http://parsedown.org/)
  - remove posts
 
Features to do:
  - make it SPA(Single Page application)
  - add in the edit page the renderd markdown view. Right now, it just adds directly and rendered on the user dashboard
  - improve layouts
  - Pagination on Main page
  - Pagination on Users Page
  
  
Stack: 
  - MySql <-> CodeIgniter <-> JQUERY(TODO)
  
How to deploy: 
  A.)Server - This was brought up using Ubuntu 14.0 with apache2 and mysql. Instance brought up using Virtual Box and a Mac Host.
     1.)Download vbox https://www.virtualbox.org/wiki/Downloads
     2.)Download ubuntu http://releases.ubuntu.com/14.04/ and install in vbox
     2.)Setup LAMP in ubuntu: https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-
        14-04
        
     This project is configured using 'http://ramon1.nip.io/' base domain because google api does not allow private IPs, so hitched some 
     random fakedomain service(nip.io), so please update this property in the config file at application/config/config.php to whatever you 
     set that the browser can see. In my setup:
        - update my virtual box(ubnuntu) in the vbox gui , to add NAT and a HOST only interface
        - in the ubuntu instance, update /etc/network/interfaces file:
        
          auto lo
          iface lo inet loopback

          # The primary network interface
          auto eth0
          iface eth0 inet dhcp

          auto eth1
          iface eth1 inet static
              address 192.168.56.67
              netmask 255.255.255.0
              network 192.168.56.0
              broadcast 192.168.56.255
              
          then restart networking by : 
          sudo ifdown eth1
          sudo ifup eth1
          
        - In my host machine(mac), updated /etc/hosts file:
          127.0.0.1       localhost
          255.255.255.255 broadcasthost
          192.168.56.67 ramon1.nip.io
          ::1             localhost
          Then from the browser, I can access the site using "http://ramon1.nip.io"
          
  B.)Configure Apache to add .htaccess(use file in the project)(to remove the index.php prefixes of Codeigniter): 
        https://www.digitalocean.com/community/tutorials/how-to-set-up-mod_rewrite-for-apache-on-ubuntu-14-04
        
  C.)Integrate google sign in using https://www.formget.com/codeigniter-google-oauth-php/ and register the call back(you may need to 
      update the domain name) - mine is "http://ramon1.nip.io/login/gcallback"
      
  D.)Configure MySQL with the following database properties:
        'hostname' => '192.168.56.67', //change this to what ever set in step A
  	    'username' => 'blog-user',
      	'password' => '8zsphinx',
	      'database' => 'BLOG',
  E.)Import the data to mysql(use BLOG.sql in the project)
    
  D.)Codeigniter have problems in sessions accross redirects, this fixed my instance:
        http://billpatrianakos.me/blog/2013/03/22/codeigniter-session-problems/
        
 Thanks!

     
    
