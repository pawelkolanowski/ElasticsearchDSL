<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\Filter;

@trigger_error(
    'The GeoShapeFilter class is deprecated and will be removed in 2.0. Use GeoShapeQuery instead.',
    E_USER_DEPRECATED
);

use ONGR\ElasticsearchDSL\Query\GeoShapeQuery;

/**
 * Elasticsearch geo-shape filter.
 *
 * @deprecated Will be removed in 2.0. Use the GeoShapeQuery instead.
 */
class GeoShapeFilter extends GeoShapeQuery
{
}
