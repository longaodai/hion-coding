    <title>
        {{ !empty(App\Facades\OpenGraph::get('title')) ? App\Facades\OpenGraph::get('title') : 'Hion Coding - Blogs share everything' }}
    </title>
    <meta charset="UTF-8" />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta name="description" content="{{ App\Facades\OpenGraph::get('description') }}" />
    <meta name="keywords" content="Ohion, learn code, learn IT, learn everything, Blogs share everything">
    <link rel="canonical" href="{{ Request::url() }}" />
    <!-- SEO FACABOOK -->
    <meta property="og:site_name" content="Ohion Blogs" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="{{ App\Facades\OpenGraph::get('title') }}" />
    <meta property="og:description" content="{{ App\Facades\OpenGraph::get('description') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ App\Facades\OpenGraph::get('image') }}" />
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="800">
