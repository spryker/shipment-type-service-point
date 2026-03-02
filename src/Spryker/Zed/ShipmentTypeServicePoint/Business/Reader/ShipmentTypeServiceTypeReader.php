<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShipmentTypeServicePoint\Business\Reader;

use Generated\Shared\Transfer\ShipmentTypeServiceTypeCollectionTransfer;
use Generated\Shared\Transfer\ShipmentTypeServiceTypeCriteriaTransfer;
use Spryker\Zed\ShipmentTypeServicePoint\Business\Expander\ServiceTypeExpanderInterface;
use Spryker\Zed\ShipmentTypeServicePoint\Persistence\ShipmentTypeServicePointRepositoryInterface;

class ShipmentTypeServiceTypeReader implements ShipmentTypeServiceTypeReaderInterface
{
    /**
     * @var \Spryker\Zed\ShipmentTypeServicePoint\Persistence\ShipmentTypeServicePointRepositoryInterface
     */
    protected ShipmentTypeServicePointRepositoryInterface $shipmentTypeServicePointRepository;

    /**
     * @var \Spryker\Zed\ShipmentTypeServicePoint\Business\Expander\ServiceTypeExpanderInterface
     */
    protected ServiceTypeExpanderInterface $serviceTypeExpander;

    public function __construct(
        ShipmentTypeServicePointRepositoryInterface $shipmentTypeServicePointRepository,
        ServiceTypeExpanderInterface $serviceTypeExpander
    ) {
        $this->shipmentTypeServicePointRepository = $shipmentTypeServicePointRepository;
        $this->serviceTypeExpander = $serviceTypeExpander;
    }

    public function getShipmentTypeServiceTypeCollection(
        ShipmentTypeServiceTypeCriteriaTransfer $shipmentTypeServiceTypeCriteriaTransfer
    ): ShipmentTypeServiceTypeCollectionTransfer {
        $shipmentTypeServiceTypeCollectionTransfer = $this->shipmentTypeServicePointRepository->getShipmentTypeServiceTypeCollection(
            $shipmentTypeServiceTypeCriteriaTransfer,
        );

        if ($shipmentTypeServiceTypeCollectionTransfer->getShipmentTypeServiceTypes()->count() === 0) {
            return $shipmentTypeServiceTypeCollectionTransfer;
        }

        if (
            $shipmentTypeServiceTypeCriteriaTransfer->getShipmentTypeServiceTypeConditions()
            && $shipmentTypeServiceTypeCriteriaTransfer->getShipmentTypeServiceTypeConditionsOrFail()->getWithServiceTypeRelations()
        ) {
            return $this->serviceTypeExpander->expandShipmentTypeServiceTypeCollection(
                $shipmentTypeServiceTypeCollectionTransfer,
            );
        }

        return $shipmentTypeServiceTypeCollectionTransfer;
    }
}
