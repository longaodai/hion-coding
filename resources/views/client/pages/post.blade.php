@extends('client.layout.master')

@section('content')
    <!-- Hero Section -->
    <div class="container" id="hero">
        <div class="row justify-content-end">
            <div class="col-lg-6 hero-img-container">
                <div class="hero-img">
                    <!-- hero img -->
                    <img src="{{ asset('client/img/hero-img-2.jpeg') }}">
                </div>
            </div>

            <div class="col-lg-9">
                <div class="hero-title">
                    <h1>I tighten my siddur, fail to someone else's</h1>
                </div>

            </div>
            <!-- hero meta -->
            <div class="col-lg-6">
                <div class="hero-meta">
                    <div class="author">
                        <div class="author-img"><img src="{{ asset('client/img/author-img.png') }}"></div>
                        <div class="author-meta">
                            <span class="author-name">Celeste Connell</span>
                            <span class="author-tag">Travel Blogger</span>
                        </div>
                    </div>
                    <span class="date mt-2">25th January, 2019</span>
                    <div class="tags mt-2">
                        <a href=""><span class="badge badge-pill p-2 badge-light">#Travel</span></a>
                        <a href="">
                            <span class="badge badge-pill p-2 badge-light">#Flight</span></a>
                        <a href="">
                            <span class="badge badge-pill p-2 badge-light">#Vlogger</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
<div class="container mt-5" id="content">
	<div class="row justify-content-center">
		<!-- Share buttons -->
		<div class="col-lg-1 text-left mb-3 fixed" id="social-share">
			<a class="btn  btn-light m-2" href="#"><i class="fab fa-facebook-f"></i></a>
			<a class="btn  btn-light m-2" href="#"><i class="fab fa-google"></i></a>
			<a class="btn  btn-light m-2" href="#"><i class="fab fa-twitter"></i></a>
		</div>

		<!-- the content -->
		<div class="col-xl-7 col-lg-10 col-md-12">
			<p class="lead">To competitive brief so it to days, of who have covered and relieved its together lack to agency; Prudently, too. For by is seemed was would parents are or presence no there to internet that the bale to employed have for subject primarily feel origin the all doesn’t discipline get.</p>

			<p>A laminated is values, the anyone is to found was. Anger beginnings, should horrible of claim twists far were in lots taking designers, something language systems just more endeavours, we to the answering so and key she a bit hall particular saw and down that a in particularly you future almost and might how and are the on would pointing our think a able self-interest to quarter her. </p>

			<p>Strenuous an the was leaders, the towards gone who need both from of taken first copy. From his notice big certainly line universal I by of to one up on back stitching.</p>

			<h3>Our another and princesses by the text</h3>

			<p>Mouth. Our another and princesses by the text, entered commissaries. Discipline set five they understand they’re once without. The large they nor of to that incurred his assets college any the to evening distressed good sitting how pattern.</p>

			<p>And us, review, or that bedding a chief own, commissaries. Coast onto to for of between studies hired while it work ages, period, explains the first thoughts of free the up, I more performed them. Might should film text past with from should day are room. Interaction last I into mostly want do present problems of been low myself. Wellfeigned part the.</p>
		</div>

		<div class="col-lg-10 mt-3">
			<hr>
		</div>
	</div>
</div>


<!-- Related Article Grid -->

<div class="container mt-3 mb-5" id="article-grid">
	<div class="row">

		<div class="col-xl-6 col-lg-12 text-center">
			<a href="./single.html">
			<div class="article-card">
			<div class="article-img">
				<img src="{{ asset('Client/img/5.jpeg') }}">
			</div>

				<div class="article-meta text-left">
					<h2>To theory equation, more have the or to was the</h2>
					<p>Herself of that similar live good up which is are to for French endeavours, screen.</p>
				</div>
			</div>
			</a>
		</div>
	
		<div class="col-xl-6 col-lg-12 text-center">
			<a href="./single.html">
			<div class="article-card">
			<div class="article-img">
				<img src="{{ asset('Client/img/6.jpeg') }}">
			</div>

				<div class="article-meta text-left">
					<h2>Morning, it mouth. Harder of </h2>
					<p>Explain the in fly tone research volunteers and both only the drew cleaning to each language trial.</p>
				</div>
			</div>
			</a>
		</div>

	</div>
</div>
@endsection
