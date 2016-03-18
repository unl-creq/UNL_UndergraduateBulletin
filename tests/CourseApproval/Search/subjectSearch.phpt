--TEST--
Course subject code search test 
--FILE--
<?php
require_once __DIR__ . '/../test_framework.php';
$search = new UNL_Services_CourseApproval_Search();

$results = $search->byAny('LLLL');
$test->assertIsa('UNL_Services_CourseApproval_Search_Results', $results, 'Search returns a result object');
$test->assertEquals(0, count($results), 'Count the number of results');

$results = $search->byAny('NREE');
$test->assertIsa('UNL_Services_CourseApproval_Search_Results', $results, 'Search returns a result object');
$test->assertEquals(2, count($results), 'Count the number of results');

$results = $search->byAny('ACCT');
$test->assertIsa('UNL_Services_CourseApproval_Search_Results', $results, 'Search returns a result object');
$test->assertEquals(2, count($results), 'Count the number of results');


?>
===DONE===
--EXPECT--
===DONE===