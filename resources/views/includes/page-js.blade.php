<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/theme/default.min.js"></script>
<script src="/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>

@include('sweet::alert')

@stack('scripts')
@yield('js')

<script type="text/javascript">
    $(document).on('click', '.btn-delete', function (event) {
        event.preventDefault();

        var button = $(this);
        var link = $(this).attr('href');

        swal({
            buttons: {
                cancel: "Não, quero cancelar!",
                catch: {
                    text: "Sim, pode excluir!",
                },
                defeat: true,
            },
            title: "Tem certeza que deseja excluir?",
            text: "Você não poderá recuperar essa informação!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(function(isConfirm){
            if (isConfirm) {
                window.location.href = link;
            }
        });
    });
</script>
