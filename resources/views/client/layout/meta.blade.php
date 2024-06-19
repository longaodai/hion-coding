    <title>
        {{ !empty(App\Facades\OpenGraph::get('title')) ? App\Facades\OpenGraph::get('title') : 'Hion Coding - Blogs share everything' }}
    </title>
    <meta charset="UTF-8" />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta name="description" content="{{ App\Facades\OpenGraph::get('description') }}" />
    <meta name="keywords" content="Ohion, learn code, learn IT, learn everything, Blogs share everything">
    <link rel="canonical" href="{{ Request::url() }}" />
    <!-- SEO FACABOOK -->
    <meta property="og:site_name" content="Hion Coding Blogs" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="{{ App\Facades\OpenGraph::get('title') }}" />
    <meta property="og:description" content="{{ App\Facades\OpenGraph::get('description') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ App\Facades\OpenGraph::get('image') }}" />
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="800">
    <link rel="alternate" type="application/rss+xml" title="Hion Coding - Blogs share everything"
        href="{{ route('feed') }}">
    <!-- SEO Twitter/X -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@vochilong" />
    <meta name="twitter:title" content="{{ App\Facades\OpenGraph::get('title') }}" />
    <meta name="twitter:description" content="{{ App\Facades\OpenGraph::get('description') }}" />
    <meta name="twitter:image" content="{{ App\Facades\OpenGraph::get('image') }}" />
    <!--- DMCA --->
    <meta name='dmca-site-verification' content='VHU3dWVPei9TZ1MwRjR0OERVc1o4Zz090' />
