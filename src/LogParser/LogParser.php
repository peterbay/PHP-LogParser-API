<?php

namespace LogParser;

class LogParser
{

    public $logParser;
    private $inputFormat  = null;
    private $outputFormat = null;

    public function __construct ()
    {
        $this->logParser = new \COM ( "MSUtil.LogQuery" );

        return $this;
    }

    public function setInputFormat ( $format )
    {
        $this->inputFormat = new \LogParser\LogInputFormat ( $format );

        return $this->inputFormat;
    }

    public function setOutputFormat ( $format )
    {
        $this->outputFormat = new \LogParser\LogOutputFormat ( $format );

        return $this->outputFormat;
    }

    public function getRecordSet ( $query )
    {
        if ( !is_null ( $this->inputFormat ) && !is_null ( $this->outputFormat ) )
        {
            return $this->logParser->ExecuteBatch ( $query, $this->inputFormat->getInterface (), $this->outputFormat->getInterface () );
        }
        else if ( !is_null ( $this->inputFormat ) )
        {
            return $this->logParser->Execute ( $query, $this->inputFormat->getInterface () );
        }
        else
        {
            return $this->logParser->Execute ( $query );
        }
    }

    public function query ( $query )
    {

        $recordSet = $this->getRecordSet ( $query );

        if ( is_null ( $this->outputFormat ) )
        {

            $columnsInfo = array();
            for ($column = 0; $column < $recordSet->getColumnCount (); $column = $column + 1)
            {
                $columnsInfo[$column] = array(
                    'name' => $recordSet->getColumnName ( $column ),
                    'type' => $recordSet->getColumnType ( $column )
                );
            }

            while ( !$recordSet->atEnd () )
            {
                $record = $recordSet->getRecord ();

                $resultRow = array();

                foreach ($columnsInfo as $index => $columnInfo)
                {
                    $value                  = $record->getValue ( $index );
                    $columnName             = $columnInfo['name'];
                    $resultRow[$columnName] = (string) $value;
                }

                yield $resultRow;

                $recordSet->moveNext ();
            }
        }
    }

}
