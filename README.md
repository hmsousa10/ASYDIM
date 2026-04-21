# ASYDIM - Consultoria e Formação Sustentável, Lda

Plataforma unificada de gestão e comércio de formações com foco em sustentabilidade e energia verde. Este projeto web completo engloba uma montra voltada para o cliente (Frontend) com design "Eco-Futurista" e uma Área Administrativa (Backoffice) robusta para a gestão completa do negócio.

## 🌟 Principais Funcionalidades

### Frontend (Cliente)
- **Design Moderno:** Interface "Eco-Futurista Premium" com partículas interativas (`particles.js`), animações de scroll (`AOS`) e *glassmorphism*.
- **Lista de Formações:** Catálogo dinâmico de formações disponíveis com detalhes e possibilidade de inscrição.
- **Área de Cliente:** Login de utilizadores e acesso a formações e reuniões.
- **Páginas Informativas:** Sobre Nós (Energia), FAQs dinâmicas e formulário de Contactos suportado por email transacional.

### Backoffice (Administrador)
- **Sistema de Permissões:** Perfis hierárquicos (*Root*, *Administrator*, *Tutor*, *Student*).
- **Dashboard:** Visão geral estatística da plataforma em tempo real.
- **Gestão de Formações:** 
  - Criação e edição com editor visual.
  - Upload de imagens seguro com ferramenta de recorte no browser (`CropperJS`).
- **Gestão de Utlizadores:** Adicionar/Editar utilizadores da plataforma (formandos) e definições de permissões. Envio automático de palavra-passe inicial por SMTP.
- **Gestão de Reuniões/Sessões:** Associação de links (Zoom/Teams) às formações para aulas síncronas.
- **Segurança Reforçada:** Sistema de *Prepared Statements* (evita SQL Injection), validação estrita de uploads (`finfo`), limpezas de sessão seguras e proteção contra *Session Fixation*.

## 🛠️ Tecnologias Utilizadas

A plataforma foi programada do zero (sem recurso a frameworks complexos de backend como Laravel), focando-se em desempenho bruto e segurança.

- **Backend:** PHP 8.x (Vanilla)
- **Base de Dados:** MySQL 8.0 (através de `mysqli`)
- **Estilização/CSS:** Tailwind CSS (via CDN para execução imediata) e Vanilla CSS Global.
- **Frontend Interações:** Vanilla JavaScript
- **Bibliotecas Auxiliares:**
  - [SweetAlert2](https://sweetalert2.github.io/) - Notificações e Toast Messages (Backoffice).
  - [CropperJS](https://fengyuanchen.github.io/cropperjs/) - Manipulação e recorte inteligente de imagens no Backend.
  - [PHPMailer](https://github.com/PHPMailer/PHPMailer) - Envio de e-mails transacionais (Registo de Utilizador, Contactos).

## 🚀 Instalação e Execução Local

Siga os passos abaixo para correr o projeto no seu ambiente de desenvolvimento.

### Pré-requisitos
- Servidor Web com PHP (ex: XAMPP, Laragon, MAMP ou PHP puro na CLI da máquina).
- Base de Dados MySQL (ex: através do MySQL Workbench ou phpMyAdmin).

### Passo 1: Base de Dados
1. Crie uma nova base de dados vazia no MySQL chamada `asydim` (ou outro nome da sua preferência, alterando depois no config).
2. Importe o ficheiro `database.sql` incluído na pasta raiz.
3. Este script criará todas as tabelas, as permissões necessárias e a conta de administração raiz.

### Passo 2: Configuração
Abra o ficheiro `includes/config.inc.php` e garanta que as credenciais refletem o seu ambiente local:

```php
// --- Database ---
$arrConfig['servername'] = 'localhost';
$arrConfig['username']   = 'root';   // Seu utilizador MySQL
$arrConfig['password']   = '1234';   // Sua password MySQL
$arrConfig['dbname']     = 'asydim';

// --- SMTP (Para envio de e-mails) ---
$arrConfig['smtp_host']     = 'sandbox.smtp.mailtrap.io';
$arrConfig['smtp_port']     = 2525;
$arrConfig['smtp_user']     = 'SEU_USER_MAILTRAP';
$arrConfig['smtp_password'] = 'SUA_PASS_MAILTRAP';
```

### Passo 3: Executar o Servidor Web Limitless (Recomendado via CLI PHP)
A forma mais rápida de iniciar o projeto sem configurações de Apache:
1. Abra um terminal na pasta do projeto (`PAP-main`).
2. Execute o comando:
```bash
php -S localhost:8000
```
3. Abra o browser em: [http://localhost:8000](http://localhost:8000)

## 🔐 Dados de Acesso (Administrador Padrão)

A conta instalada automaticamente pelo `database.sql` para testes é:

- **Página de Login Admin:** [http://localhost:8000/admins/login.php](http://localhost:8000/admins/login.php)
- **Email:** `asydim.consultora@gmail.com`
- **Password:** `admin123`

## 📂 Estrutura de Pastas Principal

- `/admins` — Todo o código correspondente à gestão do site (Backoffice). Tem o seu próprio *layout* e sistema de permissões.
- `/assets` — Imagens, logótipos e recursos estáticos partilhados ou do Frontend.
- `/includes` — Motor vital da aplicação. Onde residem funções globais, o ficheiro the configuração (`config.inc.php`) e a abstração da DB (`db.inc.php`).
- `/scripts` — Rotas ou processadores de dados (como autenticação Frontend ou processos CRON).
- `/upload` — Diretório gerado (ou providenciado) onde todos os documentos anexos e fotos das formações são armazenados localmente.

---
*Projeto implementado no âmbito do desenvolvimento sustentável da plataforma orgânica - ASYDIM.*
