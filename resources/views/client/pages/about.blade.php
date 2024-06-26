@extends('client.layout.master')

@section('content')
    <div class="hero-meta hero-title-post mt-5 mb-1 text-center">
        <h1>{{ __('common.lbl_about_title') }}</h1>
        <h2>{{ __('home.lbl_desciption') }}</h2>
        <br>
    </div>
    <div class="container mt-2 mb-2 pb-5" id="article-grid">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 text-center">
                <div class="article-img mt-md-2"
                    style="max-width: 250px; height: 250px; overflow: hidden; border-radius: 100%;">
                    <img src="{{ asset('common/images/author_blog.webp') }}" alt="{{ __('common.lbl_about_title') }}"
                        loading="lazy">
                </div>
                <div class="info-admin mt-3 hero-title-post">
                    <h3>{{ __('common.lbl_name_author') }}</h3>
                    <p>
                        Software Engineer in Vietnam
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <p> Hello everyone, <br />
                    Thank you for choosing <b><i>"Hion Coding"</i></b> as your trusted source for news, information, and
                    inspiration. We look forward to being your digital companion on this exciting journey through the
                    dynamic landscape of technology and beyond. <br /><br />
                    "I am <b><i>Vo Chi Long</i></b> - admin of website <b><i>"Hion Coding"</i></b>. My passion for
                    information technology inspired me
                    to create this website. I hope <b><i>"Hion Coding"</i></b> is a place to share my knowledge about
                    information
                    technology, with the goal of learning together, exploring together the latest information technology,
                    and more. <b><i>"Hion Coding"</i></b> is a product of my passion, and I'm excited to take you on a
                    journey of innovation. this wealth, where technology meets passion and knowledge has no limits."</p>
            </div>
            <div class="col-md-6 mt-md-5 mt-sm-3">
                <b>About</b>
                <p>I'm a website developer. Specialize in PHP/Laravel back-end development, but also have experience with
                    front-end development.
                    Always learn and learn new knowledge to develop and improve yourself <br /><br />
                    <i>You can view detail<a href="https://hioncoding.com/public/common/VO_CHI_LONG_CV_PHP.pdf" target="_blank" rel="nofollow"> <b>My CV in Here</b> 🎉</a> or <b>short detail below</b></i>
                </p>
                <hr>
                <b>Skills</b>
                <p><b>Back-end:</b> PHP / Laravel / Codeigniter / Yii2, MySQL, NodeJS/ExpressJS, Python / Flask </p>
                <p><b>Front-end:</b> Html, CSS / Bootstrap, Javascript / Library Jquery / Vuejs ( basic ) / Reactjs (basic)</p>
                <p><b>Other:</b> Docker, Git / Github, Postman, AWS Amplify, Ubuntu, Config Apache / Nginx, CI / CD Github actions...</p>
                <hr>
                <b>Work experience</b>
                <div class="row mt-3">
                    <div class="col-md-4 col-sm-5">
                        9/2021 - Present
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <p><b>Hybrid Technologies Co., Ltd</b> <br /><i>Danang, Vietnam</i></p>
                    </div>
                </div>
                <div class="row mt-md-3 mt-sm-2">
                    <div class="col-md-4">
                        1/2021 - 8/2021
                    </div>
                    <div class="col-md-8">
                        <p><b>Bang Truong Trading & Service Co., Ltd</b> <br /><i>Danang, Vietnam</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
