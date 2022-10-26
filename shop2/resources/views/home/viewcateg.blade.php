
   </head>@include('home.header')
   <body>@foreach($products as $prod)
    <h1>{{$prod->title}}</h1>
</body>@endforeach