 sample_project
===============

### Implementation of food ordering system .

---
 Requirements
---

- PHP 5.3 and above.
- Mysql database server
---

 Installation
---
- install mysql database server
- install php . based on the following link : 
  - https://www.sitepoint.com/how-to-install-php-on-windows/
- define a database server named sample_project :


```sh
mysql -u root -p 
create database sample_project
```

- change username and password in .env file
- open terminal.
- navigate to project directory . 
- run :

```sh
php artisan migrate 
php artisan serve
```
- the server is alive . now you can send requests to it . 

---
API 's
---
### /menu : 
show all available foods with its ingredient

### /order/{food_id}
to order some of available foods showed in menu . 
