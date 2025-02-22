<?php
namespace App\Services;
use App\Repositories\PaymentRepository;
use App\Models\Payment;

class PaymentService
{
    public function __construct(protected readonly PaymentRepository $paymentRepository)
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
        return $this->paymentRepository->create($data);
    }

    /**
     * Payment update
     *
     * @param array $data
     * @param Payment $payment
     * @return void
     */
    public function update(array $data, Payment $payment)
    {
        return $this->paymentRepository->update($data, $payment);
    }

    /**
     * Payment update
     *
     * @param array $data
     * @param Payment $payment
     * @return void
     */
    public function delete(Payment $payment)
    {
        return $this->paymentRepository->delete($payment);
    }    
    
    /**
    * Payment create
    *
    * @param array $data
    * @return void
    */
   public function getPaymentDetails(array $data)
   {
       return $this->paymentRepository->getPaymentDetails($data);
   }
}