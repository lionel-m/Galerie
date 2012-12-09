<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package galerie
 * @link    http://www.contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace Contao;

/**
 * Class ContentGalerie 
 *
 * @copyright  Lionel Maccaud 
 * @author     Lionel Maccaud
 * @package    Controller
 */
class ContentGalerie extends \ContentElement {

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_galerie';

    public function generate() {

        return parent::generate();
    }

    /**
     * Generate module
     */
    protected function compile() {

        $this->Template = new \FrontendTemplate('ce_galerie');
        $this->import('Database');
        $galleria = new Galleria();

        $galleria->getOptions($this->Database, $this->galerie, $this->Template);
        $galleria->getPictures($this->Database, $this->galerie, $this->Template, $this->imagesFolder, $this->sortBy);
        $galleria->getGalleriaTheme($this->Database, $this->galerie);

        // Use specific CSS and JS when the CTE is loaded
        if (TL_MODE == 'FE') {

            // From the extension - Galleria script
            $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/galerie/html/external/galleria/galleria-1.2.8.min.js';

            // Flickr Plugin
            if($galleria->isFlickrEnabled($this->Database, $this->galerie, $this->Template))
            $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/galerie/html/external/plugins/flickr/galleria.flickr.min.js';

            // History Plugin
            if($galleria->isHistoryEnabled($this->Database, $this->galerie))
            $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/galerie/html/external/plugins/history/galleria.history.min.js';

            // Picasa Plugin
            if($galleria->isPicasaEnabled($this->Database, $this->galerie, $this->Template))
            $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/galerie/html/external/plugins/picasa/galleria.picasa.min.js';
        }
    }
}
?>