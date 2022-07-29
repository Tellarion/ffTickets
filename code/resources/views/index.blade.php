@include('elements.header')
@include('elements.footer')
<!DOCTYPE html>
<html>
    <head>
        @yield('head')
    </head>
    <body>
        <main>
            <div class="container p-4">
                <header class="text-center">
                    <h1>ffTickets</h1>
                </header>
                <section>
                    @yield('content')
                </section>
            </div>
        </main>
    </body>
</html>