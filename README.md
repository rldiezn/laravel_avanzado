# 🚀 Laravel Avanzado - Proyecto de Práctica

> **Proyecto educativo** donde aplico conceptos avanzados de Laravel siguiendo las mejores prácticas del desarrollo web moderno.

## 📚 **Sobre este Proyecto**

Este repositorio contiene mi implementación práctica del **Curso de Laravel Avanzado** impartido por **Víctor Arana Flores** en la plataforma **CodersFree**. Aquí aplico conceptos avanzados como:

- ✨ **Arquitectura MVC avanzada**
- 🔐 **Sistema de autenticación robusto**
- 📊 **Gestión avanzada de base de datos**
- 🎨 **Interfaces de usuario modernas**
- ⚡ **Optimización de rendimiento**
- 🧪 **Testing automatizado**
- 🐳 **Containerización con Docker**

## 🛠️ **Stack Tecnológico**

| Tecnología | Versión | Propósito |
|------------|---------|-----------|
| **Laravel** | 11.x | Framework PHP principal |
| **PHP** | 8.4 | Lenguaje backend |
| **MySQL** | 8.0 | Base de datos |
| **Docker** | Latest | Containerización |
| **Laravel Sail** | Latest | Entorno de desarrollo |
| **Tailwind CSS** | 3.x | Framework CSS |
| **Alpine.js** | 3.x | JavaScript reactivo |

## 🚀 **Instalación Rápida**

### **Prerrequisitos**
- Git
- Docker Desktop
- WSL 2 (para Windows)

### **Pasos de Instalación**

```bash
# 1. Clonar el repositorio
git clone https://github.com/[tu-usuario]/laravel_avanzado.git
cd laravel_avanzado

# 2. Instalar dependencias
composer install

# 3. Configurar entorno
cp .env.example .env

# 4. Generar clave de aplicación
php artisan key:generate

# 5. Levantar entorno con Sail
./vendor/bin/sail up -d

# 6. Ejecutar migraciones
./vendor/bin/sail artisan migrate

# 7. Acceder a la aplicación
# http://localhost o http://laravel_avanzado.test
```

## 🪟 **Instalación en Windows 11**

¿Usas Windows? ¡No hay problema! He documentado todo el proceso paso a paso:

📖 **[Guía Completa de Instalación para Windows 11](docs/INSTALLATION-GUIDE-WINDOWS-11.md)**

Esta guía incluye:
- ✅ Configuración de WSL 2
- ✅ Instalación de Docker Desktop  
- ✅ Resolución de problemas comunes
- ✅ Configuración de alias para Sail
- ✅ Setup del gestor de base de datos
- ✅ Soluciones a errores reales encontrados

**📥 También disponible en:** [PDF](docs/INSTALLATION-GUIDE-WINDOWS-11.pdf)

## 🎯 **Características Implementadas**

### 🔐 **Autenticación y Autorización**
- [ ] Sistema de login/registro
- [ ] Roles y permisos
- [ ] Middleware personalizado
- [ ] Autenticación de API

### 📊 **Gestión de Datos**
- [ ] Modelos con relaciones complejas
- [ ] Factories y Seeders
- [ ] Query Builder avanzado
- [ ] Eloquent ORM optimizado

### 🎨 **Interfaz de Usuario**
- [ ] Dashboard administrativo
- [ ] Componentes reutilizables
- [ ] Responsive design
- [ ] Interacciones JavaScript

### ⚡ **Rendimiento**
- [ ] Cache de consultas
- [ ] Optimización de assets
- [ ] Lazy loading
- [ ] Queue jobs

### 🧪 **Testing**
- [ ] Unit tests
- [ ] Feature tests
- [ ] Browser tests (Dusk)
- [ ] API tests

## 📁 **Estructura del Proyecto**

```
laravel_avanzado/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent
│   ├── Services/            # Lógica de negocio
│   └── ...
├── database/
│   ├── migrations/          # Migraciones
│   ├── factories/           # Factories para testing
│   └── seeders/            # Datos de prueba
├── docs/                   # Documentación
│   ├── INSTALLATION-GUIDE-WINDOWS-11.md
│   └── INSTALLATION-GUIDE-WINDOWS-11.pdf
├── resources/
│   ├── views/              # Vistas Blade
│   ├── js/                 # JavaScript
│   └── css/               # Estilos
└── tests/                 # Tests automatizados
```

## 🔧 **Comandos Útiles**

```bash
# Alias recomendado para Sail
alias sail='./vendor/bin/sail'

# Comandos frecuentes
sail up -d              # Levantar entorno
sail down               # Parar entorno
sail artisan migrate    # Ejecutar migraciones
sail artisan test       # Ejecutar tests
sail composer install   # Instalar dependencias
sail npm install       # Instalar dependencias frontend
sail npm run dev        # Compilar assets para desarrollo
```

## 🎓 **Aprendizajes del Curso**

### **Módulo 1: Fundamentos Avanzados**
- [x] Configuración profesional del entorno
- [x] Arquitectura de aplicaciones Laravel
- [ ] Patrones de diseño en PHP

### **Módulo 2: Base de Datos**
- [ ] Relaciones complejas
- [ ] Optimización de queries
- [ ] Migrations avanzadas

### **Módulo 3: APIs y Servicios**
- [ ] API RESTful
- [ ] Autenticación JWT
- [ ] Documentación con Swagger

### **Módulo 4: Frontend Moderno**
- [ ] Integración con Vue.js/React
- [ ] Componentes dinámicos
- [ ] Real-time con WebSockets

## 🐛 **Troubleshooting**

### **Problemas Comunes:**

**❌ Error: `sail` command not found**
```bash
# Solución: Usar ruta completa o crear alias
./vendor/bin/sail ps
alias sail='./vendor/bin/sail'
```

**❌ Error: Puerto 80 ocupado**
```bash
# Solución: Parar Apache local
sudo service apache2 stop
sail up
```

**❌ Error: Cannot connect to Docker daemon**
```bash
# Solución: Verificar Docker Desktop
docker --version
# Reiniciar Docker Desktop si es necesario
```

**Para más soluciones detalladas, consulta la [guía de instalación](docs/INSTALLATION-GUIDE-WINDOWS-11.md).**

## 🤝 **Contribuciones**

¿Encontraste un bug o tienes una sugerencia? ¡Las contribuciones son bienvenidas!

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -m 'Add: nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📜 **Licencia**

Este proyecto está bajo la Licencia MIT. Ver [LICENSE](LICENSE) para más detalles.

## 👨‍💻 **Autor**

**[Tu Nombre]**
- 🌐 GitHub: [@tu-usuario](https://github.com/tu-usuario)
- 💼 LinkedIn: [Tu LinkedIn](https://linkedin.com/in/tu-perfil)
- 📧 Email: tu.email@ejemplo.com

## 🎉 **Agradecimientos**

- **Víctor Arana Flores** - Instructor del curso en CodersFree
- **CodersFree** - Plataforma educativa
- **Laravel Community** - Por el increíble framework
- **Comunidad Open Source** - Por todas las herramientas utilizadas

---

## ⭐ **¿Te gustó este proyecto?**

Si este proyecto te fue útil, considera:
- ⭐ Darle una estrella al repositorio
- 🍴 Hacer un fork para tus propios experimentos
- 📢 Compartir con otros desarrolladores
- 💬 Dejar comentarios o sugerencias

---

## **🚀 ¡Happy Coding! 🚀**
