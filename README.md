###############
# Description
###############
Winadminpassword - Tool for the deployment of unique passwords for Windows and Unix systems. It is based on the serial number of computers and a secret key. The advantage is that no password is stored in a database and you can display them with a GLPI plugin, Webmin...

GLPI Plugin - You can display all generated password based on the serial number of your computers and a secret key. The secret key is in the GLPI database.

###############
# Installation
###############
Prerequisistes :
	* GLPI

Installation : 
	* Extract sources in the plugins directory of your GLPI installation
	* In GLPI, under Configuration/Plugins menu, you can now install and activate the plugin

Configuration :
	* Enter your very secret key, deployed on all your computers
	* Enter the length of your generated passwords
	* Select the alogrithm of your generated password (See README of WinAdminPassword tool for more informations : Default is 1)
	* Select the color of HTML output
	* Select the size of HTML output

# ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
##### Licence
# ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
# WinAdminPassword - A utility to deploy unique passwords for Microsoft Windows and Unix systems. It is based on the serial number of computers and a private key. #
# The advantage is that no password is stored in a database. #
# Copyright (C) 2011 Nicolas BOURGES #
# 
# This program is free software: you can redistribute it and/or modify #
# it under the terms of the GNU General Public License as published by #
# the Free Software Foundation, either version 3 of the License, or #
# (at your option) any later version. #
# 
# This program is distributed in the hope that it will be useful, #
# but WITHOUT ANY WARRANTY. without even the implied warranty of #
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the #
# GNU General Public License for more details. #
#
# You should have received a copy of the GNU General Public License #
# along with this program.  If not, see <http://www.gnu.org/licenses/>. #
# ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
