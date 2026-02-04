<!DOCTYPE html>
<html>
    <head>
        <title>Tutorial Laravel 11 : #7 Template Blade Laravel</title>
    </head>
    
    <body>
        <header>
            <h2>Blog Pertamaku</h2>
            <nav>
                <a href="/blog">HOME</a>
                |
                <a href="/blog/tentang">TENTANG</a>
                |
                <a href="/blog/kontak">KONTAK</a>
            </nav>
        </header>
        <hr/>
        <br/>
        <br/>

        <h3> @yield('judul_halaman') </h3>

        @yield('konten')
        <br/>
        <br/>
        <hr/>
        <footer>
            <p>&copy; <a href="imahatma.my.id">imahatma.my.id</a>. 2020</p>
        </footer>
    </body>
</html>