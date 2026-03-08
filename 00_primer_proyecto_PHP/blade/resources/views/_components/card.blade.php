<div style="border: 1px solid black; border-radius: 5px; padding: 10px; margin: 5px; width: 250px">
    <!-- slot para el h3 -->
    <h3> {{ $title }}</h3>
    <img src=" {{ asset('assets/img/wallrog_wallp.jpg') }}" alt="wallpaper" width="128"></img>
    <!-- slot para el párrafo -->
    <p> {{ $content}} </p>
</div>
