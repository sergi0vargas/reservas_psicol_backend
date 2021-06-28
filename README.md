# Proyecto Sergio Vargas - Prueba Psicol BACKEND

backend en laravel 8 usando passport

## Reto: Sistema de reserva de Boletas

### Requisitos técnico:
- Crear un backend API REST en Laravel.
- Crear un Frontend que consuma el Servicio REST, no debe estar en la misma aplicación que se hizo para el Backend. Puede ser HTML + jQuery o React, Angular o VueJS

### Requisitos de producto
- Se debe poder hacer un registro de compradores y almacenar estos registrados en Base de Datos.
- Se debe poder consultar la disponibilidad de boletas con un servicio REST.
- Se debe poder hacer la asignación de boletas a los compradores registrados.

### Puntos a evaluar:
- Limpieza del código y uso de buenas prácticas de Laravel
- Conocimiento API Rest
- Creatividad a la hora de cumplir las funcionalidades del producto

## Project setup
```
composer install
npm install
Crear db y configurar en .env
php artisan migrate --seed
php artisan passport:install
```

## API -- para pruebas
- Registrar Usuario -- requiere name, email, password, c_password
```
http://localhost/api/register
```
- Logear Usuario -- requiere email, password -- retorna TOKEN
```
http://localhost/api/login
```
- Listar Eventos -- requiere token
```
http://localhost/api/eventos
```
- Listar Clientes -- requiere token
```
http://localhost/api/clientes
```
- Nuevo Cliente -- requiere token documento nombre correo telefono direccion
```
http://localhost/api/clientes
```
- Vender -- requiere token documento idEvento
```
http://localhost/api/clientes/vender?c=docuemento&e=idEvento
```
