<?php
require_once 'lime.php';
require_once 'PHPUnit/Util/Class.php';
require_once 'PHPUnit/Framework/SelfDescribing.php';
require_once 'PHPUnit/Framework/Constraint.php';
require_once 'PHPUnit/Framework/AssertionFailedError.php';
require_once 'PHPUnit/Framework/ExpectationFailedException.php';
require_once 'PHPUnit/Framework/Constraint/IsEqual.php';
require_once 'PHPUnit/Framework/MockObject/Stub.php';
require_once 'PHPUnit/Framework/MockObject/MockBuilder.php';
require_once 'PHPUnit/Framework/MockObject/Stub/MatcherCollection.php';
require_once 'PHPUnit/Framework/MockObject/Stub/Return.php';
require_once 'PHPUnit/Framework/MockObject/Verifiable.php';
require_once 'PHPUnit/Framework/MockObject/Invokable.php';
require_once 'PHPUnit/Framework/MockObject/Matcher/Invocation.php';
require_once 'PHPUnit/Framework/MockObject/Matcher/InvokedRecorder.php';
require_once 'PHPUnit/Framework/MockObject/Matcher/InvokedCount.php';
require_once 'PHPUnit/Framework/MockObject/Matcher/StatelessInvocation.php';
require_once 'PHPUnit/Framework/MockObject/Matcher/Parameters.php';
require_once 'PHPUnit/Framework/MockObject/Matcher/MethodName.php';
require_once 'PHPUnit/Framework/MockObject/Matcher.php';
require_once 'PHPUnit/Framework/MockObject/Builder/Namespace.php';
require_once 'PHPUnit/Framework/MockObject/Builder/Identity.php';
require_once 'PHPUnit/Framework/MockObject/Builder/Stub.php';
require_once 'PHPUnit/Framework/MockObject/Builder/Match.php';
require_once 'PHPUnit/Framework/MockObject/Builder/ParametersMatch.php';
require_once 'PHPUnit/Framework/MockObject/Builder/MethodNameMatch.php';
require_once 'PHPUnit/Framework/MockObject/Builder/InvocationMocker.php';
require_once 'PHPUnit/Framework/MockObject/InvocationMocker.php';
require_once 'PHPUnit/Framework/MockObject/Invocation.php';
require_once 'PHPUnit/Framework/MockObject/Invocation/Static.php';
require_once 'PHPUnit/Framework/MockObject/Invocation/Object.php';
require_once 'PHPUnit/Framework/MockObject/Generator.php';
require_once 'PHPUnit/Framework/MockObject/MockObject.php';
require_once 'PHPUnit/Framework/TestCase.php';

class TwoDialog_Test_TestCase implements PHPUnit_Framework_TestCase
{
    /**
     * @type lime_test
     */
    protected $test;
    
    /**
     * @var array
     */
    protected $mockObjects;
    
    /**
     * @var PHPUnit_Framework_MockObject_Generator
     */
    protected $mockObjectGenerator;
    
    /**
     * Initialize lime_test instance
     */
    public function __construct()
    {
        $this->test = new lime_test(null, array('force_colors' => true));
        $this->mockObjects = array();
        $this->mockObjectGenerator = new PHPUnit_Framework_MockObject_Generator();
    }
    
    /**
     * Setup test environment
     */
    public function setUp() {}
    
    /**
     * Cleanup test environment
     */
    public function tearDown() {}
    
    /**
     * Proxies method lime_test::ok
     * 
     * This is also a replacement for lime_test::can_ok. For example
     * 
     * $this->assertTrue(method_exists($object, $method), $message);
     * 
     * Also used as a replacement for lime_test::pass. For example:
     * 
     * $this->assertTrue(true, $message);
     * 
     * @param bool $condition
     * @param string $message
     */
    public function assertTrue($condition, $message = '')
    {
        $this->test->ok($condition, $message);
        
    }
    
    /**
     * Proxies method lime_test::is
     * 
     * Also a replacement for lime_test::is_deeply. For example:
     * 
     * $this->assertEquals(ksort($expected), ksort($actual), $message);
     * 
     * @param mixed $expected
     * @param mixed $actual
     * @param string $message
     */
    public function assertEquals($expected, $actual, $message = '')
    {
        $this->test->is($expected, $actual, $message);
    }
    
