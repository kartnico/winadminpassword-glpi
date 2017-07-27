<?php
/*
 * @version $Id: HEADER 1 2012-12-08 00:12 Kartnico $
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

// Init the hooks of the plugins -Needed
function plugin_init_winadminpassword() {
	global $PLUGIN_HOOKS;

	$PLUGIN_HOOKS['csrf_compliant']['winadminpassword'] = true;
	$PLUGIN_HOOKS['change_profile']['winadminpassword'] = array('PluginWinadminpasswordProfile','changeProfile');

	Plugin::registerClass('PluginWinadminpasswordProfile', array('addtabon' => array('Profile')));
	Plugin::registerClass('PluginWinadminpasswordWinadminpassword', array('addtabon' => array('Computer')));
	Plugin::registerClass('PluginWinadminpasswordWinadminpassword', array('addtabon' => array('Printer')));
	Plugin::registerClass('PluginWinadminpasswordWinadminpassword', array('addtabon' => array('NetworkEquipment')));

	if (Session::haveRight('config','w')) {
		$PLUGIN_HOOKS['config_page']['winadminpassword'] = 'front/config.form.php';
	}

}

// Get the name and the version of the plugin - Needed
function plugin_version_winadminpassword() {
	return array (
		'name' => 'WinAdminPassword',
		'version' => '1.1.1',
		'author'=>'Nicolas BOURGES',
		'license' => 'GPLv3',
		'homepage'=>'https://forge.indepnet.net/projects/show/winadminpassword',
		'minGlpiVersion' => '0.84',// For compatibility / no install in version < 0.84
	);
}

// Optional : check prerequisites before install : may print errors or add to message after redirect
function plugin_winadminpassword_check_prerequisites() {
	if (version_compare(GLPI_VERSION,'0.84','lt') || version_compare(GLPI_VERSION,'0.85','gt')) {
		echo "This plugin requires GLPI >= 0.84 and GLPI < 0.85";
		return false;
	}
	return true;
}

// Uninstall process for plugin : need to return true if succeeded : may display messages or add to message after redirect
function plugin_winadminpassword_check_config($verbose=false) {
	if (true) { // Your configuration check
		return true;
	}
	if ($verbose) {
		echo 'Installed / not configured';
	}
	return false;
}

?>
