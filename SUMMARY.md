## Video Share Solution

Solution to import videos from flub and glorf sources in yaml and json formats.

### Install

Clone repository.
Navigate to the folder and install composer dependencies:

````bash
composer install
````

Make sure `import` and `run-tests` files have execution permission.

### How to use

Open a command line on the folder where the project is and run:

````bash
./import {option}
````

Where the option can be one of the 2 sources available (flub, glorf)

If you have any doubt you can run 

````bash
./import help or ./import h
````

Which will display how to use it.

#####Note:
If we want to run without the ./ in front we need to add the folder to our $PATH.

### How to run the Tests

The tests are in tests/ folder

Done with PHPUnit

To run the test you can execute the run-tests file.

````bash
./run-tests
````

I had a look at the unit testing before but never had the chance to implement them in a professional environment.

##Code

All the code sits inside the src/ folder:

- On the main folder are the models (Video and Tag)
- Libraries Folder:
  - As the name indicates is where the libraries are, classes to interact with the model and the DAO classes.
- DAO Folder:
  - Data access objects. All the classes in charge of the persistence of the models.
    - That hasn't been implemented as it was not asked to, although it has a bit of code to explain what will do in case of it being done.
- Controllers Folder:
  - Classes that manage the extraction of the data and send it to the Libraries to import/process.