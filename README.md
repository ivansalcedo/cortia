# Cortia - Catálogo de cortinas

Pequeño proyecto de ejemplo usando Leaf PHP.

Requisitos:
- PHP 7.4+
- Composer
- MySQL/MariaDB

Instalación rápida:

1. Clona el repo y entra al directorio:
   git clone git@github.com:ivansalcedo/cortia.git
   cd cortia

2. Instala dependencias:
   composer install

3. Copia el archivo de ejemplo de configuración y edítalo:
   cp .env.example .env
   (configura DB_HOST, DB_NAME, DB_USER, DB_PASS)

4. Importa el esquema de base de datos:
   mysql -u user -p database_name < database/schema.sql
   mysql -u user -p database_name < database/seeds.sql

5. Ejecuta el servidor de desarrollo:
   php -S localhost:8080 -t public

Notas:
- Rutas en routes.php
- Vistas en resources/views
- Controladores en app/Controllers

Si quieres que empuje esto a una rama distinta a "main" avísame.
