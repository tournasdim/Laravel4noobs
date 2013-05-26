Laravel4noobs 
=============

Laravel is a PHP web application framework with expressive , elegant syntax which  aims to make the development process a pleasing one for the developer without sacrificing application functionality . One of the best ways to learn Laravel is to read through the entirety of its documentation . In addition to the documentation ,  reading the source code of the Framework is a neccesity to understand its internal structure .  If you have already experience with other Frameworks and want to digg into Laravel , my hope is that this project will be a valuable supplement to your learning experience .  My intention is to go straight to the point , with practical examples  . This project is a "work in progress" ,  build during my spare time , just to explore Laravel's functionality . I have to emphasize that I'm not an expert of this Framework and my intention was to share my knowledge with other developers .
##Prerequisites :
This project isn't meant to teach you  PHP development techniques  , neither will it describe concepts like MVC , Designpatterns , TDD or Unit-Testing .It assumes that you already have a good gasp of OOP , Git and Composer  . 
###General overview :
The project is divided into autonomous branches , each branch will implement a totally different architecture to achieve a final result . For instance , branch_x will build a web-site by using routes , branch_y will build the same web-site by using Controllers , branch_z will build  the same web-site by combining Twitter's Bootstrap and Jquery , another branch will build a simple API .....  There is no specific schedule or order when a branch will be released  .
###Description about this branch : 
On this branch , a simple website with a few pages is demonstrated . Logged-in users have the ability to access more pages (which are obviously not accesible by simple visitors) and to send email to the administrator . Logging-in can be done via Basic-Auth or via a form . To improve security Jquery and reCaptcha has been used . A [jquery plugin](http://bassistance.de/jquery-plugins/jquery-plugin-validation/) is used to validate data before it's submitted to the server (email , log-in) . This Jquery plug-in is already installed , so there is no extra work to do . I would highly suggest a [visit to the documentation page](http://docs.jquery.com/Plugins/Validation) of the plugin to explore its many capabilities . On the server , reCaptcha's API is used to verify that the submission was done by a Human . An [extra plugin](https://github.com/greggilbert/recaptcha) is needed to do all the "heavy" workload of reCaptcha's API requests . This plugin  is installed automaticaly , by just running a **composer install** command from the project's root directory . Keep in mind that this plugin needs a couple configurations before it can be used , its GitHub repo gives detailed instructions (see link below). 
Another feature of this project is that it uses an external webservice (postmarkapp.com) to send emails to the administrator . This option is choosen , instead of an local smtp server , because many developers are testing their work on a Windows machne (which has no build-in web-server) . There is a bit of work to be made first , [visit postmarkapp's website](https://postmarkapp.com/) and register for an account . It's a paid service , but you get 10000 free email (which I think is more than enough to get you started) . After the registration proccess , logg-in to postmarkapp's administration pannel and create a "new mail server"  . After a verify proccess (you will receive a link on your email) a private-key will be given to you . This private key must be pasted into your Laravel's **app/config/mail.php** file . 
###Preparing the project in 10-steps :
>Clone this branch into your web-servers directory
>Run a **composer install** command to install the required dependencies
>Run a **php artisan optimize** command (this will generate a compiled.php file into the Bootstrap directory . It will improve the performance of your project)
>create a new database into Mysql 
>Configure **app/config/database.php** with your database credentials
>Run a **php artisan migrate install**
>Run a **php artisan migrate:refresh** and a **php artisan db:seed**
>Register an account on [postmarkapp's site](https://postmarkapp.com/) and configure **app/config/mail.php** wiht your private key (its given to you after your register and verify a mail server ) 
>Register an account on Google's reCaptcha webservice and store the "private and public keys" into a secure place
>Visit [GitHub's repo](https://github.com/greggilbert/recaptcha) (our installed reCaptch plugin) and follow the steps to configure the plugin .

The following screenshot was taken on my Windows machine , it demonstrates the final result . 
![An example ](https://dl.dropboxusercontent.com/s/rjhn2gzmax1nxmi/laravel_screenshot.png)

###Notes : 
This branch was entirely build by using Routes with Closures instead of Controllers with Actions . Routes allow us to map our framework URL's to closures , which is a very clean way of containing our logic without all of the "class fluff". Although this approach is effective for small projects (10-20 pages) , this desing-model will become inefficient and difficult to maintain when a webapplication demands a more bussness oriented model . It's highly discouraged to place all your project's logic into one file (routes.php) as it will create a bloated file whose code isn't maintenable , testable ,  reusable and extensible . Here is where Controllers / Actions are the masters of the  game . Most likely , a future branch of this project will be build by using a Controller / Action design-model . 

###Where to get help :
Open a new [issue on this repository](https://github.com/tournasdim/Laravel4noobs/issues) and I'll try to help . Please limit your question(s) only to issues related to this project . Laravel's [forums](http://forums.laravel.io/) / [IRC](http://laravel.com/irc) are more suited places to get general information about the Framework . 
Reports about bugs are welcome , but also , I would be glad to hear about your experience and suggestions of this repository . 

###Special thanks to :
Of course the creator of this Framework (Taylor Otwell) and all active members of Laravel's forum / IRC channel . The stylesheet of this branch was copied from another [GitHub laravel project](https://github.com/laravelbook/laravel_auth/blob/master/public/css/style.css) 

###Tools used during development :
>An headless  Linux box  (CentOs 6) as web-server (Apache 2 , PHP5.4) 
>Sublime Text 2 (Free version)
>Phing for automated  deployment to  GitHub and for FTP to the Linux box 
>Git-Bash  for versioning of the code 
>Windows  7  with WAMP stack (Apache2.2.2 , PHP5.4.3)

###License :
>
> Laravel4noobs 
> 
> [My Blog](http://tournasdimitrios1.wordpress.com)
>  
>  @copyright Tournas Dimitiros 2013
>
> 
> This program is free software: you can redistribute it and/or modify
> it under the terms of the GNU General Public License as published by
> the Free Software Foundation, either version 3 of the License, or
>(at your option) any later version.
> 
>This program is distributed in the hope that it will be useful,
>but WITHOUT ANY WARRANTY; without even the implied warranty of
>MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
>GNU General Public License for more details.
> 
>You should have received a copy of the GNU General Public License
>along with this program.  If not, see <http://www.gnu.org/licenses/>.
>  
>@author Tournas Dimitrios <tournasdimitrios@gmail.com>
>@version 0.3
>
>
> 
  

