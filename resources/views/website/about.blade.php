@extends('website.layout')
@section('content_website')
<!-- About -->
<div class="pb-0 pb-sm-2">
    <h1 class="title title--h1 first-title title__separate">About Me</h1>
    <p>Hello, I'm Nguyen Thanh Dam, a final year AI major at FPT University. I'm interested in machine learning, deep learning like computer vision and natural language processing.</p>
    <p>My job is to build your website so that it works and is user-friendly but at the same time attractive. At the same time, meet the highest system requirements of customers and partners.</p>
    <p>Looking for opportunities and collaborations in the field of Data science, Backend, Frontend and Devops.</p>
</div>

<!-- What -->
<div class="box-inner pb-0">
    <h2 class="title title--h3">What I'm Doing</h2>
    <div class="row">
        <!-- Case Item -->
        <div class="col-12 col-lg-6">
            <div class="case-item box box__second">
                <img class="case-item__icon" src="{{asset('frontend/icons/monitoring.png')}}" alt="" />
                <div>
                    <h3 class="title title--h5">Frontend Build</h3>
                    <p class="case-item__caption">Build a responsive, interactive, and user friendly website interface using <b>HTML</b>, <b>CSS</b>, <b>JavaScript</b>, <b>jQuery</b>, and <b>Bootstrap</b>.</p>
                </div>
            </div>
        </div>

        <!-- Case Item -->
        <div class="col-12 col-lg-6">
            <div class="case-item box box__second">
                <img class="case-item__icon" src="{{asset('frontend/icons/website.png')}}" alt="" />
                <div>
                    <h3 class="title title--h5">Backend Development</h3>
                    <p class="case-item__caption">High quality development of websites with <b>PHP</b>, <b>Python</b> along with frameworks/CMS: <b>Laravel</b>, <b>Codeinighter</b>, <b>Django</b></p>
                </div>
            </div>
        </div>

        <!-- Case Item -->
        <div class="col-12 col-lg-6">
            <div class="case-item box box__second">
                <img class="case-item__icon" src="{{asset('frontend/icons/checklist.png')}}" alt="" />
                <div>
                    <h3 class="title title--h5">Data Analyst</h3>
                    <p class="case-item__caption">Analyze and visualize data with the help of <b>Python</b>, <b>SQL</b> and libraries like <b>Numpy</b>, <b>Pandas</b>, <b>Seaborn</b>, <b>PowerBi</b>.</p>
                </div>
            </div>
        </div>

        <!-- Case Item -->
        <div class="col-12 col-lg-6">
            <div class="case-item box box__second">
                <img class="case-item__icon" src="{{asset('frontend/icons/ai_blue.png')}}" alt="" />
                <div>
                    <h3 class="title title--h5">Artificial Intelligence</h3>
                    <p class="case-item__caption">Build and develop AI models with deep learning frameworks like <b>Scikit-Learn</b>, <b>PyTorch</b>.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="box-inner box-inner--white">
    <h2 class="title title--h3">Testimonials</h2>

    <div class="swiper-container js-carousel-review">
        <div class="swiper-wrapper">
            <!-- Item review -->
            <div class="swiper-slide review-item">
                <svg class="avatar avatar--80" viewBox="0 0 84 84">
                    <g class="avatar__hexagon">
                        <image xlink:href="{{asset('frontend/img/dattran.jpg')}}" height="100%" width="100%" />
                    </g>
                </svg>
                <h4 class="title title--h5">Dat Tran</h4>
                <p class="review-item__caption">I am completely satisfied with the website that Dam Nguyen designed for me. User-friendly interface and good performance.</p>
            </div>

            <!-- Item review -->
            <div class="swiper-slide review-item">
                <svg class="avatar avatar--80" viewBox="0 0 84 84">
                    <g class="avatar__hexagon">
                        <image xlink:href="{{asset('frontend/img/kimkien.jpg')}}" height="100%" width="100%" />
                    </g>
                </svg>
                <h4 class="title title--h5">Kim Kien</h4>
                <p class="review-item__caption">As an IT Manager, I consider Dam Nguyen to be an employee with with good thinking and coding skills.</p>
            </div>

            <!-- Item review -->
            <div class="swiper-slide review-item">
                <svg class="avatar avatar--80" viewBox="0 0 84 84">
                    <g class="avatar__hexagon">
                        <image xlink:href="{{asset('frontend/img/congbinh.jpg')}}" height="100%" width="100%" />
                    </g>
                </svg>
                <h4 class="title title--h5">Cong Binh</h4>
                <p class="review-item__caption">I appreciate Dam's ability to analyze and visualize data in projects that require efficient data mining.</p>
            </div>

        </div>

        <div class="swiper-pagination"></div>
    </div>
</div>

@endsection
