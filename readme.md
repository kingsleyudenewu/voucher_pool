<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Voucher Pool
The vouvher pool system provides you with the ability to create recipients and allocate voucher codes to the based on the special offers you create.
<p>
  <blockquote style="color:red">
    **Please follow the steps below to view and generate voucher codes** 
  </blockquote>
</p>  
  
<div class="highlight">
<pre>
    - Clone project
    - Run composer install
    - Rename .env.example to .env
    - Create you database and set dname, username and password on the new .env file
    - Generate your laravel key
    - Run php artisan migrate
    - Run php artisan db:seed to generate dummy datas for both recipints, vouchers codes and special offers
    - Start your vouche pool app by running php artisan serve 
</pre>
</div>

<p>
  <blockquote style="color:red">
    **To view the schema diagram of this app check the root directory for a file named schema_diagram.png or you can access it online through 
    
   [Cloudinary](https://res.cloudinary.com/larastack/image/upload/v1532886554/schema_diagram.png)
  ** 
  </blockquote>
</p>  


<p>
  <blockquote style="color:red">
    **To view the endpoint documentation kindly visit the url below stating the various end point created for this app on
    
   [Postman](https://documenter.getpostman.com/view/4598323/RWMLKmQD)
  ** 
  </blockquote>
</p>  


Laravel is accessible, yet powerful, providing tools needed for large, robust applications.



## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
