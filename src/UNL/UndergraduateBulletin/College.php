<?php
class UNL_UndergraduateBulletin_College
{
    public $name;
    
    protected static $files = array(
        //'Education & Human Sciences'=>'CEHS.xhtml',
        'Education & Human Sciences' => 'CEHS.epub/OEBPS/College_Page_test-CEHS.xhtml',
        'Architecture'               => 'ARCH College.epub/OEBPS/ARCH_College.xhtml',
        'Agricultural Sciences & Natural Resources'=>'CASNR College Page.epub/OEBPS/CASNR_College_Page.xhtml',
    );
    
    public $description;
    
    function __construct($name)
    {
        $this->name = $name;
        
        if (!isset(self::$files[$name])) {
            throw new Exception('No description for the '.$name.' college.');
        }
        $file = 'phar://'.dirname(dirname(dirname(dirname(__FILE__)))).'/data/colleges/'.self::$files[$name];
        
        $simplexml = simplexml_load_string(file_get_contents($file));
        
        // Fetch all namespaces
        $namespaces = $simplexml->getNamespaces(true);
        $simplexml->registerXPathNamespace('default', $namespaces['']);
        
        // Register the rest with their prefixes
        foreach ($namespaces as $prefix => $ns) {
            $simplexml->registerXPathNamespace($prefix, $ns);
        }

        $body = $simplexml->xpath('//default:body');

        $this->description = UNL_UndergraduateBulletin_EPUB_Utilities::convertHeadings($body[0]->asXML());
        $this->description = UNL_UndergraduateBulletin_EPUB_Utilities::addLeaders($this->description);

    }
}