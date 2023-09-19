$(document).ready(function () {
    $('.delete').on('click', function () {
        var id = $(this).data('id');
        $('#delete-row').val(id);
    });
    $('.delete-row').on('click', function () {
        $.ajax({
            url: '/livro/deletar/' + $('#delete-row').val(),
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('.csrf-token').val()
            },
            success: function (data) {
                if (data.success) {
                    window.location.href = '/livros';
                }
            }
        });
    });
    $('#limpar-busca').on('click', function () {
        $('#buscar').val(false);
        $('#form-busca').submit();
    });
});