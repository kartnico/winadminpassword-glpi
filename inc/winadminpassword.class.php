<?php
/*
 * @version $Id: HEADER 1 2012-12-08 03:30 kartnico $
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

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}

class PluginWinadminpasswordWinadminpassword extends CommonDBTM {

	static function canView() {
		global $DB;

		$profile = new PluginWinadminpasswordProfile();
                $profile->getFromDB($_SESSION['glpiactiveprofile']['id']);
		$use = $profile->fields['use'];
		if ($use == "1") {
			return true;
		} else {
			return false;
		}		
	}

	static function displayTabContentForItem(CommonGLPI $item, $tabnum=1, $withtemplate=0) {
                if ($item->getType() == 'Computer') {
                        $prof = new self();
                        $serial = $item->getField('serial');
                        // j'affiche le formulaire
                        $prof->menu($serial);
                }
		elseif ($item->getType() == 'Printer') {
                        $prof = new self();
                        $serial = $item->getField('serial');
                        // j'affiche le formulaire
                        $prof->menu($serial);
                }
		elseif ($item->getType() == 'NetworkEquipment') {
                        $prof = new self();
                        $serial = $item->getField('serial');
                        // j'affiche le formulaire
                        $prof->menu($serial);
                }
                return true;
        }

	function getTabNameForItem(CommonGLPI $item, $withtemplate=0) {
                if ($item->getType() == 'Computer') {
                        return "WinAdminPassword";
                }
		elseif ($item->getType() == 'Printer') {
                        return "WinAdminPassword";
                }
		elseif ($item->getType() == 'NetworkEquipment') {
                        return "WinAdminPassword";
                }
                return '';
        }

	function menu(CommonGLPI $serial,$withtemplate='') {
		global $LANG,$DB,$PLUGIN_HOOKS,$CFG_GLPI;

		$config = new PluginWinadminpasswordConfig();
		$config->getFromDB(1);

		$key = $config->fields['key'];
		$length = $config->fields['length'];
		$size = $config->fields['size'];
		$color = $config->fields['color'];
		$algo = $config->fields['algo'];

		switch ($algo) {
			case 1:
				$hash = "$key.$serial";
				break;
			case 2:
				$hash = "$serial$key";
				break;
			case 3:
				$hash = "$serial$key$serial";
				break;
			case 4:
				$hash = "$key$serial$key";
				break;
			case 5:
				$hash = "$key$serial";
				break;
			default:
				$hash = "$key.$serial";
		}

		# Encoding in sha1 base 64
		$digest = base64_encode(sha1($hash, true));

		$password = substr($digest, 0, $length);

		# Delete "/" and "&" characters
		$password = str_replace("/", "-", $password);
		$password = str_replace("\\", "!", $password);
		$password = str_replace("&", "+", $password);

		if ($this->canView()) {
			if (($serial)||($serial=='0')) {
				echo "<div align='center'><table class='tab_cadre'><tr><th>".$LANG['plugin_winadminpassword'][2]."</th></tr>";
				echo "<tr><td class='tab_bg_2' align='center'><font color='$color' size='$size' face='Century'>$password</font></td></tr>";
				echo "</table>";
				echo "</div>";
			}
			else {
				echo "<div align='center'><table class='tab_cadre'><tr><th>".$LANG['plugin_winadminpassword'][3]."</th></tr>";
                                echo "<tr><td class='tab_bg_2' align='center'>".$LANG['plugin_winadminpassword'][4]."</td></tr>";
                                echo "</table>";
                                echo "</div>";
			}
		}

	}
}
?>
