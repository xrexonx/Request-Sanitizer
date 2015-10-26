<?php

class Request {

    protected $data = [];

    public function __construct($requestData = null)
    {
        if (is_null($requestData)){
            $this->data = &$_REQUEST;
        }else{
            $this->data = $requestData;
        }
    }

    public function getArray ($arrData = [])
    {
        if (empty($arrData)){
            $arrData = $this->data;
        }

        return $this->_sanitize($arrData);
    }

    public function getInput ($inputName)
    {
        $aRequest = $this->_setRequest();

        $returnVal = "";
        foreach ($aRequest as $key => $value) {
            if ($key === $inputName) {
                $returnVal = $this->_sanitize($value);
            }
        }

        return $returnVal;
    }

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

    private function _setRequest($request = null)
    {
        $resquest = $request ? : $this->data;
        return !is_array($resquest) ? [$resquest] : $resquest;
    }

}