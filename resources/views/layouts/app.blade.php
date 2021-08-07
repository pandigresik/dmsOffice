<!doctype html><html><head><meta charset="UTF-8"><base href="{{ config('app.url') }}"/><title>{{config('app.name')}}</title><meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport"><link rel="stylesheet" href="/datatables.css"><link rel="stylesheet" href="/css/app~d2eb5610.css"><link rel="stylesheet" href="/css/app~f097d790.css"><link rel="stylesheet" href="/css/datatables.css">@stack('styles')</head><body class="c-app">@include('layouts.sidebar')<div class="c-wrapper c-fixed-components">@include('layouts.header')<div class="c-body"><main class="c-main">@yield('content')</main><footer class="c-footer"><div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div><div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div></footer></div></div><script src="/js/manifest.bundle.js"></script><script src="/datatables.bundle.js"></script><script src="/js/vendor~cdd60c62.bundle.js"></script><script src="/js/vendor~3b8da2c0.bundle.js"></script><script src="/js/vendor~b286637d.bundle.js"></script><script src="/js/vendor~1673838b.bundle.js"></script><script src="/js/vendor~277a36c8.bundle.js"></script><script src="/js/vendor~2b430363.bundle.js"></script><script src="/js/vendor~ba5cce0a.bundle.js"></script><script src="/js/vendor~47a3ce02.bundle.js"></script><script src="/js/vendor~229eafb5.bundle.js"></script><script src="/js/app~296f7ffc.bundle.js"></script><script src="/js/app~7f5c4841.bundle.js"></script><script src="/js/app~01e8e0c5.bundle.js"></script><script src="/js/app~949b784d.bundle.js"></script><script src="/js/app~e96e9bea.bundle.js"></script><script src="/js/datatables~10690f1d.bundle.js"></script><script src="/js/datatables~e96e9bea.bundle.js"></script><script>moment.locale("{{ config('app.locale_moment') }}")</script>@stack('scripts')</body></html>