    /**
     * Proxies method lime_test::isnt
     * 
     * @param mixed $expected
     * @param mixed $actual
     * @param string $message
     */
    public function assertNotEquals($expected, $actual, $message = '')
    {
        $this->test->isnt($expected, $actual, $message);
    }

    /**
     * Proxies method lime_test::like
     * 
     * @param string $pattern
     * @param string $string
     * @param string $message
     */    
    public function assertRegExp($pattern, $string, $message = '')
    {
        $this->test->like($string, $pattern, $message);
    }

    /**
     * Proxies method lime_test::unlike
     * 
     * @param string $pattern
     * @param string $string
     * @param string $message
     */
    public function assertNotRegExp($pattern, $string, $message = '')
    {
        $this->test->unlike($string, $pattern, $message);
    }

    /**
     * Proxies method lime_test::cmp_ok
     * 
     * @param numeric $expected
     * @param numeric $actual
     * @param string $message
     */    
    public function assertGreaterThan($expected, $actual, $message = '')
    {
        $this->test->cmp_ok($actual, '>', $expected, $message);
    }

    /**
     * Proxies method lime_test::isa_ok
     * 
     * @param string $expected
     * @param mixed $actual
     * @param string $message
     */    
    public function assertInstanceOf($expected, $actual, $message = '')
    {
        $this->test->isa_ok($actual, $expected, $message);
    }
    
    /**
     * Proxies method lime_test::fail
     * 
     * @param string $message
     */    
    public function fail($message = '')
    {
        $this->test->fail($message);
    }
    
    /**
     * Proxies method lime_test::skip
     * 
     * @param string $message
     */    
    public function markTestSkipped($message = '')
    {
        $this->test->skip($message);
    }

    /**
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @param string $className
     * @return PHPUnit_Framework_MockObject_MockBuilder
     * @since Method available since Release 3.5.0
     */
    public function getMockBuilder($className)
    {
        return new PHPUnit_Framework_MockObject_MockBuilder(
            $this, $className
        );
    }
    
    /**
     * Returns a matcher that matches when the method it is evaluated for
     * is executed exactly once.
     *
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
     * @since Method available since Release 3.0.0
     */
    public function once()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount(1);
    }
    
    /**
     * @param mixed $value
     * @return PHPUnit_Framework_MockObject_Stub_Return
     * @since Method available since Release 3.0.0
     */
    public function returnValue($value)
    {
        return new PHPUnit_Framework_MockObject_Stub_Return($value);
    }
    
    /**
     * Returns a mock object for the specified class.
     *
     * @param string $originalClassName
     * @param array $methods
     * @param array $arguments
     * @param string $mockClassName
     * @param boolean $callOriginalConstructor
     * @param boolean $callOriginalClone
     * @param boolean $callAutoload
     * @param boolean $cloneArguments
     * @param boolean $callOriginalMethods
     * @return PHPUnit_Framework_MockObject_MockObject
     * @throws PHPUnit_Framework_Exception
     * @since Method available since Release 3.0.0
     */
    public function getMock($originalClassName, $methods = array(), array $arguments = array(), $mockClassName = '', $callOriginalConstructor = TRUE, $callOriginalClone = TRUE, $callAutoload = TRUE, $cloneArguments = FALSE, $callOriginalMethods = FALSE)
    {
        $mockObject = $this->mockObjectGenerator->getMock(
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments,
            $callOriginalMethods
        );
    
        $this->mockObjects[] = $mockObject;
    
        return $mockObject;
    }
    
    /**
     * Proxies method lime_test::diag
     * 
     * @param string $message
     */
    public function diag($message)
    {
        $this->test->diag($message);
    }
    
    /**
     * Proxies method lime_test::todo
     * 
     * @param string $message
     */
    public function todo($message) 
    {
        $this->test->todo($message);
    }
    
    /**
     * Proxies method lime_test::info
     * 
     * @param string $message
     */
    public function info($message) 
    {
        $this->test->info($message);
    }
    
    /**
     * Proxies method lime_test::error
     * 
     * @param string $message
     */
    public function error($message) 
    {
        $this->test->error($message);
    }
}
