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
        <div id="dmodal" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">...</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/tickets.js"></script>
    </body>
</html>