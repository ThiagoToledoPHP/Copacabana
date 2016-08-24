# Copacabana
This is a Light Stalk [Composer](https://getcomposer.org/) Framework Class project.

By [definition](https://pt.wikipedia.org/wiki/Framework) , a framework is a set of codes that dictates the application of flow control.

Based on this I created a class that has the main purpose of enabling you to create a basic framework for PHP projects , allowing simple way you can better organize the logic of your application , supporting , including the use of the [MVC](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) approach.

**Installing**

To get started, simply use the composer to import the class to your project. You can [view here]((https://packagist.org/packages/thiagotoledo/copacabana)) Packagist page design , and soon , there were releases so you can do it more safely . 
For now you can go have fun , experimenting on study projects.

**Use**

In the examples project folder, you can get ideas on how to use the project simply and quickly. In summary we can list the steps:

1 - Create the mod_rewrite file in the root of your project. You can see an example [this link] project;

2 - By default (you can change this), you should create a directory called app and within one Controllers directory. There the two standard classes must be created, a call NotFound.php and another called Index.php. Within the classes you must create a public method called main, which will be the initial method that will be called in the implementation of the class;

3 - Now just enter the address of your project: At the root of the Index.php class will be called. If you add some information over the NotFound.php class will be called;

4 - Now you can create your own classes. By default, the name of the class follows the standard CamelCase, keeping the capital letter at the beginning of the files and the names of classes. Do not forget the main and good fun method. :)

**Important**
_This is the beginning of the project , hope you enjoy and use is for now only ok study projects? Thank you_