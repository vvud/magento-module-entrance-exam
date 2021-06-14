<?php
namespace AHT\AttributeCustomer\Observer;

use Magento\Framework\Event\Observer;
 
use Magento\Customer\Api\CustomerRepositoryInterface;

class SaveCustomer implements \Magento\Framework\Event\ObserverInterface
{
    
    protected $customerRepository;
 
    public function __construct(
 
        CustomerRepositoryInterface $customerRepository)
 
    {
 
        $this->customerRepository = $customerRepository;
 
    }

    public function execute(Observer $observer)
    {
        $accountController = $observer->getAccountController();
        $customer = $observer->getCustomer();
        $request = $accountController->getRequest();
        $contact_phone_number = $request->getPost('contact_phone_number');
        $company_type = $request->getPost('company_type');
        $customer = $observer->getEvent()->getData('customer');

        $customer->setCustomAttribute('contact_phone_number', $contact_phone_number);
        $customer->setCustomAttribute('company_type', $company_type);
        if($company_type == 3)
        {
            $organization_name = $request->getPost('organization_name');
            $customer->setCustomAttribute('organization_name', $organization_name);
        }
        $this->customerRepository->save($customer);
 
        return $this;
    }
}
// source: https://webiators.com/how-to-save-custom-attribute-value-after-customer-register-in-magento2/
