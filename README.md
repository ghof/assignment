## Backend Assignment

## Task
You were given a sample [Laravel][laravel] project which implements sort of a personal wishlist
where user can add their wanted products with some basic information (price, link etc.) and
view the list.

#### Refactoring
The `ItemController` is messy. Please use your best judgement to improve the code. Your task
is to identify the imperfect areas and improve them whilst keeping the backwards compatibility.

#### New feature
Please modify the project to add statistics for the wishlist items. Statistics should include:

- total items count
- average price of an item
- the website with the highest total price of its items
- total price of items added this month

The statistics should be exposed using an API endpoint. **Moreover**, user should be able to
display the statistics using a CLI command.

Please also include a way for the command to display a single information from the statistics,
for example just the average price. You can add a command parameter/option to specify which
statistic should be displayed.

## Open questions.

> **All the statistics are available in the /statistics endpoint**

for example you can visit http://127.0.0.1:8000/statistics to check it

the response will be something like
```json lines
{
    "statistics": {
        "website with the highest total price of its items": "store.example.com",
        "total items count": 36,
        "average price of an item": 6167.5375,
        "total price of items added this month": 222031.35
    }
}
```
> **they can be also displayed using below command**

`php artisan statistics:display [...]`.

the command accepts 4 arguments
- total: to get total items count
- avg: to get average price of an item
- website: to get the website with the highest total price of its items
- price: to get total price of items added this month

The output of `php artisan statistics:display website avg count price` will look like

```
+---------------------------------------------------+-------------------+
| information                                       | value             |
+---------------------------------------------------+-------------------+
| website with the highest total price of its items | store.example.com |
| average price of an item                          | 6167.5375         |
| total items count                                 | 36                |
| total price of items added this month             | 222031.35         |
+---------------------------------------------------+-------------------+
```



> **For the refactoring, would you change something else if you had more time?**  

If I got more time I will 
- Write Unit Tests for the statistics feature.
- Create translation files to replace $labels in StatisticsService
- Create new migration to add new indexed column in items table to store the domain from the given url
as this will optimise the query of getting website with the highest total price of its items
- Upgrade to most recent Laravel version

## Running the project
This project requires a database to run. For the server part, you can use `php artisan serve`
or whatever you're most comfortable with.

You can use the attached DB seeder to get data to work with.

#### Running tests
The attached test suite can be run using `php artisan test` command.

[laravel]: https://laravel.com/docs/8.x
