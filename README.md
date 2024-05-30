# Sistema de Gestión de Tarjetas de Crédito para Bancos

Este repositorio contiene el código del proyecto para un sistema de gestión de tarjetas de crédito diseñado para bancos. El proyecto incluye el desarrollo de una serie de APIs REST que permiten a los usuarios gestionar sus tarjetas de crédito de manera segura y eficiente. Las funcionalidades cubren desde la realización de pagos y consultas de saldo hasta la administración de seguridad y prevención de fraudes.

## Tecnologías Utilizadas
- **PHP**: Lógica del servidor y APIs REST.
- **HTML/CSS**: Frontend y diseño de interfaces.
- **SQL**: Gestión de bases de datos.
- **DevOps**: Prácticas de desarrollo y operaciones para despliegue y mantenimiento.

Este proyecto es desarrollado utilizando prácticas de DevOps, asegurando un enfoque eficiente y mantenible del ciclo de vida del software.


```
credit-card-management-system
├─ api
│  ├─ controllers
│  │  ├─ ClienteController.php
│  │  ├─ ContactoClienteController.php
│  │  ├─ CredencialesClienteController.php
│  │  ├─ CuentaBancariaController.php
│  │  ├─ DetalleDeTarjetaController.php
│  │  ├─ EstadoDeCuentaController.php
│  │  ├─ NotificacionController.php
│  │  ├─ PagoController.php
│  │  ├─ SesionController.php
│  │  ├─ TarjetaController.php
│  │  └─ TransaccionController.php
│  ├─ db.php
│  ├─ models
│  │  ├─ Cliente.php
│  │  ├─ ContactoCliente.php
│  │  ├─ CredencialCliente.php
│  │  ├─ Cuenta.php
│  │  ├─ DetalleTarjeta.php
│  │  ├─ EstadoCuenta.php
│  │  ├─ Notificacion.php
│  │  ├─ Pago.php
│  │  ├─ Sesion.php
│  │  ├─ Tarjeta.php
│  │  └─ Transaccion.php
│  └─ routes
│     └─ index.php
├─ LICENSE.txt
├─ public
│  ├─ assets
│  │  └─ logo.ico
│  ├─ CSS
│  │  ├─ styles.css
│  │  └─ styles_nav.css
│  ├─ index.html
│  ├─ js
│  │  ├─ main.js
│  │  ├─ menu.js
│  │  ├─ movements.js
│  │  ├─ notifications.js
│  │  ├─ statements.js
│  │  └─ switch_lock_unlock.js
│  └─ nav
│     ├─ creditCard.html
│     ├─ creditCardSubMenu
│     │  ├─ lock_unlock.html
│     │  └─ pin.html
│     ├─ creditLimit.html
│     ├─ generalDetails.html
│     ├─ movements.html
│     ├─ notifications.html
│     ├─ profile.html
│     ├─ Reiniciar_contraseña.html
│     ├─ reminders.html
│     └─ statements.html
└─ README.md

```