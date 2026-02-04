<!DOCTYPE html> 
<html> 
    <head> 
        <title>Tutorial Laravel 11 #5 : Passing Data Controller Ke View</title> 
    </head> 
    <body> 
        <h1>Tutorial Laravel</h1> 
        <a href="https://tugasganjil.imahatma.my.id/tes1/" target="_blank">
            imahatma.my.id
        </a> 
        
        <br> 
        <p>Nama : {{ $var_nama }}</p>
        <p>Mata Pelajaran</p> 
        <ul> 
            @foreach($mapel as $m) 
                <li>{{ $m }}</li> 
            @endforeach 
        </ul>
        
    </body> 
</html>