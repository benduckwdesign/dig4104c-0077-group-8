# dig4104c-0077-group-8

## Develop Phase

### Setting up the database connection

In `/develop-phase/xampp/htdocs/`...

Edit `MyUCFDashboard/backend/getDatabaseConnection.php`, replace the default credentials for the MySQL connection with ones you have set for your XAMPP install.

```php
    $servername = "localhost";
    $username = "root";
    $password = "dig4104c";
    $database_name = "my_ucf_database";
```

### Testing dark mode as guest

To test dark mode without logging in, add a row to the `preferences` table in the MySQL database.

| id |  setting  |  belongs_to  | value |
|----|-----------|--------------|-------|
|  1 |  darkmode |     guest    |   on  |

Alternatively, use "off" to disable dark mode for guest users.

### Developing new components

When making a new component, extend the BDComponent class from `/bd-kit/Component.php`.
Use PHP's default `__construct` method to set object's children `$this->children` that will be rendered when the page is visited.
For an example of how this works, look at the code at the bottom of `index.php`:

```php
$child_html = "";

$i = 0;
while ($i < count($page_elements)) {
    if (is_string($page_elements[$i]) == TRUE) {
        $child_html = $child_html . $page_elements[$i];
    } else {
        if (is_subclass_of($page_elements[$i], 'BDComponent') == TRUE) {
            $child_html = $child_html . $page_elements[$i]->make_html();
        } else {
            error_log("TestPage: BDComponent: Child in component children is not of class component or string.", 3, "./errors.log");
            die();
        }
    }
    $i++;
}

echo $child_html;
```

Each of the items in the `$page_elements` array are recursively converted into HTML code via the make_html method inherited from the BDComponent class.
Strings of HTML code are left as is.