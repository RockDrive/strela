<div class="search-form search-form_page_inner">
    <div class="search-form__container">
        <div id="tl-search-form">
            <a href="https://www.travelline.ru/products/tl-hotel/" class="search-form__link"></a>
        </div>
        <script type="text/javascript">

            (function (w) {
                var q = [
                    [
                        'setContext',
                        'TL-EXPRESS.express-new-aa',
                        '{{app()->getLocale()}}'
                    ],
                    ['embed', 'search-form', {
                        providers: [['16788']],
                        container: 'tl-search-form',

                        nights: 1,
                        onsubmit: function (params, url) {

                            try {
                                sendEvent('click', 'Urban', 'SF_FIND_ROOMS_BUTTON');
                            } catch (error) {
                            }

                        }
                    }]

                    , ['embed', 'smart-widget', {key: '622a0c71-eebe-eb11-b80a-6c3be5bdb4d4'}]

                ];
                var t = w.travelline = (w.travelline || {}), ti = t.integration = (t.integration || {});
                ti.__cq = ti.__cq ? ti.__cq.concat(q) : q;
                if (!ti.__loader) {
                    ti.__loader = true;
                    var d = w.document, p = d.location.protocol, s = d.createElement('script');
                    s.type = 'text/javascript';
                    s.async = true;
                    s.src = (p == 'https:' ? p : 'http:') + '//ibe.tlintegration.com/integration/loader.js';
                    (d.getElementsByTagName('head')[0] || d.getElementsByTagName('body')[0]).appendChild(s);
                }
            })(window);
        </script>


    </div>
</div>
