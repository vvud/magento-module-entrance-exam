# Magento Module Entrance Exam
Functionality: Add Attributes, Sales Agent Feature, KnockOutJs, Modal Popup, Custome Checkout, Custome Fee &amp; Quote Total,...

# Functionality:

This module allows us to add/remove seat reservation and calculate total charge dynamically using Knockout JS.

## Install

Copy module and put it in : app/code/AHT/

Run: enable module in commandline in root folder:

php bin/magento module:enable AHT_module-name

php bin/magento setup:upgrade

## Attribute Customer
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
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/AttributeCustomer/fe.png" alt="Attribute Customer Frontend">

### *Attribute Customer Admin:*
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/AttributeCustomer/admin.png" alt="Attribute Customer Admin">

## Frontend Test: Modal
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

### *Button 1*
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/Fetest/3.png" alt="Button 3">

## KnockOut Js:

```sh
(Knockout Js (KO) is an important aspect in Magento, KO is a js library that is used widely, in almost every page in Magento)
Read an Overview about KnockoutJs, finish all the tutorial: +http://knockoutjs.com/
http://learn.knockoutjs.com/+
Use knockout js for fast order function. Ajax Filter product
```

### Images:
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/1.png" alt="1">
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/2.png" alt="2">
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/3.png" alt="3">

### Others Knockout js test:
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/practice.png" alt="practice">
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/KOjs/test.png" alt="test">

## Owl Carousel:
```sh
use Owl Carousel in Magento
```
<img src="https://github.com/vtearit/magento-module-entrance-exam/blob/main/Images/Owl/owl.png" alt="Owl Carousel">

## Custom Checkout:
```sh
```

## Custom Fee & Quote Total
```sh
```

## Sales Agent
```sh
```

#
