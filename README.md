<img src="https://avatars.githubusercontent.com/u/19496046?v=4" alt="drawing" style="width:100px;"/>

# Office Seat Booking System

We want you to write a clean and standard compliant booking system for office seats. You should be able to register an employee (First name, Last name, Payroll Number, Email address), register N number of offices and their number of seats. 
Then you should be able to book a seat for an already registered employee (no authentication method required) and provide ability to book it for a working day (08:00-17:00) or for an hour (if a seat is booked for the whole day, no one else can book it / if a seat is booked for an hour, employees can still book the same seat but for a different time period). 
Then you should display all office seats (for a working day / an hour) and mark those which are booked.

- Usage of object oriented programming
- Clean and standard compliant code
- Usage of basic design patterns
- Test your code through Unit or Integration tests
- Document your code with correct annotations

# Install Software

* Clone your project
* Go to the folder application using cd command on your cmd or terminal
* RUN:

    composer install
* Copy .env.example file to .env on the root folder
* RUN:

    php artisan key:generate
* RUN:

    php artisan migrate
* RUN:

    php artisan serve

<br />

# BASE API
    http://{BASE_URL}/api/

<br />

# Company API

| resource                     | method    | params                                           |
|:-----------------------------|:----------|:-------------------------------------------------|
| `/companies`                 | GET/HEAD  | `{}`                                             |
| `/companies`                 | POST      | `name=[required, string]`                      |
| `/companies/{company_id}`    | GET/HEAD  | `{}`                                             |
| `/companies/{company_id}`    | PUT/PATCH | `name=[required, string]`                      |
| `/companies/{company_id}`    | DELETE    | `{}`                                             |

<br />

# Office API

| resource                     | method    | params                                           |
|:-----------------------------|:----------|:-------------------------------------------------|
| `/offices`                   | GET/HEAD  | `{}`                                             |
| `/offices`                   | POST      | `address=[required, string]` <br /> `no_seats=[required, integer]` <br /> `company_id=[required, Company]`|
| `/offices/{office_id}`       | GET/HEAD  | `{}`                                             |
| `/offices/{office_id}`       | PUT/PATCH | `address=[required, string]` <br /> `no_seats=[required, integer]` <br /> `company_id=[required, Company]`|
| `/offices/{office_id}`       | DELETE    | `{}`                                             |

<br />

# Employee API

| resource                     | method    | params                                           |
|:-----------------------------|:----------|:-------------------------------------------------|
| `/employees`                 | GET/HEAD  | `{}`                                             |
| `/employees`                 | POST      | `first_name=[required, string] ` <br /> ` last_name=[required, string] ` <br /> ` payroll_no=[required, integer] ` <br /> ` email=[required, unique] ` <br /> ` company_id=[required, Company]`|
| `/employees/{employee_id}`   | GET/HEAD  | `{}`                                             |
| `/employees/{employee_id}`   | PUT/PATCH | `first_name=[required, string] ` <br /> ` last_name=[required, string] ` <br /> ` payroll_no=[required, integer] ` <br /> ` email=[required, unique] & company_id=[required, Company]`|
| `/employees/{employee_id}`   | DELETE    | `{}`                                             |s

<br />

# Reservation API

| resource                     | method    | params                                           |
|:-----------------------------|:----------|:-------------------------------------------------|
| `/reserved`                  | POST      | `office_id=[NULL, Office] ` <br /> ` employee_id=[NULL, Employee] ` <br /> ` seat_no=[NULL, integer] ` <br /> ` date=[NULL, date] ` <br /> ` start_at=[NULL, time]`  <br /> ` end_at=[NULL, time]`|
| `/reserve`                   | POST      | `office_id=[required, Office] ` <br /> ` employee_id=[required, Employee] ` <br /> ` seat_no=[required, integer] ` <br /> ` date=[required, date] ` <br /> ` start_at=[required, time]`  <br /> ` end_at=[required, time]` <br /> difference should be 1 minute like time ends at 11:59 and it should have a start time for next reservation 12:00|
