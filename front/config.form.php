<?php
/*
 * @version $Id: HEADER 1 2012-12-08 03:32 kartnico $
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

include ('../../../inc/includes.php');
include_once ("../inc/config.class.php");

Session::checkRight("config","w");

// Mainly usefull if not actived
Plugin::load('winadminpassword',true);

$config = new PluginWinadminpasswordConfig;

Html::Header($LANG['plugin_winadminpassword']['config'][1],'',"plugins","winadminpassword");

if (isset($_POST["add"])) {
	if ($config->canCreate()) {
		$config->add($_POST);
	}
	Html::redirect($_SERVER['HTTP_REFERER']);
} else if (isset($_POST["update"])) {
	if ($config->canCreate()) {
		$config->update($_POST);
	}
	Html::redirect($_SERVER['HTTP_REFERER']);
} else {
	echo "<div align='center'>".$LANG['plugin_winadminpassword']['config'][1]."</div>";
	$config->showForm(1);
}

Html::Footer();

?>
