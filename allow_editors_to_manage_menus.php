<?php

/**
 * Plugin Name: Allow Editors to Manage Menus
 * Description: Allow editors to manage menus
 * Version: 0.0.2
 * Plugin URI: https://github.com/teknologi/allow-editors-to-manage-menus
 * Author: Hans Czajkowski Jørgensen
 * Text Domain: teknologi_allow_editors_to_manage_menus
 * Domain Path: /languages
 * License:     GPL2

 * Allow Editors to Manage Menus is free software: you can redistribute
 * it and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 2 of the
 * License, or any later version.
*
 * Allow Editors to Manage Menus is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Allow Editors to Manage Menus. If not, see
 * https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.
*/
namespace Tekno_Editors_Manage_Menus;

/**
 * Allow editors to see Appearance menu
 */

function on_plugin_activation()
{
    $role_object = \get_role('editor');
    if($role_object) {
        if (! $role_object->has_cap('edit_theme_options')) {
            $role_object->add_cap('edit_theme_options');
        }
    }
}

\register_activation_hook(__FILE__, 'Tekno_Editors_Manage_Menus\on_plugin_activation');

function on_plugin_deactivation()
{
    $role_object = \get_role('editor');
    if ($role_object) {
        if ($role_object->has_cap('edit_theme_options')) {
            $role_object->remove_cap('edit_theme_options');
        }
    }
}

\register_deactivation_hook(__FILE__, 'Tekno_Editors_Manage_Menus\on_plugin_deactivation');
