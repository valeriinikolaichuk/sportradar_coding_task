<div align="center">
  <h2>sports event calendar</h2>
  <h4><a href="https://github.com/valeriinikolaichuk/sportradar_coding_task">sports_event_calendar_github</a></h4>
</div>
  <br />
<details open="open">
<summary>Contents</summary>

- [About the project](#about-the-project)
  - [Built With](#built-with)
- [Database](#database)
- [Project Structure](#project-structure)
- [Testing](#testing)
- [Author](#author)

</details>

---

## About the Project



### Built With

#### [Docker](https://www.docker.com/)
An open platform for developing, shipping, and running applications. It allows to package application and all its dependencies into standardized, lightweight containers. 

#### [Symfony](https://symfony.com/)
An open-source, free PHP framework designed for building complex web applications, APIs, and microservices.

#### [PHPUnit](https://phpunit.de/)
A programmer-oriented testing framework for PHP. It is an instance of the xUnit architecture for unit testing frameworks, allowing developers to automate testing, ensure code quality, and find regressions during the development of complex applications.

#### [MySQL](https://www.mysql.com/)
An open-source relational database management system based on SQL. It provides a fast, reliable, and scalable solution for managing structured data, widely used for web applications and content management systems.

#### [Turbo](https://turbo.hotwired.dev/)
A set of complementary techniques for speeding up page changes and form submissions, dividing pages into independent components, and delivering partial page updates over WebSocket.  It allows you to create high-performance web applications without writing much JavaScript.

#### [Stimulus](https://stimulus.hotwired.dev/)
A modest JavaScript framework for the HTML you already have. It focuses on enhancing static HTML by connecting JavaScript objects  to elements on the page using simple data attributes, making it perfect for adding specific interactive behaviors.

- Notes:
Turbo and Stimulus are used to update the events table dynamically without a full SPA. Turbo handles partial page updates via <turbo-frame>, while Stimulus manages user interactions such as sorting and filtering with minimal JavaScript. This approach keeps the backend responsible for all business logic, reduces unnecessary page reloads, and avoids the overhead of heavy frontend frameworks.

---

## Database

For a detailed explanation of the database structure see:  
➡ [Database Documentation](docs/database/database.md)

## Project Structure

For a detailed explanation of the system architecture see:    
➡ [Architecture Documentation](docs/modules/architecture.md)

