<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Shared\ShipmentTypeServicePoint\Helper;

use Codeception\Module;
use Generated\Shared\Transfer\ServiceTypeTransfer;
use Generated\Shared\Transfer\ShipmentTypeTransfer;
use Orm\Zed\ShipmentTypeServicePoint\Persistence\SpyShipmentTypeServiceTypeQuery;
use SprykerTest\Shared\Testify\Helper\DataCleanupHelperTrait;

class ShipmentTypeServicePointHelper extends Module
{
    use DataCleanupHelperTrait;

    public function haveShipmentTypeServiceTypeRelation(
        ShipmentTypeTransfer $shipmentTypeTransfer,
        ServiceTypeTransfer $serviceTypeTransfer
    ): void {
        $shipmentTypeServiceTypeEntity = $this->getShipmentTypeServiceTypeQuery()
            ->filterByFkShipmentType($shipmentTypeTransfer->getIdShipmentTypeOrFail())
            ->filterByFkServiceType($serviceTypeTransfer->getIdServiceTypeOrFail())
            ->findOneOrCreate();
        $shipmentTypeServiceTypeEntity->save();

        $this->getDataCleanupHelper()->addCleanup(function () use ($shipmentTypeServiceTypeEntity): void {
            $shipmentTypeServiceTypeEntity->delete();
        });
    }

    protected function getShipmentTypeServiceTypeQuery(): SpyShipmentTypeServiceTypeQuery
    {
        return SpyShipmentTypeServiceTypeQuery::create();
    }
}
