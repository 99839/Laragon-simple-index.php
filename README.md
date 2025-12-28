# Laragon Dashboard Documentation

## Project Overview

A web control panel for Laragon local development environment, providing site management, server information monitoring, and PHP environment detection capabilities.

![screenshot](https://github.com/99839/Laragon-simple-index.php/blob/main/screenshot.png)

## Features

### 1\. Site Management

-   **Automatic Site Discovery**: Scans directories and automatically generates site cards

-   **Platform Intelligence**: Automatically detects project types (WordPress, Laravel, Drupal, etc.)

-   **Platform Icons**: Displays appropriate SVG icons for different platforms

-   **Color Coding**: Generates unique colors for each site based on name

-   **Quick Access**: One-click access to sites and admin panels


### 2\. PHP Environment Detection

-   **Server Information**: Displays server software, IP, port, CPU, memory, etc.

-   **PHP Configuration**: Shows PHP version, memory limits, execution time, etc.

-   **Extension Detection**: Detects and displays status of installed PHP extensions

-   **Client Information**: Shows browser info, screen resolution, etc.


### 3\. Tool Integration

-   **Quick Links**: Fast access to phpMyAdmin, Redis, Memcached, and other tools

-   **PHP Information**: Complete PHP configuration information page


## Directory Structure

```
/
├── index.php              # Main program file
├── project-directories/   # Site directories in Laragon
├── asset/                 # Assets directory (ignored)
└── vendor/                # Dependencies directory (ignored)
```


## Configuration

### Domain Suffix Configuration

```php
// Edit this line in the configuration section
$DomainPostFix = 'test'; // Change to your preferred suffix
```

Site access format: `https://{directory-name}.{domain-suffix}`

### Timezone Setting

Defaults to Asia/Shanghai:

```php
// Modify in getGreeting() function:
new DateTimeZone('America/New_York') // Example change
```
new DateTimeZone('Asia/Shanghai')

### MySQL Connection

Automatically tries the following passwords:
1.  Password from Laragon configuration file
2.  Empty password

```php
// Modify getMySQLServerVersion() function
$link = mysqli_connect('localhost', 'username', 'yourpassword');
```

## Usage Instructions

### 1\. Basic Usage

1.  Place the index.php file in Laragon's root directory

2.  Access `http://localhost/` to view site list

3.  Click site cards to access corresponding sites


### 2\. Environment Detection

1.  Access `http://localhost/?q=probe`

2.  View server and PHP environment information

3.  Check extension installation status


### 3\. Tool Access

-   **phpMyAdmin**: `http://localhost/phpmyadmin/`

-   **Redis**: `http://localhost/redis/`

-   **Memcached**: `http://localhost/memcached/`


## Customization

### Adding New Platform Detection

```php
// Add new detection logic in `detectProjectPlatform()` function:
elseif (file\_exists($folderPath . '/your-platform-file')) {
    $platform \= 'YourPlatform';
    $icon \= 'your-icon';
    $admin\_link \= $baseUrl . '/admin-path';
}
```

### Adding New Icons

```php
// Add new icons in `get_svg()` function's switch statement:
case 'your-icon':
    $view\_box \= '0 0 24 24';
    $svg\_path \= '<path ... />';
    break;
```

## Important Notes

1.  **Security**: For local development environment only

2.  **Directory Permissions**: Ensure web server has directory read permissions

3.  **Performance Impact**: Directory scanning may affect performance (with many sites)

4.  **Caching**: No caching mechanism - rescans directories on each refresh


## Troubleshooting

### Issue: Sites Not Displaying

-   Check if directory is in Laragon root directory

-   Confirm directory is not `asset` or `vendor`

-   Check web server permissions


### Issue: Incorrect Platform Detection

-   Check if platform signature files exist

-   Verify detection logic

-   Check PHP error logs


### Issue: Icons Not Displaying

-   Check SVG path correctness

-   Verify viewBox settings

-   Check console error messages


## Changelog

### v1.0

-   Initial release

-   Automatic site discovery support

-   Platform intelligence detection

-   Built-in PHP environment probe

-   Responsive design

## License

Based on Laragon project, following the corresponding open source license.

---

_Note: This tool is for local development environment only. Do not use in production environments._
