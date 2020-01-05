
# notifyToMail
This is a library that uses composer as the basis for generating email notifications

# Email Notification Library using phpMailer

## Developing

This library has the function to send email using phpmailer library. Doing this uncomplicated action is essential for any system.

To install the library, run the following command:

```sh
composer require notifyEmail/composer_test
```

To make use of the library, simply require composer autoload, invoke the class, and call the method:

```sh
<? php

require __DIR__.'/vendor/autoload.php';

use Notification\Email;


$email = new Email(2, "mail.host.com", "your@email.com", "your-pass", "smtp secure (tls / ssl)", "port (587)","from@email.com", "From Name");

$email->sendEmail("SUbject", "Content", "reply@email.com", "Replay Name", "address@email.com", "Address Name");
```

Note that all email sending setup is using the magic builder method! Once you invoke the builder method within your application, your system will be able to perform the triggers.

### Developers
* [Jr Souza] - Developer of this library and tutor of the Composer in Practice course!
* [Arthwoks] - Official website software
* [phpMailer] - Lib to send Email

License
----

MIT

** ArthWorks! **

[//]:#
[Jr Souza]: <mailto:contato@arthworks.com.br>
[ArthWorks]: <https://www.arthworks.com.br>
[phpMailer]: <https://github.com/PHPMailer/PHPMailer>

