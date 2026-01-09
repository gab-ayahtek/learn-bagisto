<?php

namespace Webkul\RMA\Models;

use Webkul\Product\Models\Product as BaseProduct;

class Product extends BaseProduct
{
    /**
     * Get return requests for this product.
     */
    public function returnRequests()
    {
        return $this->hasMany(ReturnRequestProxy::modelClass(), 'product_sku', 'sku');
    }

    /**
     * Check if product is returnable.
     */
    public function isReturnable(): bool
    {
        return $this->status && $this->type !== 'digital';
    }
}
