<script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        var nextPage = '{{ $page_content2??0 }}';

        CKEDITOR.dtd.a.div = 1;
        CKEDITOR.dtd.a.p = 1;
        CKEDITOR.dtd.$removeEmpty.span = 0;
        CKEDITOR.dtd.$removeEmpty.i = 0;
        CKEDITOR.config.allowedContent = true;

        // CKEDITOR.config.extraAllowedContent = '*{*}';

        CKEDITOR.replace('details', {
            height: 400,
            // baseFloatZIndex: 10005,
            removeButtons: 'PasteFromWord',
            extraPlugins: 'lineheight',
        });

        CKEDITOR.config.contentsCss = [CKEDITOR.config.contentsCss,
            '{{asset('front/css/bootstrap.min.css')}}',
            '{{asset('front/css/style.css')}}',
        ];
        CKEDITOR.scriptLoader.load(['{{asset('front/js/jquery-3.4.1.min.js')}}',
            '{{asset('front/js/plugins.js')}}',
            '{{asset('front/js/main.js')}}',


        ], function (completed, failed) {
            console.log('Number of scripts loaded: ' + completed.length);
            console.log('Number of failures: ' + failed.length);
        });

    </script>
