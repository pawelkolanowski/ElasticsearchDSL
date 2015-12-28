<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\Tests\Filter;

use ONGR\ElasticsearchDSL\Filter\GeoDistanceRangeFilter;

class GeoDistanceRangeFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests GetType method.
     */
    public function testGetType()
    {
        $filter = new GeoDistanceRangeFilter('test_field', 'test_distance', 'test_location');
        $result = $filter->getType();
        $this->assertEquals('geo_distance_range', $result);
    }

    /**
     * Data provider to testToArray.
     *
     * @return array
     */
    public function getArrayDataProvider()
    {
        return [
            // Case #1.
            [
                'location',
                ['from' => '200km', 'to' => '400km'],
                ['lat' => 40, 'lon' => -70],
                [],
                ['from' => '200km', 'to' => '400km', 'location' => ['lat' => 40, 'lon' => -70]],
            ],
            // Case #2.
            [
                'location',
                ['from' => '150km', 'to' => '180km'],
                ['lat' => 0, 'lon' => 0],
                ['parameter' => 'value'],
                ['from' => '150km', 'to' => '180km', 'location' => ['lat' => 0, 'lon' => 0], 'parameter' => 'value'],
            ],
        ];
    }

    /**
     * Tests toArray method.
     *
     * @param string $field      Field name.
     * @param array  $range      Distance range.
     * @param array  $location   Location.
     * @param array  $parameters Optional parameters.
     * @param array  $expected   Expected result.
     *
     * @dataProvider getArrayDataProvider
     */
    public function testToArray($field, $range, $location, $parameters, $expected)
    {
        $filter = new GeoDistanceRangeFilter($field, $range, $location, $parameters);
        $result = $filter->toArray();
        $this->assertEquals($expected, $result);
    }
}
