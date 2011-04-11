<?php

require('../library/SSRS/Report.php');

$options = array(
    'username' => 'testing',
    'password' => 'password'
);

$ssrs = new SSRS_Report('http://localhost/reportserver/', $options);
$result = $ssrs->loadReport('/Reports/Reference_Report');

$ssrs->setSessionId($result->executionInfo->ExecutionID);
$ssrs->setExecutionParameters(new SSRS_Object_ExecutionParameters($result->executionInfo->Parameters));

$output = $ssrs->render('HTML4.0'); // PDF | XML | CSV
echo $output;