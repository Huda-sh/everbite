# EverBite
Restaurant menu that contains categories, subcategories and items with supporting discounts. 

# Development Process

## Design Wireframe for guest pages:

## Draw The ERD according to the requirements
<iframe width="100%" height="500px" style="box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); border-radius:15px;" allowtransparency="true" allowfullscreen="true" scrolling="no" title="Embedded DrawSQL IFrame" frameborder="0" src="https://drawsql.app/teams/me-435/diagrams/everbite/embed"></iframe>

* users table represents the restaurants that are registered within the website
* categories table has all the super and the sub categories 
* items table that represents the menu items 
* discounts table is related to all the 3 other entities with a one to many polymorphic relationship
* I didn't make a relationship between the user and the items to ensure a normalized Database, we can access the item owner from the related category.


## Implementation

## Deployment
