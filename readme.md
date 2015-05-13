##Product quality checker
####description
They are using a small team of data
entry staff to add and update these products for an ecommerce site, but (perhaps to be
expected) the results are very inconsistent and full of errors. You should design a simple
system that will serve as an automated testing service for these product definitions.
The system will receive a JSON fragment via an HTTP request every time a product is added
or changed.

####Installation.
1. clone this repository to your local machine by running git clone https://github.com/bikundo/product-quality-checker.git
2. Install composer, if you do not already have it installed. [instructions here.](https://getcomposer.org/download)
3. Run composer install, to install all dependencies.

####Use.
send a post request to the root of the installed application with a field called product, with input like the sample below:

```JSON
{
"email": "some@email.com",
"product": {
"title": "The Art of War",
"slug": "art-of-war",
"author": [
"Sun Tzu"
],
"description": "Some chinese book about war and stuff.",
"isbn": "9780141023816",
"publisher": "Penguin",
"images": [
"https://someplace.com/media/products/images/9780141023816_1.jpg"
]
}
}
```