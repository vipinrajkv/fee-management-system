<?php

namespace App\Repositories;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

final class PaymentRepository
{

    public function __construct(protected readonly Payment $payment)
    {
        
    }

    /**
     * Payment create
     *
     * @param array $data
     * @return void
     */
    public function getPaymentDetails(array $data)
    {

    }

    /**
     * Payment create
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->payment->create($data);
    }

    /**
     *  Payment update
     *
     * @param array $data
     * @param Payment $payment
     * @return void
     */
    public function update(array $data,  Payment $payment)
    {
        $payment->update($data);
    }

    /**
     * Payment delete
     *
     * @param Payment $payment
     * @return void
     */
    public function delete(Payment $payment)
    {
        $payment->delete();
    }
}
