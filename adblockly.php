<?php
/*
    Plugin Name: AdBlockly
    Plugin URI: https://kodesiana.com
    Description: Detect AdBlock
    Version: 1.0.0
    Author: Fahmi Noor Fiqri
    License: GPLv2 or later
*/

/* 
    AdBlockly, simple AdBlocker detector
    Copyright (C) 2018  Fahmi Noor Fiqri

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 2
    of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined('ABSPATH') or die('Silence is Golden.');

require 'adblockly-settings.php';
require 'adblockly-router.php';
