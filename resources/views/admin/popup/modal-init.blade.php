<script>
    jQuery(document).ready(function($) {
        $("#modal").iziModal({
            title: '{{ $popup->title[app()->getLocale()] }}',
            headerColor: '{{ $popup->color ?? '#88A0B9' }}',
            width: {{ $popup->width ?? 600 }},
            autoOpen: false,
            closeOnEscape: {{ $popup->closeOnEscape == 'yes' ? 'true' : 'false' }},
            closeButton: {{ $popup->closeButton == 'yes' ? 'true' : 'false' }},
            overlay: true,
            overlayClose: {{ $popup->overlayClose == 'yes' ? 'true' : 'false' }},
            timeout: {{ $popup->time > 0 ? $popup->time * 1000 : 0 }},
            timeoutProgressbar: true,
            pauseOnHover: {{ $popup->pauseOnHover == 'yes' ? 'true' : 'false' }},
            fullscreen: {{ $popup->fullScreenButton == 'yes' ? 'true' : 'false' }},
            zindex: 9999,
        });
    });
</script>
