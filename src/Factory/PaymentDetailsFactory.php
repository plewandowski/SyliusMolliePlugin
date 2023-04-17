<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusMolliePlugin\Factory;

use BitBag\SyliusMolliePlugin\Entity\MollieSubscriptionConfigurationInterface;
use BitBag\SyliusMolliePlugin\Entity\OrderInterface;

final class PaymentDetailsFactory implements PaymentDetailsFactoryInterface
{
    public function createForSubscriptionAndOrder(
        MollieSubscriptionConfigurationInterface $subscriptionConfiguration,
        OrderInterface $order
    ): array {
        $originalDetails = $subscriptionConfiguration->getPaymentDetailsConfiguration();

        return [
            'recurring' => true,
            'cartToken' => null,
            'mandateId' => $subscriptionConfiguration->getMandateId(),
            'metadata' => [
                'gateway' => $originalDetails['metadata']['gateway'],
            ],
        ];
    }
}