<?php
class TwoDialog_Test_TestRunner
{
    public function run(TwoDialog_Test_TestCase $test)
    {
        $class = new ReflectionClass(get_class($test));
        $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
        
        $testMethods = array_filter($methods, array('TwoDialog_Test_TestRunner', 'filterTestMethods'));
        
        foreach ($testMethods as $testMethod) {
            $test->setUp();
            $testMethod->invoke($test);
            $test->tearDown();
        }
    }
    
    public static function filterTestMethods(ReflectionMethod $method)
    {
        return 'test' === substr($method->getName(), 0, 4);
    }
}
