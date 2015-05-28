<?php
/**
 * @author Bryan Tan <bryantan16@gmail.com>
 */

namespace bryglen\omnipay;

use Omnipay\Omnipay;
use yii\base\Component;

class OmniPayComponent extends Component
{
    public $name;

    public $testMode = null;
    public $currency = null;
    public $parameters = [];

    private $_gateway;

    public function init()
    {
        $this->prepareGateway();
    }

    public function prepareGateway()
    {
        $this->_gateway = Omnipay::create($this->name);
        if ($this->testMode) {
            $this->parameters['testMode'] = $this->testMode;
        }
        if ($this->currency) {
            $this->parameters['currency'] = $this->currency;
        }
        $this->_gateway->initialize($this->parameters);
    }

    public function getGateway()
    {
        return $this->_gateway;
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->getGateway(), $method], $parameters);
    }
} 