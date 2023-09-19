@if(session('notificacao'))
    <div class="row">
        <div class="alert alert-icon alert-{{ session('cor-notificacao') }} alert-dismissible fade in" role="alert" style="margin-top: 20px;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="mdi {{ session('icone-notificacao') }}"></i>
            {{ session('notificacao') }}
        </div>
    </div>
    @php
        session()->put('icone-notificacao', '');
        session()->put('notificacao', '');
        session()->put('cor-notificacao', '');
    @endphp
@endif