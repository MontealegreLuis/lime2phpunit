<?php
class TwoDialog_Test_TestCase
{
    /**
     * @type lime_test
     */
    protected $test;
    
    /**
     * Initialize lime_test instance
     */
    public function __construct()
    {
        $this->test = new lime_test(null, array('force_colors' => true));
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
