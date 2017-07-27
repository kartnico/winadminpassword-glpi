<?php
/*
 * @version $Id: HEADER 1 2012-12-08 00:12 kartnico $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2010 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 --------------------------------------------------------------------------
// ----------------------------------------------------------------------
// Original Author of file: Nicolas BOURGES
// Purpose of file: plugin winadminpassword v1.1.1 - GLPI 0.84
// ----------------------------------------------------------------------
 */

// Installation function
function plugin_winadminpassword_install() {
        global $DB;

	$migration = new Migration(100);

	if (!TableExists("glpi_plugin_winadminpassword_profiles")) {
		$query_profile= "CREATE TABLE IF NOT EXISTS `glpi_plugin_winadminpassword_profiles` (
	                        `id` int(11) NOT NULL,
	                        `profile` varchar(255) default NULL,
	                        `use` tinyint(1) default 0,
	                        PRIMARY KEY (`id`)
	                ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
	        $DB->queryOrDie($query_profile, $DB->error());

		$migration->migrationOneTable("glpi_plugin_winadminpassword_profiles");

		// Give right to current Profile
		include_once (GLPI_ROOT . '/plugins/winadminpassword/inc/profile.class.php');
		$prof =  new PluginWinadminpasswordProfile();
		$prof->add(array('id'      => $_SESSION['glpiactiveprofile']['id'],
				'profile' => $_SESSION['glpiactiveprofile']['name'],
				'use'     => 1));
	}

	if (!TableExists("glpi_plugin_winadminpassword_configs")) {
		$query = "CREATE TABLE IF NOT EXISTS `glpi_plugin_winadminpassword_configs` (
	                        `id` int(11) NOT NULL auto_increment,
	                        `key` varchar(255) collate utf8_unicode_ci default NULL,
				`length` int(11) default 12,
				`algo` int(11) default 1,
				`size` int(11) default 14,
				`color` varchar(255) collate utf8_unicode_ci,
	                        PRIMARY KEY  (`id`)
	                ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

		$DB->queryOrDie($query, $DB->error());
	}
		
	$migration->executeMigration();	
        return true;
}

// Uninstall function
function plugin_winadminpassword_uninstall() {
        global $DB;

	$tables = array("glpi_plugin_winadminpassword_profiles","glpi_plugin_winadminpassword_configs");
	
	foreach($tables as $table) {
		$DB->query("DROP TABLE IF EXISTS `$table`;");
	}

        return true;
}
