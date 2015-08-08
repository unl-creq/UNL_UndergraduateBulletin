--TEST--
Course activities test 
--FILE--
<?php
require_once 'test_framework.php';
$listing = UNL_Services_CourseApproval_Listing::createFromSubjectAndNumber('ACCT', 201);
$test->assertTrue($listing->activities instanceof Iterator, 'Activities returned is an iterator');
$test->assertEquals(1, count($listing->activities), 'Count the number of activities');
?>
===DONE===
--EXPECT--
===DONE===