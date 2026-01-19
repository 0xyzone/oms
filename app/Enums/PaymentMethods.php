<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentMethods: string implements HasLabel
{
    case ESEWA = 'eSewa';
    case IMEPAY = 'IME Pay';
    case BANK_TRANSFER = 'bank_transfer';
    case CASH_ON_DELIVERY = 'cash_on_delivery';
    case QR_PAYMENT = 'qr_payment';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ESEWA => 'eSewa',
            self::IMEPAY => 'IME Pay',
            self::BANK_TRANSFER => 'Bank Transfer',
            self::CASH_ON_DELIVERY => 'Cash on Delivery',
            self::QR_PAYMENT => 'QR Payment'
        };
    }
}
