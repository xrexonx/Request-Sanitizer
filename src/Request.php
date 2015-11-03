<?php

/**
* Request Sanitizer
* @description Request sanitizer is a class that clean request data before inserting into the database.
* @author Rexon A. De los Reyes <rexondelosreyes88@gmail.com>
* @date 10262015
*/

class Request {

    protected $data = [];

    public function __construct($requestData = null)
    {
        if (is_null($requestData)){
            $this->data = &$_REQUEST;
        } else {
            $this->data = $requestData;
        }
        $this->_setProperties($this->data);
    }

    /**
    * Set properties dynamically
    * @param array $aRequest
    * @return
    */
    private function _setProperties ($aRequest)
    {
        foreach ($aRequest as $key => $value) {
            if (!property_exists($this, $key)) {
                $this->$key = $this->_sanitize($value);
            }
        }
    }

    /**
    * Set to array
    * @param array $aRequest
    * @return array
    */
    private function _toArray ($request)
    {
        return !is_array($request) ? [$request] : $request;
    }

    /**
    * Set Request
    * @param array $aRequest
    * @return array
    */
    private function _setRequest($request = null)
    {
        $request = $request ? : $this->data;
        return $this->_toArray($request);
    }

    /**
    * Get array of request data
    * @param array $aRequest
    * @return array
    */
    public function getArray ($arrData = [])
    {
        if (empty($arrData)){
            $arrData = $this->data;
        }
        return $this->_sanitize($arrData);
    }

    /**
    * Get Input form data
    * @param string $inputName
    * @return array
    */
    public function getInput ($inputName)
    {
        $aRequest  = $this->_setRequest();
        $returnVal = "";
        foreach ($aRequest as $key => $value) {
            if ($key === $inputName) {
                $returnVal = $this->_sanitize($value);
            }
        }
        return $returnVal;
    }

    /**
    * Sanitize request data
    * @param array $aRequest
    * @return array
    */
    private function _sanitize($request)
    {
        $aRequest = $this->_setRequest($request);

        foreach (array_keys($aRequest) as $string) {
            if (is_array($aRequest[$string])) {
                $arrayIntoArray = $aRequest[$string];
                foreach (array_keys($arrayIntoArray) as $string) {
                    $arrayIntoArray[$string] = trim(addslashes($arrayIntoArray[$string]));
                    $arrayIntoArray[$string] = trim(preg_replace("/[\\/]+/", "/", $arrayIntoArray[$string]));
                }
            } else {
                $aRequest[$string] = trim(addslashes($aRequest[$string]));
                $aRequest[$string] = trim(preg_replace("/[\\/]+/", "/", $aRequest[$string]));
            }
        }
        if (!is_array($request)) {
            return $aRequest[0];
        } else {
            return $aRequest;
        }
    }

}