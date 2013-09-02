<?php
require_once 'User.php';
require_once 'UserPeer.php';

class MockBuilderTest extends TwoDialog_Test_TestCase
{
    public function testCanCreateMock()
    {
        $userPeer = $this->getMockBuilder('UserPeer')
                         ->disableOriginalConstructor()
                         ->getMock();
        
        $expectedUser = new User('thordan', 'changeme');
        
        $userPeer->expects($this->once())
                 ->method('retrieveByUsername')
                 ->with('thordan')
                 ->will($this->returnValue($expectedUser));

        $this->assertEquals('thordan', $userPeer->retrieveByUsername('thordan')->getUsername());
    }
}
