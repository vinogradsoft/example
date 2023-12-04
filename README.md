# Example

This is an example from the [Simple-files](https://github.com/vinogradsoft/simple-files) library user manual. The
description of the example can be read in the
section ["Applied Methods"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-en/applied-methods.md)

## Install

Requires PHP 8.0 or newer.

- Clone the project onto your computer.
- In the root of the project, run the command

``` 
composer install 
```

## Launch

To run the command described in any of the sections, go to the `bin` folder of the downloaded project in the console:

```
cd path/to/cloned/example/bin/
```

Where `path/to/cloned` is the folder where you downloaded the example.

### Section ["Copying directories"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-en/copying-directories.md)

You can create new modules with the command `php copy -v=<Vendor Name> -m=<Module Name>`.
Calling the command again with the same parameters will overwrite the `package.xml` and `composer.json` files in the
module.

### Section ["Writing directories"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-en/writing-directories.md)

You can create a test class with the command `php writeTo -c="<Class Name>"`.
Calling the command again with the same parameters will overwrite the previously created test class.

Example for `\VendorName\ModuleName\Model\Model` that exists in the project:

```
php writeTo -c="\VendorName\ModuleName\Model\Model"
```

### Section ["Moving directories"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-en/moving-directories.md)

To move an image from a module `VendorName/ModuleName` that does not have a 2 in its name to the `example/public/images`
folder, you can run the command:

```
php move -v="VendorName/ModuleName" -p="*[!2].png"
```

### Section ["Removing directories"](https://github.com/vinogradsoft/simple-files/blob/master/docs/guide-en/removing-directories.md)

To clear the cache, run the command:

```
php delete
```

## License

The MIT License (MIT). Please see License [File](LICENSE) for more information.
