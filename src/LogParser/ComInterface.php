<?php

namespace LogParser;

class ComInterface
{

    private $interface;
    private $interfaceInfo;
    private $interfaceInfoUpperCase;

    public function __create ( $objectName )
    {
        $this->interface = new \COM ( $objectName );

        $this->getInterfaceInfo ( $this->interface );

        return $this;
    }

    public function getInterface ()
    {
        return $this->interface;
    }

    public function getInterfaceInfo ( $object )
    {

        if ( gettype ( $object ) == 'object' )
        {

            ob_start ();
            com_print_typeinfo ( $object );
            $comPrintTypeInfo = ob_get_clean ();

            $replaceFrom = array(
                "/\n/",
                "/(function|var)/",
                "/\/\*[^\*]+\*\//",
                "/\([^\)]+\)/",
                "/\{\s*\}/",
                "/[;\{\}]/"
            );

            $replaceTo = array(
                "",
                "\n$1",
                "",
                "",
                "",
                ""
            );

            $comTypeInfo = preg_replace ( $replaceFrom, $replaceTo, $comPrintTypeInfo );
            
            foreach (explode ( "\n", $comTypeInfo ) as $line)
            {
                if ( preg_match ( "/(function|var|class)\s+\\\$?(\S+)/", $line, $match ) )
                {
                    $this->interfaceInfo[$match[1]][$match[2]] = '';
                }
            }

            $this->interfaceUpperCase = array_change_key_case ( $this->interfaceInfo, CASE_UPPER );
        }
    }

    public function __set ( $variable, $value )
    {
        $variableUpperCase = strtoupper ( $variable );
        if ( isset ( $this->interfaceInfoUpperCase['var'] ) && isset ( $this->interfaceInfoUpperCase['var'][$variableUpperCase] ) )
        {
            $this->format->$variable = $value;
        }
        return $this;
    }

    public function getInterfaceVariables ()
    {
        return ( isset ( $this->interfaceInfo['var'] ) ) ? $this->interfaceInfo['var'] : array();
    }

    public function getInterfaceFunctions ()
    {
        return ( isset ( $this->interfaceInfo['function'] ) ) ? $this->interfaceInfo['function'] : array();
    }

}
