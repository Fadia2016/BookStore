# BookStore


	The project is about a web page that will allow students to buy and sell their books to each other. A student will post a picture of the book, ISBN, title, and the price of the book. The students who are looking for the book will find the book and the information of the one who posted it (Email.) So, they can contact each other and agree on a place on campus to meet. The student can delete, or unpublish any book after it has been sold. There is an admin who can post, delete, or unpublished any book in the website.
In this project, I used MYSQL as database. The database is called “project” and it contains three tables. 

First table is Called: ‘users’

| Field     | Type        | Null | Key     | Default | Extra          |
| id        | int(8)      | No   | Primary | NULL    | Auto_increment |
| firstname | varchar(25) | No   |         | NULL    |                |
| lastname  | varchar(25) | No   |         | NULL    |                |
| username  | varchar(25) | No   |         | NULL    |                |
| phone     | varchar(15) | No   |         | NULL    |                |
| email     | varchar(50) | No   |         | NULL    |                |
| password  | varchar(25) | No   |         | NULL    |                |
| admin     | tinyint(4)  | No   |         | NULL    |                |


Second table is called: ‘books’

| Field     | Type         | Null | Key     | Default             | Extra          |
| id        | int(8)       | No   | Primary | NULL                | Auto_increment |
| user_id   | int(8)       | No   | Foreign | NULL                |                |
| dept_id   | int(8)       | No   | Foreign | NULL                |                |
| title     | varchar(100) | No   |         | NULL                |                |
| image     | varchar(100) | No   |         | NULL                |                |
| price     | int(6)       | No   |         | NULL                |                |
| body      | text         | No   |         | NULL                |                |
| published | tinyint(4)   | No   |         | NULL                |                |
| isbn      | varchar(20)  | No   |         | NULL                |                |
| create_ at| timestamp    | No   |         | current_timestamp() |                |

Third table is called: ‘depts’

| Field        | Type         | Null | Key     | Default | Extra          |
| id           | int(8)       | No   | Primary | NULL    | Auto_increment |
| name         | varchar(100) | No   |         | NULL    |                |
| description  | varchar(100) | No   |         | NULL    |                |


Once you have the three tables ready in MYSQL, you will be able to use the project.
