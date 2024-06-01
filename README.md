# Sistema de Gestión de Tarjetas de Crédito para Bancos

Este repositorio contiene el código del proyecto para un sistema de gestión de tarjetas de crédito diseñado para bancos. El proyecto incluye el desarrollo de una serie de APIs REST que permiten a los usuarios gestionar sus tarjetas de crédito de manera segura y eficiente. Las funcionalidades cubren desde la realización de pagos y consultas de saldo hasta la administración de seguridad y prevención de fraudes.

## Tecnologías Utilizadas
- **Node JS**: Lógica del servidor y APIs REST.
- **HTML/CSS**: Frontend y diseño de interfaces.
- **SQL**: Gestión de bases de datos.
- **DevOps**: Prácticas de desarrollo y operaciones para despliegue y mantenimiento.

Este proyecto es desarrollado utilizando prácticas de DevOps, asegurando un enfoque eficiente y mantenible del ciclo de vida del software.


```
credit-card-management-system
├─ api
│  ├─ controllers
│  │  ├─ authController.js
│  │  ├─ clienteController.js
│  │  ├─ contactoController.js
│  │  ├─ credencialController.js
│  │  ├─ cuentaController.js
│  │  ├─ detalleTarjetaController.js
│  │  ├─ estadoCuentaController.js
│  │  ├─ notificacionController.js
│  │  ├─ pagoController.js
│  │  ├─ sesionController.js
│  │  ├─ tarjetaController.js
│  │  └─ transaccionController.js
│  ├─ models
│  │  ├─ clienteModel.js
│  │  ├─ contactoModel.js
│  │  ├─ credencialModel.js
│  │  ├─ cuentaModel.js
│  │  ├─ database.js
│  │  ├─ detalleTarjetaModel.js
│  │  ├─ estadoCuentaModel.js
│  │  ├─ notificacionModel.js
│  │  ├─ pagoModel.js
│  │  ├─ sesionModel.js
│  │  ├─ tarjetaModel.js
│  │  └─ transaccionModel.js
│  └─ routes
│     ├─ authRoutes.js
│     └─ creditCardRoutes.js
├─ app.js
├─ index.html
├─ package-lock.json
├─ package.json
├─ public
│  ├─ assets
│  │  └─ logo.ico
│  ├─ CSS
│  │  ├─ styles.css
│  │  └─ styles_nav.css
│  ├─ js
│  │  ├─ login.js
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