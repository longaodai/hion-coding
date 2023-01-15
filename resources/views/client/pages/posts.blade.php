@extends('client.layout.master')

@section('content')
    <div class="container mt-2 mb-2 pt-5 pb-5" id="article-grid">
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="{{ route('post-detail') }}">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/1.jpeg') }}">
                        </div>

                        <div class="article-meta text-left">
                            <h2>I tighten my siddur, which they fail to someone else's</h2>
                            <p>Most of culture that the sensitivity of the condition of puppy love, my lemons.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12  text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/2.jpeg') }}">
                        </div>

                        <div class="article-meta  text-left">
                            <h2>The details of justice to live in which converge into the accomplishment</h2>
                            <p>Began it will a more first was something return. Were ...</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/3.jpeg') }}">
                        </div>

                        <div class="article-meta  text-left">
                            <h2>Time text to so legs screen step experiments term a</h2>
                            <p>The due be to warp room he have place a problem offer, of just of screen there
                                sitting.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/4.jpeg') }}">
                        </div>

                        <div class="article-meta text-left">
                            <h2>Yet accuse however my people are</h2>
                            <p>The for probably of totally parameters gloomy probably walls hearing.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/5.jpeg') }}">
                        </div>

                        <div class="article-meta text-left">
                            <h2>They gain, the last were past material.</h2>
                            <p>Were hundred arranged he statement the your especially his here.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/6.jpeg') }}">
                        </div>

                        <div class="article-meta text-left">
                            <h2>Where instruments, cut out done far the for they'd seen</h2>
                            <p>And his we not quickly tin, but distance, the best of client would of concise plan
                                past.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/7.jpeg') }}">
                        </div>

                        <div class="article-meta text-left">
                            <h2>Generally, without gain, means, to researches</h2>
                            <p>The nor failing. First and friends the state fees...</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/8.jpeg') }}">
                        </div>

                        <div class="article-meta text-left">
                            <h2>Mind that she upper that caches of psychological be</h2>
                            <p>A through were the the their a of for human officer sort to to anchors viewings of
                                all of
                                origin.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/9.jpeg') }}">
                        </div>

                        <div class="article-meta text-left">
                            <h2>Heard designer a help reason to get psychological</h2>
                            <p>May and a of to instruments, the could river the spineless.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-lg-12 text-center">
                <a href="./single.html">
                    <div class="article-card">
                        <div class="article-img">
                            <img src="{{ asset('client/img/10.jpeg') }}">
                        </div>

                        <div class="article-meta text-left">
                            <h2>Morning, it mouth. Harder of with from and narrow</h2>
                            <p>Explain the in fly tone research volunteers and both only the drew cleaning to each
                                language trial.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div> <!-- Article Grid Row Ends -->
    </div> <!-- Article Grid Container Ends -->

    <!-- More articles button -->
    <div class="container text-center pb-3 mb-5">
        <a href="#" class="btn btn-lg btn-light">{{ __('common.view_more') }}</a>
    </div>
@endsection
