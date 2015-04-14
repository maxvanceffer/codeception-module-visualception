<?php

namespace Codeception\Module;
use Codeception\Module\ImageDeviationException;

/**
* Wrapper to execute command
*/
class DriverWrapper
{
    private $driver = null;

    private $use_selenium = false;

    function __construct($driver)
    {
        $this->driver = $driver;
    }

    public function executeScript($js)
    {
        if($this->driver instanceof WebDriver) {
            return $this->driver->executeScript($js);
        }

        if($this->driver instanceof WebDriver\Session) {
            return $this->driver->execute($js);
        }

        throw new \Exception("VisualCeption uses the WebDriver or Selenium2. Please be sure that this module is activated.");
    }
}