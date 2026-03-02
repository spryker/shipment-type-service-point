<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShipmentTypeServicePoint\Business\Expander;

use Generated\Shared\Transfer\ShipmentTypeServiceTypeCollectionTransfer;

interface ServiceTypeExpanderInterface
{
    public function expandShipmentTypeServiceTypeCollection(
        ShipmentTypeServiceTypeCollectionTransfer $shipmentTypeServiceTypeCollectionTransfer
    ): ShipmentTypeServiceTypeCollectionTransfer;
}
