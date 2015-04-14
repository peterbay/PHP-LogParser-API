<?php

namespace LogParser;

class LogOutputFormat extends ComInterface
{

    public function __construct ( $formatId )
    {

        switch ( trim ( strtoupper ( $formatId ) ) )
        {

            case 'CHART':
                $formatName = 'MSUtil.LogQuery.ChartOutputFormat';
                break;

            case 'CSV':
                $formatName = 'MSUtil.LogQuery.CSVOutputFormat';
                break;

            case 'DATAGRID':
                $formatName = 'MSUtil.LogQuery.DataGridOutputFormat';
                break;

            case 'IIS':
                $formatName = 'MSUtil.LogQuery.IISOutputFormat';
                break;

            case 'NAT':
                $formatName = 'MSUtil.LogQuery.NativeOutputFormat';
                break;

            case 'SQL':
                $formatName = 'MSUtil.LogQuery.SQLOutputFormat';
                break;

            case 'SYSLOG':
                $formatName = 'MSUtil.LogQuery.SYSLOGOutputFormat';
                break;

            case 'TPL':
                $formatName = 'MSUtil.LogQuery.TemplateOutputFormat';
                break;

            case 'TSV':
                $formatName = 'MSUtil.LogQuery.TSVOutputFormat';
                break;

            case 'W3C':
                $formatName = 'MSUtil.LogQuery.W3COutputFormat';
                break;

            case 'XML':
                $formatName = 'MSUtil.LogQuery.XMLOutputFormat';
                break;
        }

        parent::__create ( $formatName );

        return $this;
    }

}
