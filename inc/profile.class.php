<?php
/*
 * @version $Id: HEADER 14684 2012-12-08 03:31:40 kartnico $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2011 by the INDEPNET Development Team.

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

class PluginWinadminpasswordProfile extends CommonDBTM {

	static function canView() {
                return Session::haveRight('profile','r');
        }

        static function canCreate() {
                return Session::haveRight('profile','w');
        }

	static function cleanProfiles(Profile $prof) {
		$plugprof = new self();
		$plugprof->delete(array('id'=>$prof->getField("id")));
	}
	
	static function changeprofile() {
                $tmp = new self();
                if ($tmp->getFromDB($_SESSION['glpiactiveprofile']['id'])) {
                        $_SESSION["glpi_plugin_winadminpassword_profile"] = $tmp->fields;
                } else {
                        unset($_SESSION["glpi_plugin_winadminpassword_profile"]);
                }
        }

	static function displayTabContentForItem(CommonGLPI $item, $tabnum=1, $withtemplate=0) {
                if ($item->getType() == 'Profile') {
                        $prof = new self();
                        $ID = $item->getField('id');
			$name = $item->getField('name');
                        // si le profil n'existe pas dans la base, je l'ajoute
                        if (!$prof->GetfromDB($ID)) {
                                $prof->createAccess($ID,$name);
                        }
                        // j'affiche le formulaire
                        $prof->showForm($ID);
                }
                return true;
        }

	function getTabNameForItem(CommonGLPI $item, $withtemplate=0) {
                if ($item->getType() == 'Profile') {
                        return "WinAdminPassword";
                }
                return '';
        }

        function createAccess($ID,$name) {
		$this->add(array('id' => $ID,'profile' => $name));
        }

	function showForm($id, $options=array()) {
		global $LANG;

		$target = $this->getFormURL();
		if (isset($options['target'])) {
			$target = $options['target'];
		}

		if (!Session::haveRight("profile","r")) {
			return false;
		}

		$canedit = Session::haveRight("profile", "w");
		$prof = new Profile();
		if ($id){
			$this->getFromDB($id);
			$prof->getFromDB($id);
		}

		echo "<form action='".$target."' method='post'>";
		echo "<table class='tab_cadre_fixe'>";
		echo "<tr><th colspan='2' class='center b'>".
		$LANG['plugin_winadminpassword']['profile'][1]."</th></tr>";
	
		echo "<tr class='tab_bg_1'>";
		echo "<td>".$LANG['plugin_winadminpassword']['profile'][2]."&nbsp;:</td><td>";
		Dropdown::showYesNo("use", $this->fields["use"]);
		echo "</td></tr>\n";
	
		if ($canedit) {
			echo "<tr class='tab_bg_1'>";
			echo "<td colspan='2' class='center'>";
			echo "<input type='hidden' name='id' value=$id>";
			echo "<input type='submit' name='update_user_profile' value=\""._sx('button','Update')."\" class='submit'>&nbsp;";
			echo "</td></tr>\n";
		}
		echo "</table>";
		Html::closeForm();
	}
}
?>
