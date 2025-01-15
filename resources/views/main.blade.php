<!doctype html>
<html lang='en'>
<head>
    <title>My Store</title>
    <meta charset='utf-8'>
    <link href=data:, rel=icon>
</head>
<body>

<header>
    <h1>My Store</h1>
</header>

<nav>
    <ul>
        <li><a href='/products'>Products</a></li>
        <!-- If we link to /products without a specifying category, this will produce an error. I’ll address that later in this guide. -->
        <li><a href='/contact'>Contact</a></li>
        <li><a href='/products/create'>Add New Product</a></li>
        <!-- A contact page doesn’t yet exist, but I’m including it here just as a demonstration of links you might have in a nav bar. For practice, try your hand at creating a contact page. -->
    </ul>
</nav>

<main>
    @yield('page-content')
</main>

</html>
