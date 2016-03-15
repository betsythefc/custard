#!/bin/bash

OpenLinksDB=(`mysql -u root -p@P@ch312e098 -D custard -e "SELECT link FROM links"`)
Files=(ls ../links | grep [0-9]*.html)
## Remove .html from files ##
