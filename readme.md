MacroTracker
====

A logging tool to track calories and macro-nutrients (fat, protein, net carbs). No food databases, no recipes, it's just a logging tool.

###Setup

* Make a MySQL database for this thing to use
* Dump the `tracker.sql` file into your newly created database
* Open the somewhat incompletely-named `./inc/functions.php`
* Edit the database info and login password at the top, change timezone if necessary
* Upload everything to your server
* Go visit the URL, log in, and start logging stuff

That's it!

**Note:** This is not a secure system. It only barely pretends to be secure. These aren't exactly state secrets, I just didn't want spam bots submitting junk.
