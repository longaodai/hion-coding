<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Article",
      "headline": "{{ !empty($post->post_title) ? $post->post_title : '' }}",
      "datePublished": "{{ !empty($post->created_at) ? formatDate($post->created_at, 'Y-m-d') : '' }}",
      "dateModified": "{{ !empty($post->updated_at) ? formatDate($post->updated_at, 'Y-m-d') : '' }}",
      "author": {
        "@type": "Person",
        "name": "{{ !empty($post->user->name) ? $post->user->name : 'Hion Coding Admin' }}"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Hion Coding",
        "logo": "https://hioncoding.com/common/images/logo.png"
      },
      "description": "{{ !empty($post->post_sub_description) ? $post->post_sub_description : '' }}",
      "mainEntityOfPage": "{{ !empty($post->post_slug) ? route('post-detail', ['slug' => $post->post_slug]) : route('home') }}",
      "image": "{{ asset(getPathImage(!empty($post->post_image) ? $post->post_image : '')) }}"
    }
</script>
