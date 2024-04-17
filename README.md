# EverBite
Restaurant menu that contains categories, subcategories and items with supporting discounts. 

# Development Process

## Design Wireframe for guest pages:

## Draw The ERD according to the requirements


! [ERD] (docs/erd.png "ERD"")
* users table represents the restaurants that are registered within the website
* categories table has all the super and the sub categories 
* items table that represents the menu items 
* discounts table is related to all the 3 other entities with a one to many polymorphic relationship
* I didn't make a relationship between the user and the items to ensure a normalized Database, we can access the item owner from the related category.


## Implementation

## Deployment
