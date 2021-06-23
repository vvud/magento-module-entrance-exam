# Magento Module Entrance Exam
Functionality: Add Attributes, Sales Agent Feature, KnockOutJs, Modal Popup, Custome Checkout, Custome Fee &amp; Quote Total,...

## Install
```sh
Copy module and put it in : app/code/AHT/

Run: enable module in commandline in root folder:

php bin/magento module:enable AHT_module-name

php bin/magento setup:upgrade
```



# Attribute Customer
```sh
Add the following fields for customers to complete when registering:
1. Organization Name (Textfield) 
2. Contact Phone Number including country code (Textfield)
3. Please select your Company Type (Dropdown)
- CBD Manufacturer
- CBD Brand and Marketing company
- CBD Extractor
- Other
If Other - please specify (Organization Name only appear if "Other" is selected )
```
### *Attribute Customer Frontend:*
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/AttributeCustomer/frontend.png" alt="Attribute Customer Frontend">

### *Attribute Customer Admin:*
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/AttributeCustomer/admin.png" alt="Attribute Customer Admin">



# Frontend Test: Modal
```sh
1. Create a new frontend page
Create a new page in frontend that has Magento Layout, page’s url: http://<magento_baseurl>/<module_route>
Add a button to the content of this page, e.g:
```
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/Fetest/2.png" alt="Frontend Test">

```sh
2. Learn how to use RequireJS, load out “jquery” library (already in Magento)
Whenever the button created above clicked, alert “Hello World!”
Now that the alert works, delete it. Use “magento alert modal” instead, find out how to use “magento alert modal”
Create a 2nd button. Whenever clicked, a Modal (a concept in magento, simply it’s a popup javascript window) is drop downed.
This Modal contain: a login window, e.g: (notice: you can style it yourself)
```

### *Button 1*
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/Fetest/1.png" alt="Button 1">

### *Button 2*
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/Fetest/3.png" alt="Button 2">

### *Button 3*
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/Fetest/4.png" alt="Button 3">



# KnockOut Js:

```sh
(Knockout Js (KO) is an important aspect in Magento, KO is a js library that is used widely, in almost every page in Magento)
Read an Overview about KnockoutJs, finish all the tutorial: +http://knockoutjs.com/
http://learn.knockoutjs.com/+
Use knockout js for fast order function. Ajax Filter product
```

### *Images*:
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/1.png" alt="1">
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/2.png" alt="2">
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/3.png" alt="3">

### *Others Knockout js test*:
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/practice.png" alt="practice">
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/test.png" alt="test">



# Custom Checkout - Delivery:
```sh
1. Add a step page checkout for customer to input delivery date and delivery comment
Admin can check and edit delivery date and delivery comment in backend (Order detail)
2. Use code to Company input is required.
```
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/CustomCheckout/required.png" alt="Company Required">
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/CustomCheckout/addStep.png" alt="Delivery Step">




# Custom Fee & Quote Total
```sh
Add fee for order with each payment method
Required:
With each payment method, admin can edit fee for total order
Create configuration : 
```
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/CustomFee/1.png" alt="Custom Fee">
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/CustomFee/2.png" alt="Custom Fee">




# Sales Agent
```sh
1. Introduction
    - Implement a system consisting of Sales Agent (SA).
    - SA is a customer as well. 
    - SA will be assigned with products, and receive commission when customer buy their product.

2. New Attributes
    Customer: is_sales_agent (boolean)
    Product: sale_agent_id, commission_type (fixed/percent), commission_value

3. Tables
    entity_id
    order_id
    order_item_id
    order_item_sku
    order_item_price
    commision_percent
    commission_value

- Be sure to apply an appropriate data type to each field. ( You can edit the table structure if you feel necessary )

4. Features
a. Backend:
    - Admin will be able to assign SA, commission type, value to each product.
    - Commission report. Only do 1 out of 2 below:
    - According to Product, filterable by SKU with Ajax load.
    - According to SA, filterable by Email with Ajax load.
b. Frontend:
    - When customer successfully place an order, SA will immediately receive commission.
    - When a SA logged in to his account, he can preview (somewhere in My Account) all product assigned to him (you should display this with a table).
    - Product name, sku, url to the product
    - Commission type, commission value..
c. Global:
    - SA’s first name will be displayed as 
    - “Sales Agent: <firstname>” instead of “<firstname>” on all pages of the website

```

#
