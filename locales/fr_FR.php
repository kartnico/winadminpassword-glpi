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

$title = "WinAdminPassword";

$LANG['plugin_winadminpassword'][1] = "".$title."";
$LANG['plugin_winadminpassword'][2] = "Mot de passe du compte local d'administration";
$LANG['plugin_winadminpassword'][3] = "Attention";
$LANG['plugin_winadminpassword'][4] = "Veuillez reseigner le numéro de série";

$LANG['plugin_winadminpassword']['profile'][1] = "Gestion des droits WinAdminPassword";
$LANG['plugin_winadminpassword']['profile'][2] = "Visualiser les mots de passe";

$LANG['plugin_winadminpassword']['config'][1] = "Attention : enregistrer la clé privée est une faille de sécurité. Veillez à la changer régulièrement.";
$LANG['plugin_winadminpassword']['config'][2] = "Configuration du plugin";
$LANG['plugin_winadminpassword']['config'][3] = "Clef privée";
$LANG['plugin_winadminpassword']['config'][4] = "Longueur des mots de passe";
$LANG['plugin_winadminpassword']['config'][5] = "Algorithme utilisé";
$LANG['plugin_winadminpassword']['config'][6] = "Taille du texte";
$LANG['plugin_winadminpassword']['config'][7] = "Couleur du texte";
$LANG['plugin_winadminpassword']['config'][8] = "Orange";
$LANG['plugin_winadminpassword']['config'][9] = "Rouge";
$LANG['plugin_winadminpassword']['config'][10] = "Vert";
$LANG['plugin_winadminpassword']['config'][11] = "Noir";
$LANG['plugin_winadminpassword']['config'][12] = "Blanc";
$LANG['plugin_winadminpassword']['config'][13] = "Bleu";

$LANG['buttons'][7] = "Mettre à jour";
$LANG['buttons'][8] = "Ajouter";
?>
