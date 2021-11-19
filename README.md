# dig4104c-0077-group-8

## Develop Phase

### Setting up the database connection

In `/develop-phase/app/`...

Edit `backend/db_config.php`, replace the default credentials for the MySQL connection with ones you have set for your server.

```php
// Set to the location of the MySQL server.
$servername = "localhost";

// Set to the user for accessing the MySQL database.
$username = "root";

// Set the password for the user accessing the MySQL database.
$password = "dig4104c";

// Set the name of the database to use for MySQL.
$database_name = "my_ucf_database";
```

### Making the application aware of the site root

In order to serve files properly, the application has to be aware of where the siteroot is located. Otherwise, the application may fail to serve many files correctly including fonts and images.

To do this, edit `backend/config.php`.

In most cases, you will not need to change the `$root` variable unless you are behind a proxy or the server hostname is set incorrectly. In these cases, you should set root to `http://localhost/` for example, if your site is only accessed using localhost.

If you are serving the application inside of a subfolder, then edit `$subfolder` with the rest of the path to where the files are located. For example, `app/`. In the scenario where you serve the application's folder directly at root level, change `$subfolder` to be an empty string.

```php
// Set to the site root if not set properly automatically. Example: http://localhost/
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

// Set to the subfolder where the site files are served from the site root. Example: app/
$subfolder = "app/";

// This is set to the site root with the subfolder. Example: http://localhost/app/
$siteroot = $root.$subfolder;
```

### Initializing the database for the first time

In order for the site to work properly, you will need to visit the root URL of where the app is being served and be redirected from there to `home/` at least once. Alternatively, you can visit `backend/database_init.php`.

If the configuration is set properly, all of the databases should be created and populated in the MySQL server. In the event you update from an older version, just drop the table named `setup` and visit the root URL again. The site will only initialize the database if that table is missing.

### Testing dark mode as guest

To test dark mode without logging in, change the row where `belongs_to='guest'` in the `preferences` table in the MySQL database.
This row should have been automatically created after the database was initialized for the first time.

| id |  setting  |  belongs_to  | value |
|----|-----------|--------------|-------|
|  1 |  darkmode |     guest    |   on  |

Alternatively, use "off" to disable dark mode for guest users.

### Updating links to resources

Throughout the application lifetime, it may occur that links to resources may be moved or changed. If this happens, the URL for a specific resource only needs to be changed once and then it will update everywhere. There are two methods of doing this.

#### 1. Updating links to resources before the application has been set up

If the application has not been set up yet, `backend/database_init.php` can be edited. To insert another resource or update a resource when the database is first initialized, just add another array item containing a MySQL query to the `$urls` array.

```php
    $urls = [
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Profile', '".$siteroot."account/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Home', '".$siteroot."home/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Settings', '".$siteroot."settings/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Social Media Directory', '".$siteroot."socialmediadirectory/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Contact Directory', '".$siteroot."contactdirectory/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Donate to UCF', 'https://www.ucf.edu/alumni-giving/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Sign Up', '".$siteroot."register/') ",
    ];
```

#### 2. Updating links to resources after the application has been set up

If the application has already been set up, then you will need to edit the `urls` table in the MySQL database directly using a tool like dbeaver or phpmyadmin. Simply change only the value in the `url` column. Changing any of the `name` keys will render the application unable to find a specific resource. In the event a resource is not found, any given link or button will take the user to a 404 page.

### Adding new cards to pages and adding new directories

The original plan was to have a dynamically updatable site with a complete enrollment system, but due to time constraints and resource limitations this is unimplemented. In order to add new cards with links to pages or add new dashboard widgets, the PHP code must be edited directly. Thankfully, in the event links change they can be updated using the special `urls` table as long as the PHP code is rendering the link using the `queryLinkFromName` function which can be included from `backend/queryLinkFromName.php`.

Each page has a special `$page_elements` variable which contains all of the elements and components that will be rendered to the page, similar to how components are rendered to HTML in the React.js framework. Each page has one `NavSidebar()` component which displays all of the main links when logged in as well as a `MainContent()` component which acts as a wrapper for the additional specific content that the page will display.

To be mobile friendly, pages are made up of `FlexRow()` components that allow for content to wrap when the page is resized. Currently, the navigation sidebar remains the same even on mobile, but in the future it would be recommended to take advantage of media queries to give users more screen realestate as it can take up to 50% of the screen on smaller devices.

So, in order to add a new card, as long as you are including the `Card()` component from `bd-kit/components/Card.php`, you could do something like the following:

```php
$page_elements = [
    new NavSidebar(),
    new MainContent(
        new FlexRow(
            new Card("Class Schedules", "Schedules", queryLinkFromName("View Class Schedule"), "<b>View your current class schedule.</b>"),
        ),
    ),
];
```
The `Card()` component takes four arguments; The first argument is the title of the card, the second argument is the label for the anchor element, the third argument is the href url for the anchor element, and the fourth and onwards are additional children that will render inside of the card body. This could be text as is shown in the above example.

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

Each of the items in the `$page_elements` array are recursively converted into HTML code via the make_html method inherited from the BDComponent class. Strings of HTML code are left as is.
