
# NotifyToMail

[![Maintainer](http://img.shields.io/badge/maintainer-@juniorcorpse-blue.svg?style=flat-square)](https://twitter.com/ArthWorks)
[![Source Code](http://img.shields.io/badge/source-juniorcorpse/notifytomail-blue.svg?style=flat-square)](https://github.com/juniorcorpse/notifytomail)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/juniorcorpse/notifytomail.svg?style=flat-square)](https://packagist.org/packages/juniorcorpse/notifytomail)
[![Latest Version](https://img.shields.io/github/release/juniorcorpse/notifytomail.svg?style=flat-square)](https://github.com/juniorcorpse/notifytomail/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/juniorcorpse/notifytomail.svg?style=flat-square)](https://scrutinizer-ci.com/g/juniorcorpse/notifytomail)
[![Quality Score](https://img.shields.io/scrutinizer/g/juniorcorpse/notifytomail.svg?style=flat-square)](https://scrutinizer-ci.com/g/juniorcorpse/notifytomail)
[![Total Downloads](https://img.shields.io/packagist/dt/juniorcorpse/notifytomail.svg?style=flat-square)](https://packagist.org/packages/juniorcorpse/notifytomail)

This is a library that uses composer as the basis for generating email notifications

Você pode saber mais **[clicando aqui](https://www.arthworks.com.br/)**.

# Email Notification Library using phpMailer

## Developing

This library has the function to send email using phpmailer library. Doing this uncomplicated action is essential for any system.

To install the library, run the following command:

```sh
composer require juniorcorpse/notifytomail
```

To make use of the library, simply require composer autoload, invoke the class, and call the method:

```sh
<? php

require __DIR__.'/vendor/autoload.php';

use JuniorCorpse\NotifyToMail\Email;


$email = new Email(
            2,
            "mail.host.com",
            "your@email.com",
            "your-pass",
            "smtp secure (tls / ssl)",
            "port (587)");

$email->boot(
        	"SUbject"
        	"<p>"Content"</b></p>",
        	"reply@email.com",
        	"Replay Name"
            )->sendEmail("address@email.com", "Address Name");
```

Note that all email sending setup is using the magic builder method! Once you invoke the builder method within your application, your system will be able to perform the triggers.

### Developers
* [Jr Souza] - Developer of this library and tutor of the Composer in Practice course!
* [Arthwoks](https://www.arthworks.com.br) - Official website software
* [phpMailer] - Lib to send Email


License
----

MIT

**ArthWorks!**

[//]:#
[Jr Souza]: <mailto:contato@arthworks.com.br>
[ArthWorks]: <https://www.arthworks.com.br/>
[phpMailer]: <https://github.com/PHPMailer/PHPMailer>

