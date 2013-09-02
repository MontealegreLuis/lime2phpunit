<?php
$paths = array(
    realpath(dirname(__FILE__) . '/lib'), //Path to lime
    realpath(dirname(__FILE__) . '/src'), //Path to PHPUnit and TwoDialog
    realpath(dirname(__FILE__) . '/examples'), //Path to Examples
);

set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $paths));

require_once 'TwoDialog/Test/TestRunner.php';
require_once 'TwoDialog/Test/TestCase.php';
require_once 'ExampleTest.php';
require_once 'MockBuilderTest.php';

$runner = new TwoDialog_Test_TestRunner();

$runner->addTestCase(new ExampleTest());
$runner->addTestCase(new MockBuilderTest());

$runner->run();