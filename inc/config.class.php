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

class PluginWinadminpasswordConfig extends CommonDBTM {
	
	static function canCreate() {
		return Session::haveRight("config", "w");
	}

	static function canView() {
		return Session::haveRight("config", "r");
	}
   
	function showForm ($ID) {
		global $LANG;

		if ($ID>0) {
			$spotted = true;
			$this->getFromDB(1);
		} else {
			$spotted = true;
			$this->getEmpty();
		}

		echo "<div align='center'>";
		echo "<form method='post' action='".$this->getFormURL()."'>";
		echo "<table class='tab_cadre' cellpadding='5'>";
		echo "<tr><th colspan='2'>".$LANG['plugin_winadminpassword']['config'][2]."</th></tr>";
		echo "<tr class='tab_bg_2'>";
		echo "<td>".$LANG['plugin_winadminpassword']['config'][3]."</td><td>";

		if ($this->getFromDB(1))
			echo "<input type='password' autocomplete='off' name='key' id='key' value='".$this->fields["key"]."'>";
		else
			echo "<input type='password' autocomplete='off' name='key' id='key'>";

		echo "<input type='hidden' name='id' value=\"1\">";
		echo "<input type='hidden' name='length' value=\"12\">";
		echo "</td>";
		echo "</tr>";
		echo "<tr class='tab_bg_2'>";
		echo "<td>".$LANG['plugin_winadminpassword']['config'][4]."</td><td>";

		echo "<select name='length' id='length'>";
		if ($this->getFromDB(1))
			echo "<option selected value='".$this->fields["length"]."'>".$this->fields["length"]."</option>";
		echo "<option value'1'>1</option>";
		echo "<option value'2'>2</option>";
		echo "<option value'3'>3</option>";
		echo "<option value'4'>4</option>";
		echo "<option value'5'>5</option>";
		echo "<option value'6'>6</option>";
		echo "<option value'7'>7</option>";
		echo "<option value'8'>8</option>";
		echo "<option value'9'>9</option>";
		echo "<option value'10'>10</option>";
		echo "<option value'11'>11</option>";
		echo "<option value'12'>12</option>";
		echo "<option value'13'>13</option>";
		echo "<option value'14'>14</option>";
		echo "<option value'15'>15</option>";
		echo "<option value'16'>16</option>";
		echo "<option value'17'>17</option>";
		echo "<option value'18'>18</option>";
		echo "<option value'19'>19</option>";
		echo "<option value'20'>20</option>";
		echo "<option value'21'>21</option>";
		echo "<option value'22'>22</option>";
		echo "<option value'23'>23</option>";
		echo "<option value'24'>24</option>";
		echo "<option value'25'>25</option>";
		echo "<option value'26'>26</option>";
		echo "<option value'27'>27</option>";
		echo "</select>";
                echo "</td>";
                echo "</tr>";

		echo "</td>";
                echo "</tr>";
                echo "<tr class='tab_bg_2'>";
                echo "<td>".$LANG['plugin_winadminpassword']['config'][5]."</td><td>";
                echo "<select name='algo' id='algo'>";
                if ($this->getFromDB(1))
                        echo "<option selected value='".$this->fields["algo"]."'>".$this->fields["algo"]."</option>";
                echo "<option value'1'>1</option>";
                echo "<option value'2'>2</option>";
                echo "<option value'3'>3</option>";
                echo "<option value'4'>4</option>";
                echo "<option value'5'>5</option>";
                echo "</select>";
                echo "</td>";
                echo "</tr>";
		
		echo "</td>";
                echo "</tr>";
                echo "<tr class='tab_bg_2'>";
                echo "<td>".$LANG['plugin_winadminpassword']['config'][6]."</td><td>";
                echo "<select name='size' id='size'>";
                if ($this->getFromDB(1))
                        echo "<option selected value='".$this->fields["size"]."'>".$this->fields["size"]."</option>";                
		echo "<option value'1'>1</option>";
		echo "<option value'2'>2</option>";
                echo "<option value'3'>3</option>";
                echo "<option value'4'>4</option>";
                echo "<option value'5'>5</option>";
                echo "<option value'6'>6</option>";
                echo "<option value'7'>7</option>";
                echo "<option value'8'>8</option>";
                echo "<option value'9'>9</option>";
                echo "<option value'10'>10</option>";
                echo "</select>";
                echo "</td>";
                echo "</tr>";

		echo "</td>";
                echo "</tr>";
                echo "<tr class='tab_bg_2'>";
                echo "<td>".$LANG['plugin_winadminpassword']['config'][7]."</td><td>";
                echo "<select name='color' id='color'>";
                if ($this->getFromDB(1))
                        echo "<option selected value='".$this->fields["color"]."'>".$this->fields["color"]."</option>";
                echo "<option value'orange'>".$LANG['plugin_winadminpassword']['config'][8]."</option>";
                echo "<option value'red'>".$LANG['plugin_winadminpassword']['config'][9]."</option>";
                echo "<option value'green'>".$LANG['plugin_winadminpassword']['config'][10]."</option>";
                echo "<option value'black'>".$LANG['plugin_winadminpassword']['config'][11]."</option>";
                echo "<option value'white'>".$LANG['plugin_winadminpassword']['config'][12]."</option>";
		echo "<option value'blue'>".$LANG['plugin_winadminpassword']['config'][13]."</option>";
                echo "</select>";
                echo "</td>";
                echo "</tr>";		

		if (!$this->getFromDB(1)) {
			echo "<tr>";
			echo "<td class='tab_bg_2 top' colspan='2'>";
			echo "<div align='center'><input type='submit' name='add' value=\""._sx('button','Add')."\" class='submit'></div>";
			echo "</td>";
			echo "</tr>";
		} else {
			echo "<tr>";
			echo "<td class='tab_bg_2 top' colspan='2'><div align='center'>";
			echo "<input type='submit' name='update' value=\""._sx('button','Update')."\" class='submit' >";
			echo "</td>";
			echo "</tr>";
		}
		echo "</td></tr>";
		echo "</table>";
		Html::closeForm();
		echo "</div>";
	}
}

?>
