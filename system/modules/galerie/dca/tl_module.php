<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Lionel Maccaud
 * @author     Lionel Maccaud (Galleria by Aino: http://galleria.aino.se)
 * @package    galerie 
 * @license    MIT 
 * @filesource
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['galerie'] = '{title_legend},name,headline,type;{galerie_legend},galerie;{imagesFolder_legend},imagesFolder,galFileName;{imgSortBy_legend},imgSortBy;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['galerie'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['galerie'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'foreignKey'              => 'tl_galerie.title',
	'eval'                    => array('mandatory'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['imagesFolder'] = array
(
        'label'                   => &$GLOBALS['TL_LANG']['tl_module']['imagesFolder'],
        'exclude'                 => true,
        'inputType'               => 'fileTree',
        'eval'                    => array('fieldType'=>'checkbox', 'files'=>true, 'tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['imgSortBy'] = array
(
        'label'                   => &$GLOBALS['TL_LANG']['tl_content']['sortBy'],
        'exclude'                 => true,
        'inputType'               => 'select',
        'options'                 => array('name_asc', 'name_desc', 'date_asc', 'date_desc', 'random'),
        'reference'               => &$GLOBALS['TL_LANG']['tl_content'],
        'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['galFileName'] = array
(
        'label'                   => &$GLOBALS['TL_LANG']['tl_module']['galFileName'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => array('isBoolean' => true, 'tl_class'=>'w50 m12')
);
?>