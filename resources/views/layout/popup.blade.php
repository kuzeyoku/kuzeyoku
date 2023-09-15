@section("script")
<script src="{{ asset('assets/js/izimodal.min.js') }}"></script>
@switch($popup->type)
@case("image")
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#modal").iziModal({
            headerColor: '#88A0B9',
            width: 700,
            autoOpen: 1,
            closeOnEscape: true,
            closeButton: true,
            overlay: true,
            overlayClose: true,
            timeout: 0,
            timeoutProgressbar: true,
            pauseOnHover: true
        });
    });
</script>
@case("video")
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#modal").iziModal({
            title: '{{ $popup->getTitle() }}',
            background: 'black',
            overlayClose: true,
            iframe: true,
            autoOpen: true,
            iframeURL: '{{ $popup->video }}',
            width: 700,
            borderBottom: false,
        });
    });
</script>
@break
@default
@endswitch
@endsection
