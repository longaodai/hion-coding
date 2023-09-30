<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ Hion Coding ]]></title>
        <link><![CDATA[ https://hioncoding.com/feed ]]></link>
        <description><![CDATA[ Hion Coding Blogs share everything ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>
  
        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ !empty($post->post_title) ? $post->post_title : 'Hion Coding Blog' }}]]></title>
                <link>{{ !empty($post->post_slug) ? route('post-detail', ['slug' => $post->post_slug]) : route('home') }}</link>
                <description><![CDATA[{!! !empty($post->post_description) ? $post->post_description : '' !!}]]></description>
                <category>{{ !empty($post->category->name) ? $post->category->name : 'Hion Category' }}</category>
                <author><![CDATA[{{ !empty($post->user->name) ? $post->user->name : 'Hion Coding Admin' }}]]></author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>