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
        if(get_class($this->driver) == "WebDriver") {
            return $this->driver->executeScript($js);
        }

        if(get_class($this->driver) == "WebDriver\\Session") {
            return $this->driver->executeJs($js);
        }

        throw new \Exception("VisualCeption uses the WebDriver or Selenium2. Please be sure that this module is activated.");
    }
}