# Products discount
This sample Symfony project pretends to demonstrate a simple API REST App which applies discounts to products, based on discount rules, also let filter results by some rules.  
With a DDD architecture, is also TDD and has applied SOLID principles, PSR-X and typical common coding patterns like DTO or Polymorphism.  

## Requirements
Curl https://curl.se/  
GNU Make https://www.gnu.org/software/make/  
PHP 8 (with required extensions for Symfony 6)  
MySQL >8  

## Install and run the project
- Download this repository  
- Run the command `make install run`  

## Testings
To run PHPUnit tests `bin/phpunit`  

## Specifications and use cases.
- The prices are integers for example, 100.00€ would be 10000.  
- Products have also categories.  
- A DiscountRules entity is set from where you can apply discount rules either based on specific products, either by categories.  
- If categories discounts may collide with specific products discounts, only the higher discount is applied.
- A single GET endpoint is provided in /products path with two query string parameters: category (integer id) and priceLessThan (optional integer).  
`/products?category=1`   
`/products?category=1&priceLessThan=99999`   
- Currency response is always euros EUR.  
- Response is limited to 5, no matter the order.
- Example result outputs:  
   
`Example product with a discount of 30% applied.`   
```{
    "sku": "000001",
    "name": "Product example 1",
    "category": "cat1",
    "price": {
        "original": 99900,
        "final": 69930,
        "discount_percentage": "30%",
        "currency": "EUR"
    }
}
```   
   
`Example product without a discount.`   
```{
    "sku": "000002",
    "name": "Product example 2",
    "category": "cat2",
    "price": {
        "original": 99900,
        "final": 99900,
        "discount_percentage": null,
        "currency": "EUR"
    }
}```   
