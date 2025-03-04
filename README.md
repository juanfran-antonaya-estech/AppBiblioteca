<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Puesta a punto

1. Define en .env.example la base de datos a la que se va a conectar.
2. Ejecuta composer run ready-seed (run ready no hace seed a la base de datos)
   3. los comandos ready ahora actualizan los paquetes de composer
3. Ejecuta en otra terminal npm install y npm run dev
4. Abrir el enlace proporcionado por serve (definido por defecto como **127.0.0.1:8000**)

# Login
- El login de la API se realiza en /api/v1/login
- Los campos que tienes que introducir en el body del json son email y password.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
