<?php

namespace Limelight\tests;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Assert MecabNode object equals expected array.
     *
     * @param Node $nodes
     * @param array      $expected
     */
    protected function assertNodeResult($nodes, $expected)
    {
        $count = 0;

        foreach ($nodes->getNode() as $node) {
            $expectedLine = $expected[$count];

            $this->assertEquals($expectedLine, $node->feature);

            $count += 1;
        }
    }

    /**
     * Get romanji string for results.
     *
     * @param RomanjiConverter $converter
     * @param LimelightResults $results
     *
     * @return string
     */
    protected function getRomanjiConversion($converter, $results)
    {
        $conversion = '';

        foreach ($results->getNext() as $word) {
            $reading = mb_convert_kana($word->reading, 'c');

            $conversion .= $converter->handle($reading, $word);
        }

        return $conversion;
    }
}