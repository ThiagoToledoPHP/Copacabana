# Copacabana [![Build Status](https://travis-ci.org/ThiagoToledoPHP/Copacabana.svg?branch=master)](https://travis-ci.org/ThiagoToledoPHP/Copacabana)  [![Code Climate](https://codeclimate.com/github/ThiagoToledoPHP/Copacabana/badges/gpa.svg)](https://codeclimate.com/github/ThiagoToledoPHP/Copacabana)
This is a Light Stalk [Composer](https://getcomposer.org/) Framework Class project.

By [definition](https://pt.wikipedia.org/wiki/Framework) , a framework is a set of codes that dictates the application of flow control.

Based on this I created a class that has the main purpose of enabling you to create a basic framework for PHP projects , allowing simple way you can better organize the logic of your application , supporting , including the use of the [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) approach.

**Installing**

To get started, simply use the composer to import the class to your project. You can [view here](https://packagist.org/packages/thiagotoledo/copacabana) Packagist page design , and soon , there were releases so you can do it more safely . 
For now you can go have fun , experimenting on study projects.

**Use**

In the examples project folder, you can get ideas on how to use the project simply and quickly. In summary we can list the steps:

1. Create the mod_rewrite file in the root of your project. You can see an example [this link](https://github.com/ThiagoToledoPHP/Copacabana/blob/master/examples/example1/.htaccess) project;
2. Add a index file to call the Copacabana class. You can see [a example here](https://github.com/ThiagoToledoPHP/Copacabana/blob/master/examples/example1/index.php).
3. By default (you can change this), you should create a directory called app and within one Controllers directory. There the two standard classes must be created, a call [NotFound.php](https://github.com/ThiagoToledoPHP/Copacabana/blob/master/examples/example1/app/Controllers/NotFound.php) and another called [Index.php](https://github.com/ThiagoToledoPHP/Copacabana/blob/master/examples/example1/app/Controllers/Index.php). Within the classes you must create a public method called main, which will be the initial method that will be called in the implementation of the class;
4. Review your composer.json ([Autoload PSR-4](http://www.php-fig.org/psr/psr-4/)). If you need, [see this example](https://github.com/ThiagoToledoPHP/Copacabana/blob/master/composer.json).
5. Now just enter the address of your project: At the root of the Index.php class will be called. If you add some information over the NotFound.php class will be called;
6. Great! You now can create your own classes. By default, the name of the class follows the standard [CamelCase](http://searchsoa.techtarget.com/definition/UpperCamelCase), keeping the capital letter at the beginning of the files and the names of classes. Do not forget the main and good fun method. :)

###Detail documentation
Access information about all class public methods **[click here](https://rawgit.com/ThiagoToledoPHP/Copacabana/master/docs/index.html)** or access with browser the docs directory.

**Important**
_This is the beginning of the project , hope you enjoy and use is only for now study projects, ok? Thank you_