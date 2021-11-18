<?php
include("config.php");
$fonts_css = <<<END
<style>
@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Black'),
        url('fonts/Gotham-Black.woff2') format('woff2'),
        url('fonts/Gotham-Black.woff') format('woff');
    font-weight: 500;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Bold'),
        url('fonts/Gotham-Bold.woff2') format('woff2'),
        url('fonts/Gotham-Bold.woff') format('woff');
    font-weight: bold;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Bold'),
        url('fonts/Gotham-Bold.woff2') format('woff2'),
        url('fonts/Gotham-Bold.woff') format('woff');
    font-weight: bold;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-BoldItalic'),
        url('fonts/Gotham-BoldItalic.woff2') format('woff2'),
        url('fonts/Gotham-BoldItalic.woff') format('woff');
    font-weight: bold;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Book'),
        url('fonts/Gotham-Book.woff2') format('woff2'),
        url('fonts/Gotham-Book.woff') format('woff');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Light'),
        url('fonts/Gotham-Light.woff2') format('woff2'),
        url('fonts/Gotham-Light.woff') format('woff');
    font-weight: 300;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-LightItalic'),
        url('fonts/Gotham-LightItalic.woff2') format('woff2'),
        url('fonts/Gotham-LightItalic.woff') format('woff');
    font-weight: 300;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-BookItalic'),
        url('fonts/Gotham-BookItalic.woff2') format('woff2'),
        url('fonts/Gotham-BookItalic.woff') format('woff');
    font-weight: 500;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-BookItalic'),
        url('fonts/Gotham-BookItalic.woff2') format('woff2'),
        url('fonts/Gotham-BookItalic.woff') format('woff');
    font-weight: normal;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Light'),
        url('fonts/Gotham-Light.woff2') format('woff2'),
        url('fonts/Gotham-Light.woff') format('woff');
    font-weight: 300;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-MediumItalic'),
        url('fonts/Gotham-MediumItalic.woff2') format('woff2'),
        url('fonts/Gotham-MediumItalic.woff') format('woff');
    font-weight: 500;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Medium'),
        url('fonts/Gotham-Medium.woff2') format('woff2'),
        url('fonts/Gotham-Medium.woff') format('woff');
    font-weight: 500;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-ThinItalic'),
        url('fonts/Gotham-ThinItalic.woff2') format('woff2'),
        url('fonts/Gotham-ThinItalic.woff') format('woff');
    font-weight: 100;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Medium'),
        url('fonts/Gotham-Medium.woff2') format('woff2'),
        url('fonts/Gotham-Medium.woff') format('woff');
    font-weight: 500;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-Thin'),
        url('fonts/Gotham-Thin.woff2') format('woff2'),
        url('fonts/Gotham-Thin.woff') format('woff');
    font-weight: 100;
    font-style: normal;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-UltraItalic'),
        url('fonts/Gotham-UltraItalic.woff2') format('woff2'),
        url('fonts/Gotham-UltraItalic.woff') format('woff');
    font-weight: 500;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-XLightItalic'),
        url('fonts/Gotham-XLightItalic.woff2') format('woff2'),
        url('fonts/Gotham-XLightItalic.woff') format('woff');
    font-weight: 300;
    font-style: italic;
    font-display: swap;
}

@font-face {
    font-family: 'Gotham';
    src: local('Gotham-XLight'),
        url('fonts/Gotham-XLight.woff2') format('woff2'),
        url('fonts/Gotham-XLight.woff') format('woff');
    font-weight: 300;
    font-style: normal;
    font-display: swap;
}
</style>
END;
echo str_replace("fonts",$siteroot."fonts/Gotham",$fonts_css);
?>
