<?php

namespace LogParser;

class LogInputFormat extends ComInterface
{

    private $format;

    public function __construct ( $formatId )
    {

        $formatName = '';

        switch ( trim ( strtoupper ( $formatId ) ) )
        {

            case 'ADS':
                $formatName = 'MSUtil.LogQuery.ADSInputFormat';
                break;

            case 'BIN':
                $formatName = 'MSUtil.LogQuery.IISBINInputFormat';
                break;

            case 'CSV':
                $formatName = 'MSUtil.LogQuery.CSVInputFormat';
                break;

            case 'ETW':
                $formatName = 'MSUtil.LogQuery.ETWInputFormat';
                break;

            case 'EVT':
                $formatName = 'MSUtil.LogQuery.EventLogInputFormat';
                break;

            case 'FS':
                $formatName = 'MSUtil.LogQuery.FileSystemInputFormat';
                break;

            case 'HTTPERR':
                $formatName = 'MSUtil.LogQuery.HttpErrorInputFormat';
                break;

            case 'IIS':
                $formatName = 'MSUtil.LogQuery.IISIISInputFormat';
                break;

            case 'IISODBC':
                $formatName = 'MSUtil.LogQuery.IISODBCInputFormat';
                break;

            case 'IISW3C':
                $formatName = 'MSUtil.LogQuery.IISW3CInputFormat';
                break;

            case 'NCSA':
                $formatName = 'MSUtil.LogQuery.IISNCSAInputFormat';
                break;

            case 'NETMON':
                $formatName = 'MSUtil.LogQuery.NetMonInputFormat';
                break;

            case 'REG':
                $formatName = 'MSUtil.LogQuery.RegistryInputFormat';
                break;

            case 'TEXTLINE':
                $formatName = 'MSUtil.LogQuery.TextLineInputFormat';
                break;

            case 'TEXTWORD':
                $formatName = 'MSUtil.LogQuery.TextWordInputFormat';
                break;

            case 'TSV':
                $formatName = 'MSUtil.LogQuery.TSVInputFormat';
                break;

            case 'URLSCAN':
                $formatName = 'MSUtil.LogQuery.URLScanLogInputFormat';
                break;

            case 'W3C':
                $formatName = 'MSUtil.LogQuery.W3CInputFormat';
                break;

            case 'XML':
                $formatName = 'MSUtil.LogQuery.XMLInputFormat';
                break;
        }

        parent::__create( $formatName );

        return $this;
    }

}
