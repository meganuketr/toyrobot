###TOY ROBOT###

In order to run this program you must first clone the repository:

git@github.com:meganuketr/toyrobot.git

I created it as a class that can be used anywhere, and then created a RobotController.php program that will run from the CLI. This can be replaced by a controller in any framework with little effort.

usage:

php RobotController.php commandFile.

3 command files are included wich contains the provided test data
Also a few tests were created with phpunit

If you have phpunit in your computer and in your path no additional steps are needed, otherwise if you want to run the tests you might need to install it.

The rotation functionality was abstracted into 1 function, using an ordered array with 4 cardinal points. That way if in the future is required that robot moves diagonally, it will work by only adding more cardinal points eg: "NORT-EAST" and changing the MAXCARDINALPOINT constant.

The program is not deffensive. it does not catch exceptions, it does not check for errors, the class does not validate the amount of Rows or Cols. etc. 

