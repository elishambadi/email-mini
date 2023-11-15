# email-mini
To start:
1. Install xampp [Xampp Download](https://www.apachefriends.org/download.html) or PHP, if you don't already have them
1. Ensure the project is in your xampp/htdocs/email-mini folder
1. Open a command terminal and install dependencies using `composer install`. Incase you don't have composer you can install it using php. [How to Install Composer](https://www.hostinger.com/tutorials/how-to-install-composer)
1. Update the correct gmail(current smtp server) credentials in submit_form.php
```
$mail->Username   = '{email-address}';
$mail->Password   = '{password}';  
```
5. Open email.html and try out the form!
