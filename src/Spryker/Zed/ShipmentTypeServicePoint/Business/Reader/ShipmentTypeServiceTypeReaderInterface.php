<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShipmentTypeServicePoint\Business\Reader;

use Generated\Shared\Transfer\ShipmentTypeServiceTypeCollectionTransfer;
use Generated\Shared\Transfer\ShipmentTypeServiceTypeCriteriaTransfer;

interface ShipmentTypeServiceTypeReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ShipmentTypeServiceTypeCriteriaTransfer $shipmentTypeServiceTypeCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentTypeServiceTypeCollectionTransfer
     */
    public function getShipmentTypeServiceTypeCollection(
        ShipmentTypeServiceTypeCriteriaTransfer $shipmentTypeServiceTypeCriteriaTransfer
    ): ShipmentTypeServiceTypeCollectionTransfer;
}
