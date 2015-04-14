<?php

namespace Codeception\Module;

use Codeception\Module\ImageDeviationException;

/**
* Wrapper to execute command
*/
class DriverWrapper
{
    /** @var Selenium2 $driver  */
    private $driver = null;

    private $use_selenium = false;

    function __construct($driver)
    {
        $this->driver = $driver;
    }

    public function executeScript($js)
    {
        if(strpos(get_class($this->driver),"WebDriver") !== false ) {
            return $this->driver->executeScript($js);
        }

        if(strpos(get_class($this->driver),"Selenium2") !== false) {
            return $this->driver->executeJs($js);
        }

        throw new \Exception("VisualCeption uses the WebDriver or Selenium2. Please be sure that this module is activated.");
    }
}