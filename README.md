# Hi there, I'm Chrisdt7! 👋  

Welcome to my GitHub profile! I'm a passionate developer with a knack for coding and learning new things. 🚀  

---

## 🌟 About Me  

- 🔭 **Currently Working On**: [Koperasi-App]  
- 🌱 **Learning**: [React, Kotlin]  
- 👯 **Open to Collaborate On**: [Projects or Open Source Contributions]  
- 🤔 **Seeking Help With**: [Any Specific Help Needed]  
- 📫 **Reach Me At**: [![Whatsapp](https://wa.me/+6281328438393/)]

---

## 🛠️ Languages & Tools  

Here are some technologies I work with:  

![Python](https://img.shields.io/badge/-Python-3776AB?logo=python&logoColor=white&style=flat)  
![JavaScript](https://img.shields.io/badge/-JavaScript-F7DF1E?logo=javascript&logoColor=black&style=flat)  
![React](https://img.shields.io/badge/-React-61DAFB?logo=react&logoColor=black&style=flat)  
![Node.js](https://img.shields.io/badge/-Node.js-339933?logo=node.js&logoColor=white&style=flat)  
![Git](https://img.shields.io/badge/-Git-F05032?logo=git&logoColor=white&style=flat)  
![HTML](https://img.shields.io/badge/-HTML-E34F26?logo=html5&logoColor=white&style=flat)  
![CSS](https://img.shields.io/badge/-CSS-1572B6?logo=css3&logoColor=white&style=flat)  
![Flutter](https://img.shields.io/badge/-Flutter-02569B?logo=flutter&logoColor=white&style=flat)  
![CodeIgniter](https://img.shields.io/badge/-CodeIgniter-EF4223?logo=codeigniter&logoColor=white&style=flat)  

---

## 📈 GitHub Stats  

![Chrisdt7's GitHub stats](https://github-readme-stats.vercel.app/api?username=Chrisdt7&show_icons=true&theme=dark)  

---

## 📫 Connect with Me  

- [![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?logo=linkedin&logoColor=white)](https://linkedin.com/in/christy-tallane-a25605261/)  
- [![Facebook](https://img.shields.io/badge/Facebook-1877F2?logo=facebook&logoColor=white)](https://facebook.com/christy.danytallane)  
- [![Instagram](https://img.shields.io/badge/Instagram-E4405F?logo=instagram&logoColor=white)](https://instagram.com/danytallane/)  
- [![E-Mail](https://img.shields.io/badge/Email-D14836?logo=gmail&logoColor=white)](mailto:christytallane@gmail.com)  

Feel free to reach me anytime! 😊  

---

## 🛠️ CodeIgniter 4 Ordering App

### Prerequisites  

- **XAMPP Control Panel**  
- **CodeIgniter 4**

### Steps to Run  

1. Start **XAMPP Control Panel**. 
2. Start Apache & MySQL.
3. Create a new database named `wp2_projects` and import the database file located in `database/wp2_projects.sql`.  
4. Open your browser and go to : http://localhost/WP2-Projects/public/

   That's it! You're ready to go. 🎉

# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> **Warning**
> The end of life date for PHP 7.4 was November 28, 2022. If you are
> still using PHP 7.4, you should upgrade immediately. The end of life date
> for PHP 8.0 will be November 26, 2023.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
